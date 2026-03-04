<?php

declare(strict_types=1);

Class Book{
    private int $id;
    private string $title;
    private string $author;
    private string $description;
    private string $cover;
    private int $owner_id;
    private datetime $created_at;
    private datetime $updated_at;

    public function __construct(array $data){
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->author = $data['author'];
        $this->description = $data['description'];
        $this->cover = $data['cover'];
        $this->owner_id = $data['owner_id'];
        $this->created_at = new datetime($data['created_at']);
        $this->updated_at = new datetime($data['updated_at']);
    }
    
    public function getId(): int{
        return $this->id;
    }

    public function setTitle(string $title): void{
        $this->title = $title;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function setAuthor(string $author): void{
        $this->author = $author;
    }

    public function getAuthor(): string{
        return $this->author;
    }

    public function setDescription(string $description): void{
        $this->description = $description;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function setCreatedAt(datetime $created_at): void{
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): datetime{
        return $this->created_at;
    }

    public function setUpdatedAt(datetime $updated_at): void{
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): datetime{
        return $this->updated_at;
    }

    public function setCover(string $cover): void{
        $this->cover = $cover;
    }

    public function getCover(): string{
        return $this->cover;
    }

    public function setOwner_id(int $owner_id): void{
        $this->owner_id;
    }

    public function getOwner_id():int{
        return $this->owner_id;
    }
}