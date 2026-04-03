<!--HEADER-->
        <header>
            <nav class="relative max-w-6xl mx-auto px-4 py-4 flex items-center">
                
                <a href="/">
                    <img src="<?= ASSETS_PATH?>img/logo.svg" alt="Tom Troc" class="h-10">
                </a>
                <button id="menu-btn" class="md:hidden ml-auto" aria-expanded="false" aria-controls="menu" aria-label="Ouvrir le menu">
                    <img src="<?= ASSETS_PATH?>img/icon-menu.svg" alt="" class="h-6">
                </button>
                <!-- Menu -->
                <ul id="menu" 
                    class="z-50 hidden absolute top-16 left-0 w-full bg-white 
                        flex flex-col gap-4 p-6 text-sm font-inter
                        md:static md:flex md:flex-row md:items-center 
                        md:gap-8 md:p-0 md:bg-transparent 
                        md:flex-1 md:ml-8">

                    <li>
                        <a href="/" class="block py-2 <?php if($rubrique==='home'):?>font-semibold<?php endif;?> hover:text-tomTroc-green">Accueil</a>
                    </li>
                    <li>
                        <a href="/livres/nos-livres-a-l-echange" class="block py-2 <?php if($rubrique==='livres'):?>font-semibold<?php endif;?> hover:text-tomTroc-green">Nos livres à l'échange</a>
                    </li>
                    <?php if (Utils::isConnected()): ?>
                    <li class="md:ml-auto flex items-center gap-2">
                        <img src="<?= ASSETS_PATH?>img/icon-message.svg" alt="" aria-hidden="true" class="h-5">
                        <a href="/messagerie" class="block py-2 <?php if($rubrique==='chat'):?>font-semibold<?php endif;?> hover:text-tomTroc-green">Messagerie <span class="bg-black text-white rounded-full text-xs px-1 py-1 mx-2"><?=$nbUnreadMessages?></span></a>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="<?= ASSETS_PATH?>img/icon-account.svg" alt="" aria-hidden="true" class="h-5"><a href="/account" class="block py-2 <?php if($rubrique==='account'):?>font-semibold<?php endif;?> hover:text-tomTroc-green">Mon compte</a>
                    </li>
                    <li>
                        <a href="/disconnect" class="block py-2 hover:text-tomTroc-green">Déconnexion</a>
                    </li>
                    <?php else:?>
                    <li class="md:ml-auto flex items-center gap-2">
                        <?php if (Utils::isConnected()): ?>
                        <a href="/disconnect" class="block py-2 hover:text-tomTroc-green">Déconnexion</a>
                        <?php else: ?>
                        <a href="/connexion" class="block py-2 <?php if($rubrique==='connexion'):?>font-semibold<?php endif;?> hover:text-tomTroc-green">Connexion</a>
                        <?php endif; ?>
                    </li>
                     <?php endif; ?>
                </ul>

            </nav>
        </header>