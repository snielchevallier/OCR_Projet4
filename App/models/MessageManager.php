<?php

declare(strict_types=1);
/**
 * Modèle qui gère les différentes actions liées aux messages d'une conversation de chat.
 * Il utilise la base de données pour ajouter un message à une conversation de chat, récupérer la liste des messages d'une conversation de chat à partir de l'id de la conversation de chat et compter le nombre de messages non lus pour un utilisateur donné.
 * Les méthodes de ce modèle sont utilisées pour ajouter un message à une conversation de chat, récupérer la liste des messages d'une conversation de chat à partir de l'id de la conversation de chat et compter le nombre de messages non lus pour un utilisateur donné.
 */
class MessageManager extends AbstractEntityManager
{

    /** Ajoute un message à une conversation de chat.
     * @param Message $message Le message à ajouter.
     * @return Message Le message ajouté avec son id mis à jour.
     */
    public function addMessage(Message $message)
    {
        //Ajoute le chat
        $sql = "INSERT INTO messages (chat_id, author_id, content, created_at) VALUES (:chat_id, :user_id, :content, NOW())";
        $result = $this->db->query($sql, [
            'chat_id' => $message->getChatId(),
            'user_id' => $message->getAuthorId(),
            'content' => $message->getContent()
        ]);
        $message->setId((int) $this->db->lastInsertId());

        return $message;
    }

    /** Récupère la liste des messages d'une conversation de chat à partir de l'id de la conversation de chat.
     * @param int $idChat L'id de la conversation de chat.
     * @return array La liste des messages de la conversation de chat.
     */
    public function getMessagesByChat(int $idChat): array
    {
        $sql = "SELECT * FROM messages WHERE chat_id=:chat_id ORDER BY created_at ASC";

        $result = $this->db->query($sql, ['chat_id' => $idChat]);
        $messages = [];
        while ($message = $result->fetch()) {
            $messages[] = new Message($message);
        }
        return $messages;
    }

    /** Compte le nombre de messages non lus pour un utilisateur donné.
     * @param int $user_id L'id de l'utilisateur.
     * @return int Le nombre de messages non lus pour l'utilisateur.
     */
    public function countUnreadMessage(int $user_id)
    {
        $sql = "SELECT COUNT(*) AS unread_count
                FROM messages m
                JOIN chat_users cu ON cu.chat_id = m.chat_id
                WHERE cu.user_id = :user_id
                AND m.author_id != :user_id
                AND (
                    cu.last_read_at IS NULL
                    OR m.created_at > cu.last_read_at
                )";
        $result = $this->db->query($sql, [
            'user_id' => $user_id
        ]);
        $countMessage = $result->fetch();
        return $countMessage['unread_count'];
    }
}
