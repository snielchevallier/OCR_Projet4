<section class="bg-tomTroc-bg ">
                <div class="mx-auto pt-4 pb-0 max-w-6xl">
                    <a href="/account" class="text-xs text-tomTroc-grey font-inter px-5 mb-6 md:mb-12 md:mt-4">
                        &larr; retour
                    </a>
                    <h2 class="text-3xl font-playfairDisplay px-5 mb-6 md:mb-12 md:mt-4">
                        Modifier les informations
                    </h2>
                </div>
                <div class="mx-auto pt-4 pb-0 px-5 max-w-6xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 pb-10">
                         <div class="bg-white pt-6 px-5 flex flex-col items-center rounded-t-lg md:rounded-t-none md:rounded-l-lg md:ps-12 md:pe-18">
                            <p class="self-start block text-sm font-inter mb-2 text-tomTroc-grey">Photo</p>
                            <img src="<?= UPLOADS_URL ?>books/<?= $book->getCover() ?>" class="w-full">
                            <label for="cover" class="self-end underline pt-2 pb-5 text-tomTroc-darkgrey text-sm font-inter cursor-pointer hover:underline">
                                modifier la photo
                            </label>
                            
                        </div>
                        <div class="bg-white rounded-b-lg md:rounded-b-none md:rounded-r-lg py-6 px-7">
                            <form method="POST" action="/update-book" class="space-y-6" enctype="multipart/form-data">
                                <input id="idBook" name="idBook" value="<?= $book->getId() ?>" type="hidden">
                                <input id="cover" name="cover" type="file" class="hidden">
                                <div>
                                    <label for="titre" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                                        Titre
                                    </label>
                                    <input 
                                        type="text"
                                        name="titre"
                                        id="titre"
                                        value="<?=htmlspecialchars($book->getTitle())?>"
                                        class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-tomTroc-blue focus:outline-none focus:ring-2 focus:ring-tomTroc-green"
                                    >
                                </div>
                                <div>
                                    <label for="author" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                                        Auteur
                                    </label>
                                    <input 
                                        type="text"
                                        name="author"
                                        id="author"
                                        value="<?=htmlspecialchars($book->getAuthor())?>"
                                        class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-tomTroc-blue focus:outline-none focus:ring-2 focus:ring-tomTroc-green"
                                    >
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                                        Commentaire
                                    </label>
                                    <textarea name="description" id="description" class="resize-none w-full h-80 px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-tomTroc-blue focus:outline-none focus:ring-2 focus:ring-tomTroc-green"><?=htmlspecialchars($book->getDescription())?></textarea>
                                </div>
                                <div>
                                    <label for="status" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                                        Disponibilité
                                    </label>
                                    <select name="status" id="status" class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-tomTroc-blue focus:outline-none focus:ring-2 focus:ring-tomTroc-green">
                                        <option value="available" <?= $book->getStatus() === 'available' ? 'selected' : '' ?>>Disponible</option>
                                        <option value="unavailable" <?= $book->getStatus() === 'unavailable' ? 'selected' : '' ?>>Indisponible</option>
                                    </select>
                                </div>
                                <button 
                                    type="submit"
                                    class="w-full md:w-80 bg-tomTroc-green text-white border-solid border-2 border-tomTroc-green font-inter font-semibold px-6 py-3 rounded-lg hover:bg-tomTroc-darkgreen hover:text-white transition"
                                >
                                    Valider
                                </button>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>