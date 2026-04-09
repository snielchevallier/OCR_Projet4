<!--BLOCK CONNEXION-->
<section class="bg-tomTroc-bg ">
    <div class="pt-4 pb-0 max-w-full">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="bg-tomTroc-light py-12 px-5  md:ps-16 md:pe-20">
                <h1 class="text-3xl font-playfairDisplay mb-6 md:mb-12 md:mt-4">
                    Connexion
                </h1>
                <?php if (Utils::request("errorMessage")): ?>
                    <p class="text-sm font-inter text-tomTroc-red text-center mb-6 md:mb-12">
                        Connexion refusée, vérifiez votre email et/ou votre mot de passe.
                    </p>
                <?php endif; ?>
                <form method="POST" action="/connect" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                            Adresse email
                        </label>
                        <input
                            required
                            type="email"
                            name="email"
                            id="email"
                            class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-tomTroc-green">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-inter mb-2 text-tomTroc-grey">
                            Mot de passe
                        </label>
                        <input
                            required
                            type="password"
                            name="password"
                            id="password"
                            class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-tomTroc-green">
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-tomTroc-green text-white font-inter font-semibold px-6 py-3 rounded-lg hover:bg-tomTroc-darkgreen transition">
                        Se connecter
                    </button>
                </form>
                <p class="mt-8 text-sm font-inter text-tomTroc-darkfrey">
                    Pas de compte ?
                    <a href="/inscription" class="text-tomTroc-darkgrey underline">
                        Inscrivez-vous
                    </a>
                </p>
            </div>
            <div class="">
                <img src="<?= htmlspecialchars(ASSETS_PATH . 'img/img-users.jpg', ENT_QUOTES, 'UTF-8') ?>" class="w-full" alt="une bibliothèque remplie de livres">
            </div>
        </div>
    </div>
</section>