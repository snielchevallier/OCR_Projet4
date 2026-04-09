<?php

declare(strict_types=1);
/**
 * Modèle qui gère les différentes actions liées aux utilisateurs.
 * Il utilise la base de données pour récupérer les informations sur les utilisateurs, ajouter un utilisateur et mettre à jour un utilisateur.
 * Les méthodes de ce modèle sont utilisées pour récupérer les informations sur les utilisateurs, ajouter un utilisateur et mettre à jour un utilisateur.
 */
class UserManager extends AbstractEntityManager
{
    /** Récupère les informations sur un utilisateur à partir de son id.
     * @param int $id L'id de l'utilisateur.
     * @return User|null L'utilisateur correspondant à l'id ou null si l'utilisateur n'existe pas.
     */
    public function getUserById(int $id): ?User
    {
        $sql = "SELECT * FROM users WHERE id=:id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /** Récupère les informations sur un utilisateur à partir de son email.
     * @param string $email L'email de l'utilisateur.
     * @return User|null L'utilisateur correspondant à l'email ou null si l'utilisateur n'existe pas.
     */
    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email=:email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /** Récupère les informations sur un utilisateur à partir de son pseudo.
     * @param string $pseudo Le pseudo de l'utilisateur.
     * @return User|null L'utilisateur correspondant au pseudo ou null si l'utilisateur n'existe pas.
     */
    public function getUserByPseudo(string $pseudo): ?User
    {
        $sql = "SELECT * FROM users WHERE pseudo=:pseudo";
        $result = $this->db->query($sql, ['pseudo' => $pseudo]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /** Ajoute un utilisateur à la base de données.
     * @param User $user L'utilisateur à ajouter.
     * @return User L'utilisateur ajouté avec son id mis à jour.
     */
    public function addUser(User $user): User
    {
        //Ajoute le user
        $sql = "INSERT INTO users (pseudo, email, password, created_at) VALUES (:pseudo, :email,:password, NOW())";
        $result = $this->db->query($sql, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ]);
        $user->setId((int) $this->db->lastInsertId());

        return $user;
    }

    /** Met à jour un utilisateur dans la base de données.
     * @param User $user L'utilisateur à mettre à jour.
     * @return void
     */
    public function updateUser(User $user): void
    {
        //Met à jour la base
        $sql = "UPDATE users SET pseudo=:pseudo, email=:email, password=:password, photo=:photo, updated_at=NOW() WHERE id=:id";
        $result = $this->db->query($sql, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'photo' => $user->getPhoto(),
            'id' => $user->getId()
        ]);
    }
}
