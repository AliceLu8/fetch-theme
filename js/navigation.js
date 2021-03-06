/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const siteNavigation = document.getElementById("site-navigation");

  // Return early if the navigation doesn't exist.
  if (!siteNavigation) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName("ul")[0];

  if (!menu.classList.contains("nav-menu")) {
    menu.classList.add("nav-menu");
  }

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener("click", function (event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove("toggled");
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName("a");

  // Get all the link elements with children within the menu.
  const linksWithChildren = menu.querySelectorAll(
    ".menu-item-has-children > a, .page_item_has_children > a"
  );

  // Toggle focus each time a menu link is focused or blurred.
  for (const link of links) {
    link.addEventListener("focus", toggleFocus, true);
    link.addEventListener("blur", toggleFocus, true);
  }

  // Toggle focus each time a menu link with children receive a touch event.
  for (const link of linksWithChildren) {
    link.addEventListener("touchstart", toggleFocus, false);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    if (event.type === "focus" || event.type === "blur") {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains("nav-menu")) {
        // On li elements toggle the class .focus.
        if ("li" === self.tagName.toLowerCase()) {
          self.classList.toggle("focus");
        }
        self = self.parentNode;
      }
    }

    if (event.type === "touchstart") {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove("focus");
        }
      }
      menuItem.classList.toggle("focus");
    }
  }
})();

// Mobile Nav IIFE

(function () {
  const mobileNavigation = document.getElementById("mobile-navigation");

  const mobileSearchButton = mobileNavigation.querySelector(
    ".mobile-search button"
  );

  const hamburgerMenuButton =
    mobileNavigation.querySelector(".mobile-hamburger");

  const toggleClass = (className) => {
    // function prevents two classes from being active simultaneously

    // first remove any active classes on mobileNavigation
    switch (className) {
      case "search-open":
        // remove menu-open class
        mobileNavigation.classList.remove("menu-open");
        break;
      case "menu-open":
        // remove search-open class
        mobileNavigation.classList.remove("search-open");
        break;
      default:
        break;
    }
    // toggle the desired class
    mobileNavigation.classList.toggle(className);
  };

  mobileSearchButton.addEventListener("click", function () {
    toggleClass("search-open");
  });

  hamburgerMenuButton.addEventListener("click", function () {
    toggleClass("menu-open");
  });
})();
