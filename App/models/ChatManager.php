<?php

declare(strict_types=1);
/** Ce manager gère les différentes actions liées aux conversations de chat.
 * Il utilise la base de données pour récupérer les informations sur les conversations de chat, les messages et les utilisateurs participants à ces conversations.
 * Les méthodes de ce manager sont utilisées pour créer une conversation de chat, récupérer une conversation de chat à partir de ses participants et récupérer la liste des conversations de chat d'un utilisateur.
 */
class ChatManager extends AbstractEntityManager
{

    /** Crée une conversation de chat à partir d'un objet Chat et l'ajoute à la base de données. Retourne l'objet Chat avec son id mis à jour.
     * @param Chat $chat L'objet Chat à créer.
     * @return Chat L'objet Chat créé avec son id mis à jour.
     */
    public function createChat(Chat $chat)
    {
        //Ajoute le chat
        $sql = "INSERT INTO chats (created_at,updated_at) VALUES (NOW(),NOW())";
        $result = $this->db->query($sql);
        $chat->setId((int) $this->db->lastInsertId());

        return $chat;
    }

    /** Récupère une conversation de chat à partir de ses participants. Si la conversation n'existe pas, retourne null.
     * @param int $curr_user L'id de l'utilisateur courant.
     * @param int $dest_user L'id de l'utilisateur destinataire.
     * @return Chat|null La conversation de chat entre les deux utilisateurs ou null si elle n'existe pas.
     */
    public function getChatByParticipants(int $curr_user, int $dest_user)
    {
        $sql = "SELECT c.* FROM chats c JOIN chat_users cu ON cu.chat_id = c.id WHERE cu.user_id IN (:curr_user, :dest_user) GROUP BY c.id HAVING COUNT(DISTINCT cu.user_id) = 2;";

        $result = $this->db->query($sql, ['curr_user' => $curr_user, 'dest_user' => $dest_user]);
        $chat = $result->fetch();
        if ($chat) {
            return new Chat($chat);
        }
        return null;
    }

    /** Récupère la liste des conversations de chat d'un utilisateur à partir de son id.
     * @param int $curr_user L'id de l'utilisateur courant.
     * @return array La liste des conversations de chat de l'utilisateur.
     */
    public function getChatsByParticipant(int $curr_user)
    {
        $sql = "SELECT 
            c.id AS chat_id,
            u.id AS dest_user_id,
            u.pseudo AS dest_user_pseudo,
            u.photo AS dest_user_photo,
            m.content AS last_message,
            m.created_at AS last_message_date
        FROM chats c

        JOIN chat_users cu ON cu.chat_id = c.id
        JOIN chat_users cu2 ON cu2.chat_id = c.id AND cu2.user_id != :user_id
        JOIN users u ON u.id = cu2.user_id

        LEFT JOIN messages m ON m.id = (
            SELECT m2.id
            FROM messages m2
            WHERE m2.chat_id = c.id
            ORDER BY m2.created_at DESC
            LIMIT 1
        )

        WHERE cu.user_id = :user_id
        ORDER BY m.created_at DESC;";

        $result = $this->db->query($sql, ['user_id' => $curr_user]);
        $chats = [];

        while ($chat = $result->fetch()) {
            $chats[] = $chat;
        }
        return $chats;
    }
}
