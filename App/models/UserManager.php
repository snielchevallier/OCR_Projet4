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

    public function addUser(): void {
        //récupére les données
        $pseudo = Utils::request("pseudo");
        $email = Utils::request("email");
        $password = Utils::request("password");

        try{
        //vérifie les données reçues
         if (empty($pseudo) || empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email invalide.");
        }
                
        //vérifie que le mail du user n'existe pas
        if ($this->getUserByEmail($email)) {
            throw new Exception("Cet email est déjà utilisé.");
        }

        //vérifie que le pseudo du user n'existe pas
        if ($this->getUserByPseudo($pseudo)) {
            throw new Exception("Ce pseudo est déjà utilisé.");
        }
        
        //crée un objet User
        $user = new User([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        //Ajoute le user
        $sql="INSERT INTO users (pseudo, email, password, created_at) VALUES (:pseudo, :email,:password, NOW())";
        $result = $this->db->query($sql, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ]);
        $user->setId((int) $this->db->lastInsertId());

        //connecte le User
        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

        } catch (Exception $e) {
            echo $e->getMessage();
            Utils::redirect("inscription",['errorMessage' => $e->getMessage()]);
        }
        //renvoie vers la page account
        Utils::redirect("account");
        
        
    }
}