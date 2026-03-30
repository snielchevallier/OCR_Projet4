<!--BLOCK DISCUSSION-->
            <section class="bg-tomTroc-bg">
                
                <div class="mt-5 max-w-6xl mx-auto  flex ">
                    <div class="bg-tomTroc-light min-h-[550px] w-full md:w-80 hidden md:block">
                        <h2 class="text-3xl font-playfairDisplay px-5 mb-6 md:mb-12 mt-4">
                            Messagerie
                        </h2>
                        <?php foreach ($chats as $chat): 
                            $messageHour = new DateTime($chat['last_message_date']);
                            ?>
                            <a href="/messagerie?dest=<?=$chat['dest_user_id']?>">
                                <div class="border-solid border-b-2 <?php if($chat['dest_user_id']===$user_dest->getId()):?>bg-white<?php endif;?> border-white grid grid-cols-5 py-2 px-5 items-center w-full md:max-w-80">
                                    <div class="col-span-1">
                                        <?php if(!empty($chat['dest_user_photo'])): ?>
                                    <img src="<?= UPLOADS_URL ?>users/<?=$chat['dest_user_photo']?>" class="w-12 h-12 rounded-full rowspan-2" alt="<?=$chat['dest_user_pseudo']?>">
                                    <?php else: ?>
                                        <img src="<?= ASSETS_PATH ?>img/icon-profile-default" class="w-12 h-12 rounded-full rowspan-2" alt="<?=$chat['dest_user_pseudo']?>">
                                    <?php endif; ?>
                                    </div>
                                    <div class="col-span-4 ps-2">
                                        <p class="font-inter text-sm text-tomTroc-darkgrey flex justify-between">
                                            <?=$chat['dest_user_pseudo']?>
                                            <span class="self-item-right"><?=$messageHour->format('H:i')?></span>
                                        </p>
                                        <p class="font-inter text-xs text-tomTroc-grey">
                                            <?=$chat['last_message']?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="bg-tomTroc-light flex-1 h-[80vh] flex flex-col">
                        <a href="/messagerie" class="block md:hidden text-xs text-tomTroc-grey font-inter px-5 mb-6 md:mb-12 md:mt-4">
                            &larr; retour
                        </a>
                        <div class="inline-flex items-center gap-3 min-w-[10rem] px-3 py-1.5">
                            <?php if ($user_dest->getPhoto()): ?>
                               <img src="<?= UPLOADS_URL ?>users/<?=$user_dest->getPhoto()?>" class="w-12 h-12 rounded-full object-cover" alt="<?=$user_dest->getPseudo();?>">
                            <?php else: ?>
                                <img src="<?= ASSETS_PATH ?>img/icon-profile-default" class="w-12 h-12 rounded-full object-cover" alt="<?=$user_dest->getPseudo();?>">
                            <?php endif; ?>
                            <span class="text-inter text-base font-semibold text-tomTroc-darkgrey whitespace-nowrap">
                                <?=$user_dest->getPseudo();?>
                            </span>
                        </div>
                        <div class="flex flex-col flex-1 overflow-hidden">
                            <div id="conversation" class="flex-1 overflow-y-auto flex flex-col ">
                                <div class="mt-auto"></div>
                                <?php foreach ($messages as $message): ?>
                                    <?php if($message->getAuthorId()===$user_dest->getId()):?>
                                    <div class="flex items-start gap-2 mb-4 px-5">
                                        <div class="max-w-[80%]">
                                            <span class="flex gap-2 items-center text-xs text-tomTroc-grey px-3 mb-2">
                                                <?php if ($user_dest->getPhoto()): ?>
                                                    <img src="<?= UPLOADS_URL ?>users/<?=$user_dest->getPhoto()?>" class="w-5 h-5 rounded-full object-cover" alt="<?=$user_dest->getPseudo();?>"> 
                                                <?php else: ?>
                                                    <img src="<?= ASSETS_PATH ?>img/icon-profile-default" class="w-5 h-5 rounded-full object-cover" alt="<?=$user_dest->getPseudo();?>"> 
                                                
                                                <?php endif; ?>
                                                <?=$message->getCreatedAt()->format('d.m H:i')?>
                                            </span>
                                            <div class="bg-white px-4 py-2 rounded-lg">
                                                <?=$message->getContent()?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php else:?>
                                        <div class="flex justify-end mb-4 px-5">
                                            <div class="max-w-[80%]">
                                                <span class="block text-xs text-tomTroc-grey mb-1 text-right">
                                                    <?=$message->getCreatedAt()->format('d.m H:i')?>
                                                </span>
                                                <div class="bg-tomTroc-blue text-tomTroc-darkgrey px-4 py-2 rounded-lg">
                                                    <?=$message->getContent()?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach; ?>
                                
                            </div>
                            <form method="POST" action="/sendMessage" class="px-5 my-8 md:flex gap-2 items-center md:items-stretch">
                                <input type="hidden" name="dest" value="<?=$user_dest->getId();?>">
                                <input 
                                    type="text"
                                    name="message"
                                    id="message"
                                    placeholder="Tapez votre message ici"
                                    class="w-full px-4 py-3 text-sm border border-tomTroc-lightgrey rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-tomTroc-green"
                                >
                                <button 
                                    type="submit"
                                    class="mt-2 md:mt-0 w-full md:w-36 bg-tomTroc-green text-white border-solid border-2 border-tomTroc-green font-inter font-semibold px-4 py-3 rounded-lg hover:bg-tomTroc-darkgreen hover:text-white transition"
                                >
                                        Envoyer
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </section>