<!--BLOCK PROFILE-->
            <section class="bg-tomTroc-bg ">
                <div class="mx-auto pt-4 pb-0 px-5 max-w-6xl">
                    <div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-5 pb-10">
                         <div class="bg-white py-12 px-5 justify-items-center rounded-lg md:ps-16 md:pe-20">
                            
                            <?php if ($user->getPhoto()): ?>
                               <img src="<?= UPLOADS_URL ?>users/<?=$user->getPhoto()?>" class="w-32 h-32 rounded-full">
                            <?php else: ?>
                                <img src="<?= ASSETS_PATH ?>/img/icon-profile-default" class="w-32 h-32 rounded-full">
                            <?php endif; ?>
                            <p class="pt-5 "><hr class="pt-5 px-24"></p>
                            <p class="pb-5 text-tomTroc-darkgrey font-playfairDisplay text-2xl"><?=$user->getPseudo()?></p>
                            <p class="pb-5 text-tomTroc-grey text-sm font-inter">Membre depuis <?= UTILS::timeElapsed($user->getCreatedAt())?></p>
                            <p class="pb-2 text-tomTroc-darkgrey font-inter text-xs font-semibold">BIBLIOTHEQUE</p>
                            <p class="pb-5 flex items-center text-tomTroc-darkgrey font-inter"><img src="assets/img/icon-biblio.svg" class="w-4 h-4"><?=count($books)?> livres</p>
                            <?php if(!($_SESSION["idUser"]===$user->getId())):?>
                            <p class="flex items-center text-tomTroc-darkgrey font-inter">
                                <a href="/messagerie?dest=<?=$user->getId()?>" class="w-full bg-tomTroc-bg text-tomTroc-green border-solid border-2 border-tomTroc-green font-inter font-semibold px-6 py-3 rounded-lg hover:bg-tomTroc-darkgreen hover:text-white transition" >
                                    Écrire un message
                                </a>
                            </p>
                            <?php endif;?>
                        </div>
                        <div class="rounded-lg py-5 md:py-0 px-0">
                            <div class="gap-2 pb-10 rounded-lg space-y-6 md:space-y-0">
                                <div class="hidden md:grid bg-white grid-cols-[90px_1fr_1fr_2fr] ps-5 pe-5 py-5 justify-items-left items-center rounded-t-lg rounded-b-none border-solid  border-b-2 border-tomTroc-bg">
                                    <div class="order-1 font-inter font-semibold text-xs md:px-2">Photo</div>
                                    <div class="order-2 font-inter font-semibold text-xs md:px-2">Titre</div>
                                    <div class="order-3 font-inter font-semibold text-xs md:px-2">Auteur</div>
                                    <div class="order-4 font-inter font-semibold text-xs md:px-2">Description</div>
                                </div>

                                <?php 
                                $i = 0;
                                foreach ($books as $book):     
                                ?>
                                <a href="/livres/detail-livre?id=<?=$book->getId()?>">
                                <div class="bg-white <?= $i%2 === 1 ? ' md:bg-tomTroc-blue' : '' ?> grid grid-cols-2 grid-cols-[90px_1fr] md:grid-cols-[90px_1fr_1fr_2fr] p-14 md:ps-16 md:pe-20 md:py-5 justify-items-left items-center rounded-lg md:rounded-none">
                                    <div class="order-1 row-span-2">
                                        <?php if ($book->getCover()): ?>
                                            <img src="<?= UPLOADS_URL ?>books/<?=$book->getCover()?>" alt="<?=htmlspecialchars($book->getTitle())?>" class="w-20 ">
                                        <?php else: ?>
                                            <img src="<?= ASSETS_PATH ?>/img/icon-book-default.png" alt="<?=htmlspecialchars($book->getTitle())?>" class="w-20 h-20 aspect-square">
                                        <?php endif; ?>
                                    </div>
                                    <div class="order-2 font-inter text-sm md:px-2"><?=htmlspecialchars($book->getTitle())?></div>
                                    <div class="order-3 font-inter text-sm md:px-2"><?=htmlspecialchars($book->getAuthor())?></div>
                                    <div class="order-5 col-span-2 font-inter italic text-sm pt-4 md:px-2 md:pt-0 md:order-4 md:col-span-1">J<?=htmlspecialchars(substr($book->getDescription(),0,100))?>...</div>
                                </div>
                                </a>
                                <?php 
                                $i++; 
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>