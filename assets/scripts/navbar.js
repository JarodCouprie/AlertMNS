/**
 * Dark
 * Load theme on page load
 * Toggle theme on button click
 */

const body = document.querySelector("body");
const themeButton = document.querySelector("#theme-button");
const themeDialog = document.querySelector("#theme-dialog");

/**
 * Fires the openCheck function when clicking on the theme button
 */
themeButton.addEventListener("click", () => {
  openCheck(themeDialog);
});

/**
 * Checks if a dialog is open
 * If true the function closes it
 * If false the function opens it
 * @param {HTMLElement} dialog
 */
const openCheck = (dialog) => {
  if (dialog.open) {
    dialog.close();
  } else {
    dialog.show();
  }
};

// document
//   .querySelector("body:not(dialog):not(#theme-button)")
//   .addEventListener("click", () => {
//     themeDialog.close();
//   });

const theme = document.querySelectorAll('[name="theme"');

/**
 * Store theme in the browser's localStorage
 * @param {NodeList} theme
 */
const storeTheme = (theme) => {
  localStorage.setItem("theme", theme);
};

/**
 * Set the theme
 */
const setTheme = () => {
  const activeTheme = localStorage.getItem("theme");
  theme.forEach((themeOption) => {
    if (themeOption.id === activeTheme) {
      themeOption.checked = true;
      document.querySelector("body").className = activeTheme;
    }
  });
};

/**
 * Fires the storeTheme function when the radio button is clicked
 */
theme.forEach((themeOption) => {
  themeOption.addEventListener("click", () => {
    storeTheme(themeOption.id);
    document.querySelector("body").className = themeOption.id;
  });
});

// Apply theme

document.onload = setTheme();
