<?php

declare(strict_types=1);

Class User{
     private int $id;
     private string $pseudo;
     private string $email;
     private string $password;
     private string $photo;
     private datetime $created_at;
     private ?datetime $updated_at;
 
     public function __construct(array $data){
          $this->id = $data['id'];
          $this->pseudo = $data['pseudo'];
          $this->email = $data['email'];
          $this->password = $data['password'];
          $this->photo = $data['photo'];
          $this->created_at = new datetime($data['created_at']);
          $this->updated_at = $data['updated_at'] ? new DateTime($data['updated_at']) : null;
     }

     public function __toString(){
          return $this->pseudo;
     }

     public function getId(): int{
        return $this->id;
     }

     public function setPseudo(string $pseudo){
          $this->pseudo = $pseudo;
     }

     public function getPseudo():string{
           return $this->pseudo;
     }

      public function setEmail(string $pseudo){
          $this->email = $email;
     }

     public function getEmail():string{
           return $this->email;
     }

      public function setPassword(string $password){
          $this->password = $password;
     }

     public function getPassword():string{
           return $this->password;
     }

      public function setPhoto(string $photo){
          $this->photo = $photo;
     }

     public function getPhoto():string{
           return $this->photo;
     }

     public function setCreatedAt(datetime $created_at): void{
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): datetime{
        return $this->created_at;
    }

    public function setUpdatedAt(datetime $updated_at): void{
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): datetime{
        return $this->updated_at;
    }
}