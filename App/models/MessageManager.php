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

    public function getMessagesbyChat(int $idChat): array{
        $sql = "SELECT * FROM messages WHERE chat_id=:chat_id ORDER BY created_at ASC";
        
        $result = $this->db->query($sql, ['chat_id' => $idChat]);
        $messages = [];
        while ($message = $result->fetch()) {
            $messages[] = new Message($message);
        }
        return $messages;
    }


    public function countUnreadMessage(int $user_id){
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
        $countMessage=$result->fetch();
        return $countMessage['unread_count'];
    }

   
}