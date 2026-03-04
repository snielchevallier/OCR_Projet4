<section class="bg-tomTroc-bg ">
                <div class="pt-4 pb-0 max-w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        
                        <div class="">
                            <img src="<?= UPLOADS_PATH ?>books/<?= $book->getCover() ?>" class="w-full">
                        </div>
                         <div class="bg-tomTroc-light py-12 px-5 md:ps-16 md:pe-20">
                            <h2 class="text-3xl font-playfairDisplay mb-6 md:mb-12 md:mt-4">
                                <?= $book->getTitle() ?>
                            </h2>
                            <p class="text-base font-inter text-tomTroc-grey">par <?= $book->getAuthor() ?></p>
                            <hr class="w-7 my-5">
                            <h3 class="font-inter font-semibold text-xs text-tomTroc-darkgrey">DESCRIPTION</h3>
                            <p class="font-inter text-sm text-tomTroc-darkgrey">
                                <?= $book->getDescription() ?>
                            </p>
                            <h3 class="py-5 font-inter font-semibold text-xs text-tomTroc-darkgrey">PROPRIÉTAIRE</h3>
                            <div class="flex items-center gap-3 w-40 px-3 py-1.5 bg-white rounded-full shadow-sm">
                                <img src="assets/img/profile_picture.jpg" class="w-12 h-12 rounded-full object-cover">
                                <span class="text-inter text-base text-tomTroc-darkgrey">Alexlecture</span>
                            </div>
                            <a href="#" class="my-6 inline-block bg-tomTroc-green text-white font-inter font-semibold px-6 py-4 rounded-lg hover:bg-tomTroc-darkgreen transition-colors transition-duration-1000 w-full text-center">
                                Envoyer un message
                            </a>
                        </div>
                    </div>
                </div>
            </section>