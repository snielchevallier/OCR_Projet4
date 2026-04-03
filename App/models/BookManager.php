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

    public function searchBooks(string $search): array{
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE title LIKE :search ORDER BY updated_at DESC";
        $result = $this->db->query($sql,['search' => '%' . $search . '%']);
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

    public function getBookByIdAndOwner(int $id, int $owner_id): ?Book{
        $sql ="SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.id=:id AND books.owner_id=:owner_id";
        $result = $this->db->query($sql, ['id' => $id, 'owner_id' => $owner_id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    public function getBooksByOwner(int $owner_id): array{
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.owner_id=:owner_id ORDER BY updated_at DESC";
        
        $result = $this->db->query($sql, ['owner_id' => $owner_id]);
        $books = [];
        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function updateBook(Book $book): void {
            //Met à jour la base
            $sql="UPDATE books SET title=:title, author=:author, description=:description, cover=:cover, status=:status, updated_at=NOW() WHERE id=:id";
            $result = $this->db->query($sql, [
                'title' => $book->getTitle(),
                'author' => $book->getAuthor(),
                'description' => $book->getDescription(),
                'cover' => $book->getCover(),
                'status' => $book->getStatus(),
                'id' => $book->getId()
            ]);
    }

    public function deleteBookById(int $id): void{
        $sql = "DELETE FROM books WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    public function deleteBookByIdAndOwner(int $id, int $owner_id): void{
        $sql = "DELETE FROM books WHERE id = :id AND owner_id = :owner_id";
        $this->db->query($sql, ['id' => $id, 'owner_id' => $owner_id]);
    }

}