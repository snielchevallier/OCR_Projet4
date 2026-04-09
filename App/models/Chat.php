<?php

declare(strict_types=1);
/**
 * Modèle qui représente une conversation de chat.
 * Il contient les propriétés d'une conversation de chat ainsi que les méthodes pour accéder à ces propriétés.
 * Le constructeur de cette classe prend un tableau de données en paramètre et initialise les propriétés de la conversation de chat à partir de ce tableau.
 */
class Chat
{
    private ?int $id;
    private DateTime $created_at;
    private ?DateTime $updated_at;
    
    /** Constructeur de la classe Chat.
     * Il initialise les propriétés de la conversation de chat à partir d'un tableau de données.
     * @param array $data Tableau de données contenant les propriétés de la conversation de chat.
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->created_at = !empty($data['created_at']) ? new DateTime($data['created_at']) : new DateTime();
        $this->updated_at = !empty($data['updated_at']) ? new DateTime($data['updated_at']) : null;
    }

    /** Getters et setters pour les propriétés de la conversation de chat.
     * Ces méthodes permettent d'accéder aux propriétés de la conversation de chat et de les modifier si nécessaire.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
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
