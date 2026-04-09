<?php

declare(strict_types=1);
/**
 * Modèle qui représente une relation entre une conversation de chat et un utilisateur.
 * Il contient les propriétés d'une relation entre une conversation de chat et un utilisateur ainsi que les méthodes pour accéder à ces propriétés.
 * Le constructeur de cette classe prend un tableau de données en paramètre et initialise les propriétés de la relation entre une conversation de chat et un utilisateur à partir de ce tableau.
 */
class ChatUser
{
    private ?int $id;
    private int $chat_id;
    private int $user_id;
    private ?DateTime $last_read_at;
    
    /** Constructeur de la classe ChatUser.
     * Il initialise les propriétés de la relation entre une conversation de chat et un utilisateur à partir d'un tableau de données.
     * @param array $data Tableau de données contenant les propriétés de la relation entre une conversation de chat et un utilisateur.
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->chat_id = (int)$data['chat_id'];
        $this->user_id = (int)$data['user_id'];
        $this->last_read_at = !empty($data['last_read_at']) ? new DateTime($data['last_read_at']) : null;
    }

    /** Getters et setters pour les propriétés de la relation entre une conversation de chat et un utilisateur.
     * Ces méthodes permettent d'accéder aux propriétés de la relation entre une conversation de chat et un utilisateur et de les modifier si nécessaire.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setChatId(int $chat_id): void
    {
        $this->chat_id = $chat_id;
    }

    public function getChatId(): int
    {
        return $this->chat_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setLastReadAt(?DateTime $last_read_at): void
    {
        $this->last_read_at = $last_read_at;
    }

    public function getLastReadAt(): ?DateTime
    {
        return $this->last_read_at;
    }
}
