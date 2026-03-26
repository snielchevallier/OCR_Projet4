<?php

declare(strict_types=1);

Class ChatManager extends AbstractEntityManager {
    

    public function createChat(Chat $chat){
        //Ajoute le chat
        $sql="INSERT INTO chats (created_at) VALUES (NOW())";
        $result = $this->db->query($sql);
        $chat->setId((int) $this->db->lastInsertId());

        return $chat;
    }

    public function getChatByParticipants(int $curr_user, int $dest_user){
        $sql = "SELECT c.* FROM chats c JOIN chat_users cu ON cu.chat_id = c.id WHERE cu.user_id IN (:curr_user, :dest_user) GROUP BY c.id HAVING COUNT(DISTINCT cu.user_id) = 2;";
        
        $result = $this->db->query($sql, ['curr_user' => $curr_user, 'dest_user' => $dest_user]);
        $chat = $result->fetch();
        if ($chat) {
            return new Chat($chat);
        }
        return null;
    }

    public function getChatsByParticipant(int $curr_user){
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