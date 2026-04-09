<?php

declare(strict_types=1);
/**
 * Modèle qui gère les différentes actions liées à la relation entre une conversation de chat et un utilisateur.
 * Il utilise la base de données pour créer une relation entre une conversation de chat et un utilisateur et pour mettre à jour la date de dernière lecture d'une conversation de chat pour un utilisateur donné.
 * Les méthodes de ce modèle sont utilisées pour créer une relation entre une conversation de chat et un utilisateur et pour mettre à jour la date de dernière lecture d'une conversation de chat pour un utilisateur donné.
 */
class ChatUserManager extends AbstractEntityManager
{
    /** crée un utilisateur de chat 
     * Cette méthode prend en paramètre un objet ChatUser et l'ajoute à la base de données. Elle retourne l'objet ChatUser avec son id mis à jour.
     * @param ChatUser $chatUser L'objet ChatUser à créer. 
     * @return ChatUser L'objet ChatUser créé avec son id mis à jour.
     */
    public function createUserChat(ChatUser $chatUser)
    {
        //Ajoute le chat
        $sql = "INSERT INTO chat_users (chat_id, user_id) VALUES (:chat_id, :user_id)";
        $result = $this->db->query($sql, [
            'chat_id' => $chatUser->getChatId(),
            'user_id' => $chatUser->getUserId()
        ]);
        $chatUser->setId((int) $this->db->lastInsertId());

        return $chatUser;
    }

    /** met à jour la date de dernière lecture d'une conversation de chat pour un utilisateur donné.
     * @param int $chat_id L'id de la conversation de chat.
     * @param int $user_id L'id de l'utilisateur.
     * @return void
     */
    public function markAsRead(int $chat_id, int $user_id)
    {
        $sql = "UPDATE chat_users SET last_read_at = NOW() WHERE chat_id = :chat_id AND user_id = :user_id";
        $result = $this->db->query($sql, [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ]);
    }
}
