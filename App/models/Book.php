<?php

declare(strict_types=1);

Class Book{
    private int $id;
    private string $title;
    private string $author;
    private string $description;
    private datetime $created_at;

    public function __construct(array $data){
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->author = $data['author'];
        $this->description = $data['description'];
        $this->created_at = new datetime($data['created_at']);
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
}