 <!--BLOCK ACCOUNT-->
            <section class="bg-tomTroc-bg ">
                <div class="mx-auto pt-4 pb-0 max-w-6xl">
                    <h2 class="text-3xl font-playfairDisplay px-5 mb-6 md:mb-12 md:mt-4">
                        Mon compte
                    </h2>
                </div>
                <div class="mx-auto pt-4 pb-0 px-5 max-w-6xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pb-10">
                         <div class="bg-white py-12 px-5 flex flex-col items-center rounded-lg md:ps-16 md:pe-20">
                            
                            <?php if ($user->getPhoto()): ?>
                               <img src="<?= UPLOADS_URL ?>users/<?=$user->getPhoto()?>" class="w-32 h-32 rounded-full">
                            <?php else: ?>
                                <img src="<?= ASSETS_PATH ?>img/icon-profile-default" class="w-32 h-32 rounded-full">
                            <?php endif; ?>
                            <label for="photo" class="pt-2 pb-5 text-tomTroc-grey text-sm font-inter cursor-pointer hover:underline">
                                modifier
                            </label>
                            <hr class="pb-5 px-24">
                            <p class="pb-5 text-tomTroc-darkgrey font-playfairDisplay text-2xl"><?=htmlspecialchars($user->getPseudo())?></p>
                            <p class="pb-5 text-tomTroc-grey text-sm font-inter">Membre depuis <?= UTILS::timeElapsed($user->getCreatedAt())?></p>
                            <p class="pb-2 text-tomTroc-darkgrey font-inter text-xs font-semibold">BIBLIOTHEQUE</p>
                            <p class="flex items-center text-tomTroc-darkgrey font-inter">
                                <img src="<?= ASSETS_PATH?>img/icon-biblio.svg" class="w-4 h-4"><?=count($books)?> livres
                            </p>
                           
                        </div>
                        <div class="bg-white rounded-lg py-12 px-7">
                            <p class="text-base">
                                Vos informations personnelles
                            </p>
                            <?php if (Utils::request("errorMessage")): ?>
                            <p class="text-sm font-inter text-tomTroc-red text-center my-6 md:my-12">
                                <?=Utils::request("errorMessage")?>
                            </p>
                            <?php endif; ?>
                            <?php if (Utils::request("message")): ?>
                            <p class="text-sm font-inter text-tomTroc-green text-center my-6 md:my-12">
                                <?=Utils::request("message")?>
                            </p>
                            <?php endif; ?>
                            <form method="POST" action="/updateUser" class="space-y-6" enctype="multipart/form-data">
                                <input id="photo" name="photo" type="file" class="hidden" accept="image/*">
                                <div>
                                    <label for="email" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                                        Adresse email
                                    </label>
                                    <input 
                                        type="email"
                                        name="email"
                                        id="email"
                                        value="<?=htmlspecialchars($user->getEmail())?>"
                                        class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-tomTroc-blue focus:outline-none focus:ring-2 focus:ring-tomTroc-green"
                                    >
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                                        Mot de passe
                                    </label>
                                    <input 
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="••••••••"
                                        class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-tomTroc-blue focus:outline-none focus:ring-2 focus:ring-tomTroc-green"
                                    >
                                </div>
                                <div>
                                    <label for="pseudo" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                                        Pseudo
                                    </label>
                                    <input 
                                        type="text"
                                        name="pseudo"
                                        id="pseudo"
                                        value="<?=htmlspecialchars($user->getPseudo())?>"
                                        class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-tomTroc-blue focus:outline-none focus:ring-2 focus:ring-tomTroc-green"
                                    >
                                </div>
                                <button 
                                    type="submit"
                                    class="w-full bg-tomTroc-bg text-tomTroc-green border-solid border-2 border-tomTroc-green font-inter font-semibold px-6 py-3 rounded-lg hover:bg-tomTroc-darkgreen hover:text-white transition"
                                >
                                    Enregistrer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="mx-auto pt-4 pb-0 px-5 max-w-6xl">
                    <?php if (Utils::request("bookErrorMessage")): ?>
                        <p class="text-sm font-inter text-tomTroc-red text-center my-6 md:my-12">
                            <?=Utils::request("bookErrorMessage")?>
                        </p>
                        <?php endif; ?>
                        <?php if (Utils::request("bookMessage")): ?>
                        <p class="text-sm font-inter text-tomTroc-green text-center my-6 md:my-12">
                            <?=Utils::request("bookMessage")?>
                        </p>
                    <?php endif; ?>
                    <div class="gap-5 pb-10 rounded-lg space-y-6 md:space-y-0">
                        <div class="hidden md:grid bg-white grid-cols-[90px_1fr_1fr_2fr_1fr_90px_90px] ps-16 pe-20 py-5 justify-items-left items-center rounded-t-lg rounded-b-none border-solid  border-b-2 border-tomTroc-bg">
                            <div class="order-1 font-inter font-semibold text-xs leading-3 md:px-2">Photo</div>
                            <div class="order-2 font-inter font-semibold text-xs leading-3 md:px-2">Titre</div>
                            <div class="order-3 font-inter font-semibold text-xs leading-3 md:px-2">Auteur</div>
                            <div class="order-4 font-inter font-semibold text-xs md:px-2">Description</div>
                            <div class="order-5 font-inter font-semibold text-xs md:px-2">Statut</div>
                            <div class="order-6 col-span-2 font-inter font-semibold text-xs md:px-2">Action</div>
                            
                        </div>
                        <?php 
                        $i = 0;
                        foreach ($books as $book):     
                        ?>
                        <div class="bg-white grid <?= $i%2 === 1 ? ' md:bg-tomTroc-blue' : '' ?> grid-cols-2 grid-cols-[90px_1fr] md:grid-cols-[90px_1fr_1fr_2fr_1fr_90px_90px] md:grid-cols-7 p-14 md:ps-16 md:pe-20 md:py-5 justify-items-left items-center rounded-lg md:rounded-none">
                            <div class="order-1 row-span-3">
                                <?php if ($book->getCover()): ?>
                                    <img src="<?= UPLOADS_URL ?>books/<?=$book->getCover()?>" alt="<?=htmlspecialchars($book->getTitle())?>" class="w-20 ">
                                <?php else: ?>
                                    <img src="<?= ASSETS_PATH ?>img/icon-book-default.png" alt="<?=htmlspecialchars($book->getTitle())?>" class="w-20 h-20 aspect-square">
                                <?php endif; ?>
                            </div>
                            <div class="order-2 font-inter text-sm leading-3 md:px-2"><?=htmlspecialchars($book->getTitle())?></div>
                            <div class="order-3 font-inter text-sm leading-3 md:px-2"><?=htmlspecialchars($book->getAuthor())?></div>
                            <div class="order-5 col-span-2 font-inter italic text-sm pt-4 md:px-2 md:pt-0 md:order-4 md:col-span-1"><?=htmlspecialchars(substr($book->getDescription(),0,100))?>...</div>
                            <div class="order-4 font-inter text-xs pt-2 md:order-5 md:px-2">
                            <?php if ($book->getStatus()==='available'): ?>
                                <span class="bg-tomTroc-lightgreen py-1 px-2 rounded-full text-white">disponible</span>
                            <?php else: ?>
                                <span class="bg-tomTroc-lightred py-1 px-2 rounded-full text-white">non dispo.</span>
                            <?php endif; ?>
                            </div>
                            <div class="order-6 font-inter pt-10 md:pt-0 md:px-2"><a href="/account/editer-livre?id=<?=$book->getId()?>" class="font-inter text-tomTroc-darkgrey text-base">Éditer</a></div>
                            <div class="order-7 font-inter pt-10 md:pt-0 md:px-2"><a href="/supprimer-livre?id=<?=$book->getId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');" class="font-inter text-base text-tomTroc-red">supprimer</a></div>
                        </div>
                        <?php 
                        $i++; 
                        endforeach; ?>
                    </div>
                </div>    
            </section>