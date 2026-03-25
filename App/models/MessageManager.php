<?php

declare(strict_types=1);

Class MessageManager extends AbstractEntityManager {
    
    

    public function addMessage(Message $message){
        //Ajoute le chat
        $sql="INSERT INTO messages (chat_id, author_id, content, created_at) VALUES (:chat_id, :user_id, :content, NOW())";
        $result = $this->db->query($sql,[
            'chat_id' => $message->getChatId(),
            'user_id' => $message->getAuthorId(),
            'content' => $message->getContent()
        ]);
        $message->setId((int) $this->db->lastInsertId());

        return $message;
    }
}