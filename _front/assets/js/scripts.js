  const btn = document.getElementById("menu-btn");
  const menuMobile = document.getElementById("menu");

  btn.addEventListener("click", () => {
    menuMobile.classList.toggle("hidden");
  });