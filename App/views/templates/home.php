<!-- BLOCK BIENVENUE-->
<section class="pt-16 pb-8">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">
        <div class="order-2 md:order-1 md:w-1/2 px-5">
            <h1 class="text-3xl font-playfairDisplay mb-6">
                Rejoignez nos lecteurs passionnés
            </h1>

            <p class="font-inter mb-6">
                Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
            </p>

            <a href="/livres/nos-livres-a-l-echange" class="inline-block bg-tomTroc-green text-white font-inter font-semibold px-6 py-4 rounded-lg hover:bg-tomTroc-darkgreen transition-colors transition-duration-1000 w-full md:w-auto text-center">
                Découvrir
            </a>
        </div>
        <figure class="order-1 md:order-2 md:w-1/2">
            <img src="<?= ASSETS_PATH ?>img/hamza-nouasria.jpg" alt="Un homme lit entouré de livres" class="w-full" loading="lazy">
            <figcaption class="text-right block mt-1 mr-8 font-inter italic text-tomTroc-grey">Hamza</figcaption>
        </figure>

    </div>
</section>
<!--BLOCK DERNIERS LIVRES AJOUTES-->
<section class="bg-tomTroc-light ">
    <div class="px-5 pt-8 pb-6 text-center max-w-full justify-items-center">
        <h2 class="text-3xl font-playfairDisplay mb-6 md:mb-12 md:mt-4 text-center">
            Les derniers livres ajoutés
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10 justify-items-center">
            <?php foreach ($books as $book): ?>
                <a href="/livres/detail-livre?id=<?= htmlspecialchars($book->getId(), ENT_QUOTES, 'UTF-8') ?>" class="" aria-label="Voir le livre <?= htmlspecialchars($book->getTitle(), ENT_QUOTES, 'UTF-8') ?> de <?= htmlspecialchars($book->getAuthor(), ENT_QUOTES, 'UTF-8') ?>">
                    <div class="bg-white rounded-b-lg w-40 md:w-52 flex flex-col h-full">
                        <div class="w-full aspect-square overflow-hidden">
                            <img src="<?= htmlspecialchars(UPLOADS_URL . 'books/' . $book->getCover(), ENT_QUOTES, 'UTF-8') ?>" class="w-full h-full object-cover" alt="<?= htmlspecialchars($book->getTitle(), ENT_QUOTES, 'UTF-8') ?>">
                        </div>
                        <h3 class="text-sm font-inter font-semibold my-2 px-2 text-left"><?= htmlspecialchars($book->getTitle(), ENT_QUOTES, 'UTF-8') ?></h3>
                        <p class="text-xs font-inter text-tomTroc-grey mb-4 px-2 text-left"><?= htmlspecialchars($book->getAuthor(), ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="text-2xs font-inter text-tomTroc-grey italic mb-2 px-2 text-left mt-auto">Vendu par : <?= htmlspecialchars($book->getOwner_name(), ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>
        <a href="/livres/nos-livres-a-l-echange" class="my-6 inline-block bg-tomTroc-green text-white font-inter font-semibold px-6 py-4 rounded-lg hover:bg-tomTroc-darkgreen transition-colors transition-duration-1000 w-full md:w-auto text-center">
            Voir tous les livres
        </a>
    </div>
</section>
<!--BLOCK BLOCK COMMENT CA MARCHE-->
<section class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">
    <div class="px-5 pt-8 pb-6 text-center">
        <h2 class="text-3xl font-playfairDisplay mb-6 text-center">
            Comment ça marche ?
        </h2>
        <p class="font-inter mb-6 text-center text-sm max-w-sm mx-auto">
            Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :
        </p>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-y-4 gap-x-6">
            <div class="bg-white rounded-lg w-full h-36 flex flex-col items-center justify-center px-4">
                <p class="text-sm font-inter text-tomTroc-darkgrey px-2 text-center">
                    Inscrivez-vous gratuitement sur notre plateforme.
                </p>
            </div>
            <div class="bg-white rounded-lg w-full h-36 flex flex-col items-center justify-center px-4">
                <p class="text-sm font-inter text-tomTroc-darkgrey px-2 text-center">
                    Ajoutez les livres que vous souhaitez échanger à votre profil.
                </p>
            </div>
            <div class="bg-white rounded-lg w-full h-36 flex flex-col items-center justify-center px-4">
                <p class="text-sm font-inter text-tomTroc-darkgrey px-2 text-center">
                    Parcourez les livres disponibles chez d'autres membres.
                </p>
            </div>
            <div class="bg-white rounded-lg w-full h-36 flex flex-col items-center justify-center px-4">
                <p class="text-sm font-inter text-tomTroc-darkgrey px-2 text-center">
                    Proposez un échange et discutez avec d'autres passionnés de lecture.
                </p>
            </div>
        </div>
        <a href="/livres/nos-livres-a-l-echange" class="my-6 inline-block bg-tomTroc-bg border-solid border border-tomTroc-green text-tomTroc-green font-inter font-semibold px-6 py-4 rounded-lg hover:bg-tomTroc-darkgreen hover:text-white transition-colors transition-duration-1000 w-full md:w-auto text-center">
            Voir tous les livres
        </a>
    </div>
</section>
<!--BLOCK BANDEAU IMAGE-->
<section>
    <div class="flex items-center md:block">
        <img src="<?= ASSETS_PATH ?>img/bandeau.jpg" alt="" class="mx-auto" loading="lazy">
    </div>
    <div class="flex items-center md:hidden">
        <img src="<?= ASSETS_PATH ?>img/bandeau-mob.jpg" alt="" class="mx-auto" loading="lazy">
    </div>
</section>
<!--BLOCK NOS VALEURS-->
<section class="max-w-6xl mx-auto">
    <div class="px-5 pt-8 pb-2 max-w-sm mx-auto">
        <h2 class="text-3xl font-playfairDisplay mb-2 text-left">
            Nos valeurs
        </h2>
        <p class="font-inter mb-4 text-left text-sm md:text-base">
            Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.<br>
            <br>
            Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.<br>
            <br>
            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.
        </p>

    </div>
    <div class="px-5 pt-0 pb-6 max-w-sm mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 align-top">
        <div>
            <p class="font-inter text-left text-xs italic text-tomTroc-grey mr-auto md:mr-auto">
                L’équipe Tom Troc
            </p>
        </div>
        <div class="md:mr-0">
            <img src="<?= ASSETS_PATH ?>img/coeur.svg" alt="Coeur" class="mx-auto md:mr-auto">
        </div>
    </div>
</section>