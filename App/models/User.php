<?php

declare(strict_types=1);
/**
 * Modèle qui représente un utilisateur.
 * Il contient les propriétés d'un utilisateur ainsi que les méthodes pour accéder à ces propriétés.
 * Le constructeur de cette classe prend un tableau de données en paramètre et initialise les propriétés de l'utilisateur à partir de ce tableau.
 */
class User
{
    private ?int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private ?string $photo;
    private DateTime $created_at;
    private ?DateTime $updated_at;

    /** Constructeur de la classe User.
     * Il initialise les propriétés de l'utilisateur à partir d'un tableau de données.
     * @param array $data Tableau de données contenant les propriétés de l'utilisateur.
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->pseudo = $data['pseudo'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->password = $data['password'] ?? '';
        $this->photo = $data['photo'] ?? null;
        $this->created_at = !empty($data['created_at']) ? new DateTime($data['created_at']) : new DateTime();
        $this->updated_at = !empty($data['updated_at']) ? new DateTime($data['updated_at']) : null;
    }

    /** Méthode magique __toString() qui permet de retourner le pseudo de l'utilisateur lorsqu'on essaie d'afficher un objet de la classe User.
     * @return string Le pseudo de l'utilisateur.
     */
    public function __toString(): string
    {
        return $this->pseudo;
    }

    /** Getters et setters pour les propriétés de l'utilisateur.
     * Ces méthodes permettent d'accéder aux propriétés de l'utilisateur et de les modifier si nécessaire.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
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
