<?php

declare(strict_types=1);
/**
 * Modèle qui représente un livre.
 * Il contient les propriétés d'un livre ainsi que les méthodes pour accéder à ces propriétés.
 * Le constructeur de cette classe prend un tableau de données en paramètre et initialise les propriétés du livre à partir de ce tableau.
 */
class Book
{
    private ?int $id;
    private string $title;
    private string $author;
    private string $description;
    private ?string $cover;
    private int $owner_id;
    private string $owner_name;
    private string $status;
    private DateTime $created_at;
    private ?DateTime $updated_at;

    /** Constructeur de la classe Book.
     * Il initialise les propriétés du livre à partir d'un tableau de données.
     * @param array $data Tableau de données contenant les propriétés du livre.
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'] ?? '';
        $this->author = $data['author'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->cover = $data['cover'] ?? null;
        $this->owner_id = $data['owner_id'];
        $this->owner_name = $data['owner_name'];
        $this->status = $data['status'];
        $this->created_at = !empty($data['created_at']) ? new DateTime($data['created_at']) : new DateTime();
        $this->updated_at = !empty($data['updated_at']) ? new DateTime($data['updated_at']) : null;
    }
    
    /** Getters et setters pour les propriétés du livre.
     * Ces méthodes permettent d'accéder aux propriétés du livre et de les modifier si nécessaire.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public function setCover(?string $cover): void
    {
        $this->cover = $cover;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setOwner_id(int $owner_id): void
    {
        $this->owner_id = $owner_id;
    }

    public function getOwner_id(): int
    {
        return $this->owner_id;
    }

    public function setOwner_name(string $owner_name): void
    {
        $this->owner_name = $owner_name;
    }

    public function getOwner_name(): string
    {
        return $this->owner_name;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function setUpdatedAt(?DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updated_at;
    }
}
