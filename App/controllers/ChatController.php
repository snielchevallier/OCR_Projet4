<?php

declare(strict_types=1);
/**
 * Contrôleur qui gère les différentes actions liées à la messagerie.
 * Il utilise le ChatManager pour interagir avec la base de données et le UserManager pour récupérer les informations sur les utilisateurs.
 * Les méthodes de ce contrôleur sont utilisées pour afficher la liste des chats, afficher une conversation, envoyer un message et marquer une conversation comme lue.
 */
class ChatController
{


    private UserManager $userManager;
    private ChatManager $chatManager;
    private ChatUserManager $chatUserManager;
    private MessageManager $messageManager;
    /** Constructeur de la classe ChatController.
     * Il initialise les managers nécessaires pour les différentes méthodes de ce controlleur.
     */
    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->chatManager = new ChatManager();
        $this->chatUserManager = new ChatUserManager();
        $this->messageManager = new MessageManager();
    }
    /** Affiche la page de messagerie. Si un destinataire est spécifié, affiche la conversation avec ce destinataire. Sinon, affiche la liste des chats de l'utilisateur connecté.
     * @return void
     */
    public function showChat(): void
    {
        if (Utils::isConnected()) {
            $dest_user = Utils::request("dest");
            $curr_user = $_SESSION['idUser'];
            //Charge tous les chats de l'utilisateur connecté
            $chats = $this->chatManager->getChatsByParticipant(intval($curr_user));
            if (isset($dest_user)) {
                //si il y a un destinataire, affiche la vue chat avec la partie message

                $dest_user = $this->userManager->getUserById(intval($dest_user));
                //charge les messages de la conversation
                if ($dest_user) {
                    $curr_chat = $this->chatManager->getChatByParticipants(intval($curr_user), intval($dest_user->getId()));
                    if (!empty($curr_chat)) {
                        $messages = $this->messageManager->getMessagesByChat(intval($curr_chat->getId()));
                        //met à jour le champs last_read_at du user du chat
                        $this->chatUserManager->markAsRead(intval($curr_chat->getId()), $curr_user);
                    } else {
                        $messages = [];
                    }
                    $view = new View("Messagerie", "chat");
                    $view->render("chat", ['user_dest' => $dest_user, 'messages' => $messages, 'chats' => $chats]);
                } else {
                    $view = new View("Messagerie", "chat");
                    $view->render("messaging", ['chats' => $chats]);
                }
            } else {
                //si pas de destinataire, affiche la liste des chat sans la partie message
                $view = new View("Messagerie", "chat");
                $view->render("messaging", ['chats' => $chats]);
            }
        } else {
            Utils::redirect("connexion");
        }
    }
    /** Traite l'envoi d'un message. Si le destinataire n'existe pas, redirige vers la page de messagerie avec une erreur. 
     *  Si l'utilisateur n'est pas connecté, redirige vers la page de connexion.
     * @return void
     */
    public function sendMessage()
    {
        if (Utils::isConnected()) {
            try {
                //récupère le user connecté, le destinataire et le message
                $dest = Utils::request("dest");
                $textMessage = Utils::request("message");

                $dest_user = $this->userManager->getUserById(intval($dest));
                if (!$dest_user) {
                    throw new Exception("Destinataire introuvable");
                }
                $curr_user = $this->userManager->getUserById(intval($_SESSION['idUser']));

                //si un chat existe déjà, récupére les infos du chat
                $chat = $this->chatManager->getChatByParticipants($curr_user->getId(), $dest_user->getId());
                //si pas de chat, crée un nouveau chat avec les users concernés et récupère les infos du chat
                if (!$chat) {
                    $chat = $this->chatManager->createChat(new Chat([]));
                    //ajoute les users au chat
                    $chatUserCurr = $this->chatUserManager->createUserChat(new ChatUser(['chat_id' => $chat->getId(), 'user_id' => $curr_user->getId()]));
                    $chatUserDest = $this->chatUserManager->createUserChat(new ChatUser(['chat_id' => $chat->getId(), 'user_id' => $dest_user->getId()]));
                }

                //crée le message avec les infos de l'auteur et l'id du chat concerné
                $message = new Message([
                    'chat_id' => $chat->getId(),
                    'author_id' => $curr_user->getId(),
                    'content' => $textMessage
                ]);
                $this->messageManager->addMessage($message);
                Utils::redirect("/messagerie", ['dest' => $dest_user->getId()]);
            } catch (Exception $e) {
                Utils::redirect("/messagerie", ['error' => 'message_failed']);
            }
        } else {
            Utils::redirect("connexion");
        }
    }
}
