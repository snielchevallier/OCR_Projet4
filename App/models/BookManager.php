<?php

declare(strict_types=1);

Class BookManager extends AbstractEntityManager 
{
    
    public function getAllBooks(): array{
        $sql = "SELECT * FROM book";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }
}