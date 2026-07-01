let value = false;

document.querySelector(".burger").addEventListener("click", () => {
  const menu = document.querySelector(".burger-menu");

  if (!value) {
    menu.classList.remove("hide");
    menu.classList.add("show");
    menu.style.display = "flex";
    document.querySelector(".burger").innerHTML =
      "<i class='fa-solid fa-xmark'></i>";
    value = true;
  } else {
    menu.classList.remove("show");
    menu.classList.add("hide");
    document.querySelector(".burger").innerHTML =
      "<i class='fa-solid fa-bars'></i>";
    setTimeout(() => {
      menu.style.display = "none";
    }, 400);
    value = false;
  }
});

document.querySelector(".user").addEventListener("click", () => {
  const user_menu = document.querySelector(".user-menu");
  const icon = document.querySelector(".icon");

  if (!value) {
    user_menu.classList.remove("hide");
    user_menu.classList.add("show");
    user_menu.style.display = "flex";
    icon.innerHTML = "<i class='fa-solid fa-angle-up'></i>";
    value = true;
  } else {
    user_menu.classList.remove("show");
    user_menu.classList.add("hide");
    icon.innerHTML = "<i class='fa-solid fa-angle-down'></i>";
    setTimeout(() => {
      user_menu.style.display = "none";
    }, 400);
    value = false;
  }
});

document.querySelector(".logo").addEventListener("click", () => {
  const special_menu = document.querySelector(".special_menu");
  if (!value) {
    special_menu.classList.remove("hide");
    special_menu.classList.add("show");
    special_menu.style.display = "flex";
    value = true;
  } else {
    special_menu.classList.remove("show");
    special_menu.classList.add("hide");
    setTimeout(() => {
      special_menu.style.display = "none";
    }, 400);
    value = false;
  }
});

document.querySelector("main").addEventListener("click", () => {
  closeAllMenus();
});

document
  .querySelectorAll(".burger-menu span, .user-menu span, .special_menu span")
  .forEach((span) => {
    span.addEventListener("click", () => {
      closeAllMenus();
    });
  });

function closeAllMenus() {
  const menus = [
    {
      el: ".burger-menu",
      icon: ".burger",
      iconHtml: "<i class='fa-solid fa-bars'></i>",
    },
    {
      el: ".user-menu",
      icon: ".icon",
      iconHtml: "<i class='fa-solid fa-angle-down'></i>",
    },
    { el: ".special_menu" },
  ];

  menus.forEach((menu) => {
    const element = document.querySelector(menu.el);
    if (element && element.classList.contains("show")) {
      element.classList.remove("show");
      element.classList.add("hide");
      setTimeout(() => {
        element.style.display = "none";
      }, 400);
      if (menu.icon) {
        document.querySelector(menu.icon).innerHTML = menu.iconHtml;
      }
    }
  });

  value = false;
}
