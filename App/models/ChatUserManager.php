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
}