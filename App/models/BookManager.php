<?php

declare(strict_types=1);

Class BookManager extends AbstractEntityManager 
{
    
    public function getAllBooks(): array{
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id ORDER BY updated_at DESC";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getNBooks(int $numbooks): array{
         $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id ORDER BY updated_at DESC LIMIT ".$numbooks;
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getBookById(int $id): ?Book{
        $sql ="SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.id=:id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    public function getBooksByOwner(int $id_owner): array{
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.owner_id=:owner_id ORDER BY updated_at DESC";
        
        $result = $this->db->query($sql, ['owner_id' => $id_owner]);
        $books = [];
        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

}