<?php
declare(strict_types=1);

Class UserManager extends AbstractEntityManager 
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
}