
    <h1>Liste des livres</h1>
    <div class="book-list">
        <?php foreach ($books as $book): ?>
            <div class="book-item">
                <h2><?= htmlspecialchars($book->getTitle()) ?></h2>
                <p><strong>Auteur:</strong> <?= htmlspecialchars($book->getAuthor()) ?></p>
                <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($book->getDescription())) ?></p>
                <p><em>Ajouté le <?= $book->getCreatedAt()->format('d/m/Y') ?></em></p>
            </div>
        <?php endforeach; ?>
    </div>