<?php

declare(strict_types=1);

Class BookManager extends AbstractEntityManager 
{
    
    public function getAllBooks(): array{
        $sql = "SELECT * FROM books ORDER BY updated_at DESC";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getNBooks(int $numbooks): array{
         $sql = "SELECT * FROM books ORDER BY updated_at DESC LIMIT ".$numbooks;
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getBookById(int $id): ?Book{
        $sql ="SELECT * FROM books WHERE id=:id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }
}