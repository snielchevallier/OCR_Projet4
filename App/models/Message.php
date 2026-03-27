<?php

declare(strict_types=1);

class Message{
    private ?int $id;
    private int $chat_id;
    private int $author_id;
    private string $content;
    private DateTime $created_at;
    private ?DateTime $viewed_at;

    public function __construct(array $data){
        $this->id = $data['id'] ?? null;
        $this->chat_id = (int)$data['chat_id'];
        $this->author_id = (int)$data['author_id'];
        $this->content = (string)$data['content'];
        $this->created_at = !empty($data['created_at']) ? new DateTime($data['created_at']) : new DateTime();
        $this->viewed_at = !empty($data['viewed_at']) ? new DateTime($data['viewed_at']) : NULL;
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

    public function setAuthorId(int $author_id): void{
        $this->author_id = $author_id;
    }

    public function getAuthorId(): int{
        return $this->author_id;
    }

    public function setContent(string $content): void{
        $this->content = $content;
    }

    public function getContent(): string{
        return $this->content;
    }

    public function setCreatedAt(DateTime $created_at): void{
        $this->created_at = $created_at;
    }
    
    public function getCreatedAt(): DateTime{
        return $this->created_at;
    }

    public function setViewedAt(DateTime $viewed_at): void{
        $this->viewed_at = $viewed_at;
    }
    
    public function getViewdAt(): DateTime{
        return $this->viewed_at;
    }
}