const button = document.querySelector("#mobile-menu-button");
const menu = document.querySelector("#mobile-menu");

if (button && menu) {
  button.addEventListener("click", () => {
    const isHidden = menu.classList.contains("hidden");
    menu.classList.toggle("hidden", !isHidden);
    button.setAttribute("aria-expanded", String(isHidden));
  });
}
