  <!--BLOCK NOS LIVRES A L'ECHANGE-->
            <section class="bg-tomTroc-light ">
                <div class="px-5 pt-4 pb-6 text-center max-w-full justify-items-center">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10 items-center">
                        <div class="col-span-2 w-full mb-2 md:mb-12 md:mt-4 md:text-left">
                            <h2 class="text-3xl font-playfairDisplay ">
                                Nos livres à l'échange
                            </h2>
                        </div>
                        <div class="col-span-2 w-full mb-2 md:mb-12 md:mt-4 md:flex md:justify-end">
                            <form class="w-full md:w-auto">   
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                                        <img src="./assets/img/icon-search.svg" class="w-5 h-5">
                                    </div>
                                    <input type="search" id="search" name="search" value="<?= Utils::request('search')?>" class="block w-full md:w-80 p-4 ps-10 text-sm text-gray-900 border border-tomTroc-lightgrey rounded-lg bg-white italic" placeholder="Rechercher un livre" />
                                </div>
                            </form>
                        </div>
                        <?php if(!count($books)): ?>
                            <div class="col-span-4 w-full mb-2 md:mb-12 md:mt-4">
                                <p class="text-2xl font-inter ">
                                    Aucun résultat trouvé
                                </p>
                            </div>
                        <?php else:?>
                            <?php foreach ($books as $book): ?>
                                <a href="/detail-livre?id=<?=$book->getId() ?>">
                                <div class="bg-white rounded-b-lg w-40 md:w-52">
                                    <div class="bg-no-repeat bg-cover w-full aspect-square" style="background-image: url('<?= UPLOADS_URL ?>books/<?= $book->getCover() ?>');">
                                    </div>
                                    <h3 class="text-sm font-inter font-semibold my-2 px-2 text-left"><?= htmlspecialchars($book->getTitle()) ?></h3>
                                    <p class="text-xs font-inter text-tomTroc-grey mb-4 px-2 text-left"><?= htmlspecialchars($book->getAuthor()) ?></p>
                                    <p class="text-2xs font-inter text-tomTroc-grey italic mb-2 px-2 text-left">Vendu par : <?= htmlspecialchars($book->getOwner_name()) ?></p>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </div>
                </div>
            </section>



            