document.addEventListener('DOMContentLoaded', () => {
  //***gestion du burger menu */
  const btn = document.getElementById("menu-btn");
  const menuMobile = document.getElementById("menu");

  btn.addEventListener("click", () => {
    menuMobile.classList.toggle("hidden");
  });

  //***scroll bottom au chargement pour la messagerie */
  const messagesContainer = document.getElementById('conversation');

  if (!messagesContainer) return;
    function scrollToBottom() {
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
  }

  scrollToBottom();
});