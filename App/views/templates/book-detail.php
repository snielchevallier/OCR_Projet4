<section class="bg-tomTroc-bg ">
                <div class="pt-4 pb-0 max-w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        
                        <div class="">
                            <img src="<?= UPLOADS_URL ?>books/<?= $book->getCover() ?>" class="w-full">
                        </div>
                         <div class="bg-tomTroc-light py-12 px-5 md:ps-16 md:pe-20">
                            <h2 class="text-3xl font-playfairDisplay mb-6 md:mb-12 md:mt-4">
                                <?= htmlspecialchars($book->getTitle()) ?>
                            </h2>
                            <p class="text-base font-inter text-tomTroc-grey">par <?= htmlspecialchars($book->getAuthor()) ?></p>
                            <hr class="w-7 my-5">
                            <h3 class="font-inter font-semibold text-xs text-tomTroc-darkgrey">DESCRIPTION</h3>
                            <p class="font-inter text-sm text-tomTroc-darkgrey">
                                <?= htmlspecialchars($book->getDescription()) ?>
                            </p>
                            <h3 class="py-5 font-inter font-semibold text-xs text-tomTroc-darkgrey">PROPRIÉTAIRE</h3>
                            <a href="/profil?id=<?=$owner->getId()?>">
                                <div class="inline-flex  items-center gap-3 px-3 py-1.5 bg-white rounded-full shadow-sm">
                                    <?php if ($owner->getPhoto()): ?>
                                    <img src="<?= UPLOADS_URL ?>users/<?=$owner->getPhoto()?>" class="w-12 h-12 rounded-full object-cover">
                                    <?php else: ?>
                                        <img src="<?= ASSETS_PATH ?>/img/icon-profile-default" class="w-12 h-12 rounded-full object-cover">
                                    <?php endif; ?>
                                    <span class="text-inter text-base text-tomTroc-darkgrey"><?= htmlspecialchars($owner->getPseudo()) ?></span>
                                </div>
                            </a>
                            <a href="/messagerie?dest=<?=$owner->getId()?>" class="my-6 inline-block bg-tomTroc-green text-white font-inter font-semibold px-6 py-4 rounded-lg hover:bg-tomTroc-darkgreen transition-colors transition-duration-1000 w-full text-center">
                                Envoyer un message
                            </a>
                        </div>
                    </div>
                </div>
            </section>