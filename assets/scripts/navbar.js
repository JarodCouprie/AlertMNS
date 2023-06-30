/**
 * Dark
 * Load theme on page load
 * Toggle theme on button click
 */

const body = document.querySelector("body");
const themeButton = document.querySelector("#theme-button");

themeButton.addEventListener("click", () => {
  body.classList.toggle("light");
  body.classList.style.backgroundColor = "#fff";
});

console.log("aled");
