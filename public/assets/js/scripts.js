document.addEventListener('DOMContentLoaded', () => {
const btn = document.getElementById("menu-btn");
const menuMobile = document.getElementById("menu");

btn.addEventListener("click", () => {
  const isOpen = btn.getAttribute("aria-expanded") === "true";

  // Toggle état
  btn.setAttribute("aria-expanded", !isOpen);
  menuMobile.classList.toggle("hidden");

  // Accessibilité
  menuMobile.setAttribute("aria-hidden", isOpen);

  // Gestion du focus
  if (!isOpen) {
    const firstLink = menuMobile.querySelector("a");
    firstLink.focus();
  } else {
    btn.focus();
  }
});

document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    btn.setAttribute("aria-expanded", "false");
    menuMobile.classList.add("hidden");
    menuMobile.setAttribute("aria-hidden", "true");
    btn.focus();
  }
});

  //***scroll bottom au chargement pour la messagerie */
  const messagesContainer = document.getElementById('conversation');

  if (!messagesContainer) return;
    function scrollToBottom() {
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
  }

  scrollToBottom();
});