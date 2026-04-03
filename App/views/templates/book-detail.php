<section class="bg-tomTroc-bg ">
                <div class="pt-4 pb-0 max-w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        
                        <div class="">
                            <img src="<?= htmlspecialchars(UPLOADS_URL .'books/'. $book->getCover(), ENT_QUOTES, 'UTF-8') ?>" class="w-full" alt="couverture du livre <?= htmlspecialchars($book->getTitle(), ENT_QUOTES, 'UTF-8') ?>">
                        </div>
                         <div class="bg-tomTroc-light py-12 px-5 md:ps-16 md:pe-20">
                            <h1 class="text-3xl font-playfairDisplay mb-6 md:mb-2 md:mt-4">
                                <?= htmlspecialchars($book->getTitle(), ENT_QUOTES, 'UTF-8') ?>
                            </h1>
                            <p class="text-base font-inter text-tomTroc-grey">par <?= htmlspecialchars($book->getAuthor(), ENT_QUOTES, 'UTF-8') ?></p>
                            <hr class="w-7 my-5">
                            <h2 class="font-inter font-semibold text-xs text-tomTroc-darkgrey pb-2 ">DESCRIPTION</h2>
                            <p class="font-inter text-sm text-tomTroc-darkgrey">
                                <?= htmlspecialchars($book->getDescription(), ENT_QUOTES, 'UTF-8') ?>
                            </p>
                            <h2 class="pt-5 pb-2 font-inter font-semibold text-xs text-tomTroc-darkgrey">PROPRIÉTAIRE</h2>
                            

                                <a href="/profil?id=<?= htmlspecialchars($owner->getId(), ENT_QUOTES, 'UTF-8')?>" class="inline-flex  items-center gap-3 px-3 py-1.5 bg-white rounded-full shadow-sm">
                                    <?php if ($owner->getPhoto()): ?>
                                        <img src="<?=  htmlspecialchars(UPLOADS_URL.'users/'.$owner->getPhoto(), ENT_QUOTES, 'UTF-8')?>" class="w-12 h-12 rounded-full object-cover" alt="photo de profil <?= htmlspecialchars($owner->getPseudo(), ENT_QUOTES, 'UTF-8')?>" loading="lazy">
                                    <?php else: ?>
                                        <img src="<?= htmlspecialchars(ASSETS_PATH.'img/icon-profile-default', ENT_QUOTES, 'UTF-8')?>" class="w-12 h-12 rounded-full object-cover" alt="photo de profil <?= htmlspecialchars($owner->getPseudo(), ENT_QUOTES, 'UTF-8')?>" loading="lazy">
                                    <?php endif; ?>
                                    <span class="text-inter text-base text-tomTroc-darkgrey"><?= htmlspecialchars($owner->getPseudo(), ENT_QUOTES, 'UTF-8') ?></span>
                                </a>
                            
                            <?php if(isset($_SESSION["idUser"])&&!($_SESSION["idUser"]===$owner->getId())):?>
                            <a href="/messagerie?dest=<?= htmlspecialchars($owner->getId(), ENT_QUOTES, 'UTF-8')?>" class="my-6 inline-block bg-tomTroc-green text-white font-inter font-semibold px-6 py-4 rounded-lg hover:bg-tomTroc-darkgreen transition-colors transition-duration-1000 w-full text-center">
                                Envoyer un message
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>