<?php

declare(strict_types=1);

Class ChatUserManager extends AbstractEntityManager {
    
    

    public function createUserChat(ChatUser $chatUser){
        //Ajoute le chat
        $sql="INSERT INTO chat_users (chat_id, user_id) VALUES (:chat_id, :user_id)";
        $result = $this->db->query($sql,[
            'chat_id' => $chatUser->getChatId(),
            'user_id' => $chatUser->getUserId()
        ]);
        $chatUser->setId((int) $this->db->lastInsertId());

        return $chatUser;
    }

    public function markAsRead(int $chat_id, int $user_id){
        $sql="UPDATE chat_users SET last_read_at = NOW() WHERE chat_id = :chat_id AND user_id = :user_id";
        $result = $this->db->query($sql,[
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ]);
    }
}