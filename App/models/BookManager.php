<?php

declare(strict_types=1);
/** Ce manager est utilisé pour interagir avec la base de données et récupérer les informations sur les livres.
 * Il contient les méthodes pour récupérer tous les livres, rechercher des livres à partir d'une chaîne de caractères, récupérer un nombre de livres, récupérer un livre à partir de son id, récupérer un livre à partir de son id et de son propriétaire, récupérer les livres d'un propriétaire, mettre à jour un livre, supprimer un livre à partir de son id et supprimer un livre à partir de son id et de son propriétaire.
 * Ces méthodes sont utilisées par les contrôleurs pour afficher les informations sur les livres et pour traiter les actions liées aux livres.
 */
class BookManager extends AbstractEntityManager
{
    /** Récupère tous les livres disponibles dans la base de données.
     * Les livres sont triés par date de mise à jour décroissante.
     * @return array Un tableau de livres disponibles.
     */
    public function getAllBooks(): array
    {
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.status = 'available' ORDER BY updated_at DESC";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }
    /** Rechercher des livres à partir d'une chaîne de caractères.
     * La recherche se fait à partir du titre du livre.
     * Le résultat de la recherche est affiché dans la même page que la liste des livres.
     * @param string $search La chaîne de caractères à rechercher dans le titre des livres.
     * @return array Un tableau de livres correspondant à la recherche.
     */
    public function searchBooks(string $search): array
    {
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE title LIKE :search AND books.status = 'available' ORDER BY updated_at DESC";
        $result = $this->db->query($sql, ['search' => '%' . $search . '%']);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /** Récupère un nombre de livres disponibles dans la base de données.
     * Les livres sont triés par date de mise à jour décroissante.
     * @param int $numbooks Le nombre de livres à récupérer.
     * @return array Un tableau de livres disponibles.
     */
    public function getNBooks(int $numbooks): array
    {
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.status = 'available' ORDER BY updated_at DESC LIMIT " . $numbooks;
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /** Récupère un livre à partir de son id.
     * @param int $id L'id du livre à récupérer.
     * @return Book|null Le livre correspondant à l'id ou null si le livre n'existe pas.
     */
    public function getBookById(int $id): ?Book
    {
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.id=:id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    /** Récupère un livre à partir de son id et de son propriétaire.
     * @param int $id L'id du livre à récupérer.
     * @param int $owner_id L'id du propriétaire du livre à récupérer.
     * @return Book|null Le livre correspondant à l'id et au propriétaire ou null si le livre n'existe pas ou si le propriétaire n'est pas le propriétaire du livre.
     */
    public function getBookByIdAndOwner(int $id, int $owner_id): ?Book
    {
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.id=:id AND books.owner_id=:owner_id";
        $result = $this->db->query($sql, ['id' => $id, 'owner_id' => $owner_id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    /** Récupère les livres d'un propriétaire.
     * Les livres sont triés par date de mise à jour décroissante.
     * @param int $owner_id L'id du propriétaire des livres à récupérer.
     * @return array Un tableau de livres correspondant au propriétaire.
     */
    public function getBooksByOwner(int $owner_id): array
    {
        $sql = "SELECT books.*, users.pseudo AS owner_name FROM books JOIN users ON books.owner_id = users.id WHERE books.owner_id=:owner_id ORDER BY updated_at DESC";

        $result = $this->db->query($sql, ['owner_id' => $owner_id]);
        $books = [];
        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /** Met à jour un livre dans la base de données.
     * @param Book $book Le livre à mettre à jour.
     * @return void
     */
    public function updateBook(Book $book): void
    {
        //Met à jour la base
        $sql = "UPDATE books SET title=:title, author=:author, description=:description, cover=:cover, status=:status, updated_at=NOW() WHERE id=:id";
        $result = $this->db->query($sql, [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'description' => $book->getDescription(),
            'cover' => $book->getCover(),
            'status' => $book->getStatus(),
            'id' => $book->getId()
        ]);
    }

    /** Supprime un livre à partir de son id.
     * @param int $id L'id du livre à supprimer.
     * @return void
     */
    public function deleteBookById(int $id): void
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    /** Supprime un livre à partir de son id et de son propriétaire.
     * @param int $id L'id du livre à supprimer.
     * @param int $owner_id L'id du propriétaire du livre à supprimer.
     * @return void
     */
    public function deleteBookByIdAndOwner(int $id, int $owner_id): void
    {
        $sql = "DELETE FROM books WHERE id = :id AND owner_id = :owner_id";
        $this->db->query($sql, ['id' => $id, 'owner_id' => $owner_id]);
    }
}
