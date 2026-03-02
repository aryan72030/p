
  feather.replace();
  var pctoggle = document.querySelector("#pct-toggler");
  if (pctoggle) {
    pctoggle.addEventListener("click", function () {
      if (
        !document.querySelector(".pct-customizer").classList.contains("active")
      ) {
        document.querySelector(".pct-customizer").classList.add("active");
      } else {
        document.querySelector(".pct-customizer").classList.remove("active");
      }
    });
  }

  var themescolors = document.querySelectorAll(".themes-color > a");
  for (var h = 0; h < themescolors.length; h++) {
    var c = themescolors[h];

    c.addEventListener("click", function (event) {
      var targetElement = event.target;
      if (targetElement.tagName == "SPAN") {
        targetElement = targetElement.parentNode;
      }
      var temp = targetElement.getAttribute("data-value");
      removeClassByPrefix(document.querySelector("body"), "theme-");
      document.querySelector("body").classList.add(temp);
    });
  }

  var custthemebg = document.querySelector("#cust-theme-bg");
  custthemebg.addEventListener("click", function () {
    if (custthemebg.checked) {
      document.querySelector(".dash-sidebar").classList.add("transprent-bg");
      document
        .querySelector(".dash-header:not(.dash-mob-header)")
        .classList.add("transprent-bg");
    } else {
      document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
      document
        .querySelector(".dash-header:not(.dash-mob-header)")
        .classList.remove("transprent-bg");
    }
  });

  var custthemebg = document.querySelector("#cust-rtllayout");
  custthemebg.addEventListener("click", function () {
    if (custthemebg.checked) {
      document.getElementsByTagName("html")[0].setAttribute("dir" , "rtl");
      document.getElementsByTagName("html")[0].setAttribute("lang" , "ar");
      document.querySelector("#main-style-link").setAttribute("href", "../assets/css/style-rtl.css");
    } else {
      document.getElementsByTagName("html")[0].removeAttribute("dir");
      document.getElementsByTagName("html")[0].removeAttribute("lang");
      document.querySelector("#main-style-link").setAttribute("href", "../assets/css/style.css");
    }
  });

  var custdarklayout = document.querySelector("#cust-darklayout");
  custdarklayout.addEventListener("click", function () {
    if (custdarklayout.checked) {
      document.querySelector(".m-header > .b-brand > .logo-lg").setAttribute("src", "../assets/images/logo.svg");
      document.querySelector("#main-style-link").setAttribute("href", "../assets/css/style-dark.css");
    } else {
      document.querySelector(".m-header > .b-brand > .logo-lg").setAttribute("src", "../assets/images/logo-dark.svg");
      document.querySelector("#main-style-link").setAttribute("href", "../assets/css/style.css");
    }
  });
  function removeClassByPrefix(node, prefix) {
    for (let i = 0; i < node.classList.length; i++) {
      let value = node.classList[i];
      if (value.startsWith(prefix)) {
        node.classList.remove(value);
      }
    }
  }
