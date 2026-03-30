<!--BLOCK MESSAGERIE-->
            <section class="bg-tomTroc-bg">
                
                <div class="mt-5 max-w-6xl mx-auto  flex ">
                    <div class="bg-tomTroc-light min-h-[550px] w-full md:w-80">
                        <h2 class="text-3xl font-playfairDisplay px-5 mb-6 md:mb-12 mt-4">
                            Messagerie
                        </h2>
                        <?php foreach ($chats as $chat): 
                            $messageHour = new DateTime($chat['last_message_date']);
                            ?>
                            <a href="/messagerie?dest=<?=$chat['dest_user_id']?>">
                                <div class="border-solid border-b-2 border-white grid grid-cols-5 py-2 px-5 items-center w-full md:max-w-80">
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
                    <div class="hidden bg-tomTroc-bg md:block flex-1 min-h-[550px]">

                    </div>
                </div>
                
            </section>