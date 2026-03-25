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
}