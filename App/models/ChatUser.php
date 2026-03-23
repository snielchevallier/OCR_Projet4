<?php

declare(strict_types=1);

class ChatUser{
    private ?int $id;
    private int $chat_id;
    private int $user_id;
    private ?DateTime $last_read_at;

    public function __construct(array $data){
        $this->id = $data['id'] ?? null;
        $this->chat_id = (int)$data['chat_id'];
        $this->user_id = (int)$data['user_id'];
        $this->last_read_at = !empty($data['last_read_at']) ? new DateTime($data['last_read_at']) : null;
        
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function setChatId(int $chat_id): void{
        $this->chat_id = $chat_id;
    }

    public function getChatId(): int{
        return $this->chat_id;
    }

    public function setUserId(int $user_id): void{
        $this->user_id = $user_id;
    }

    public function getUserId(): int{
        return $this->user_id;
    }

    public function setLastReadAt(?DateTime $last_read_at): void{
        $this->last_read_at = $last_read_at;
    }

    public function getLastReadAt(): ?DateTime{
        return $this->last_read_at;
    }

}