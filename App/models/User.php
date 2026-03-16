<?php

declare(strict_types=1);

class User{
     private ?int $id;
     private string $pseudo;
     private string $email;
     private string $password;
     private ?string $photo;
     private DateTime $created_at;
     private ?DateTime $updated_at;
 
     public function __construct(array $data){
          $this->id = $data['id'] ?? null;
          $this->pseudo = $data['pseudo'] ?? '';
          $this->email = $data['email'] ?? '';
          $this->password = $data['password'] ?? '';
          $this->photo = $data['photo'] ?? null;
          $this->created_at = !empty($data['created_at']) ? new DateTime($data['created_at']) : new DateTime();
          $this->updated_at = !empty($data['updated_at']) ? new DateTime($data['updated_at']) : null;
     }

     public function __toString(): string{
          return $this->pseudo;
     }

     public function setId(int $id): void{
        $this->id = $id;
     }

     public function getId(): ?int{
        return $this->id;
     }

     public function setPseudo(string $pseudo): void{
          $this->pseudo = $pseudo;
     }

     public function getPseudo():string{
           return $this->pseudo;
     }

      public function setEmail(string $email): void{
          $this->email = $email;
     }

     public function getEmail():string{
           return $this->email;
     }

      public function setPassword(string $password): void{
          $this->password = $password;
     }

     public function getPassword():string{
           return $this->password;
     }

      public function setPhoto(?string $photo): void{
          $this->photo = $photo;
     }

     public function getPhoto():?string{
           return $this->photo;
     }

     public function setCreatedAt(DateTime $created_at): void{
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): DateTime{
        return $this->created_at;
    }

    public function setUpdatedAt(?DateTime $updated_at): void{
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?DateTime{
        return $this->updated_at;
    }
}