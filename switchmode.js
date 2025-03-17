const darkIcon = document.getElementById("theme-toggle-dark-icon");
const lightIcon = document.getElementById("theme-toggle-light-icon");

document.addEventListener("DOMContentLoaded", () => {

  if (
    localStorage.getItem("theme") === "dark" ||
    (!localStorage.getItem("theme") &&
      window.matchMedia("(prefers-color-scheme: dark)").matches)
  ) {
    document.documentElement.classList.add("dark");
    darkIcon.classList.remove("hidden");
    lightIcon.classList.add("hidden");
  } else {
    document.documentElement.classList.remove("dark");
    darkIcon.classList.add("hidden");
    lightIcon.classList.remove("hidden");
  }
});

function switchmode() {
  if (document.documentElement.classList.contains("dark")) {
    document.documentElement.classList.remove("dark");
    localStorage.setItem("theme", "light");
    darkIcon.classList.add("hidden");
    lightIcon.classList.remove("hidden");
  } else {
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
    darkIcon.classList.remove("hidden");
    lightIcon.classList.add("hidden");
  }
}
