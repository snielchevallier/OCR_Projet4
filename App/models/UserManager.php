<?php
declare(strict_types=1);

class UserManager extends AbstractEntityManager 
{
    public function getUserById(int $id): ?User{
        $sql ="SELECT * FROM users WHERE id=:id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function getUserByEmail(string $email): ?User{
        $sql ="SELECT * FROM users WHERE email=:email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function getUserByPseudo(string $pseudo): ?User{
        $sql ="SELECT * FROM users WHERE pseudo=:pseudo";
        $result = $this->db->query($sql, ['pseudo' => $pseudo]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function addUser(User $user): User {
        //Ajoute le user
        $sql="INSERT INTO users (pseudo, email, password, created_at) VALUES (:pseudo, :email,:password, NOW())";
        $result = $this->db->query($sql, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ]);
        $user->setId((int) $this->db->lastInsertId());

        return $user;
    }

    public function updateUser(User $user): void {
            //Met à jour la base
            $sql="UPDATE users SET pseudo=:pseudo, email=:email, password=:password, photo=:photo, updated_at=NOW() WHERE id=:id";
            $result = $this->db->query($sql, [
                'pseudo' => $user->getPseudo(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'photo' => $user->getPhoto(),
                'id' => $user->getId()
            ]);
    }
}