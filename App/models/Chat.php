<?php

declare(strict_types=1);

class Chat{
    private ?int $id;
    private DateTime $created_at;
    private ?DateTime $updated_at;

    public function __construct(array $data){
        $this->id = $data['id'] ?? null;
        $this->created_at = !empty($data['created_at']) ? new DateTime($data['created_at']) : new DateTime();
        $this->updated_at = !empty($data['updated_at']) ? new DateTime($data['updated_at']) : null;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function setCreatedAt(DateTime $created_at): void{
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): DateTime{
        return $this->created_at;
    }

    public function setUpdatedAt(?DateTime $updated_at): void{
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?DateTime{
        return $this->updated_at;
    }
}