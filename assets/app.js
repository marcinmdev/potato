import "./style.scss";

document.addEventListener("DOMContentLoaded", () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(
      document.querySelectorAll(".navbar-burger"), 0);

  // Add a click event on each of them
  $navbarBurgers.forEach(el => {
    el.addEventListener("click", () => {

      // Get the target from the "data-target" attribute
      const target  = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle("is-active");
      $target.classList.toggle("is-active");

    });
  });

  const addFormToCollection = (e) => {
    const collectionHolder = document.querySelector(
        "." + e.currentTarget.dataset.collectionHolderClass);

    const item = document.createElement("li");

    item.innerHTML = collectionHolder.dataset.prototype.replace(
        /__name__/g,
        collectionHolder.dataset.index
    );
    collectionHolder.appendChild(item);
    collectionHolder.dataset.index++;

    addTagFormDeleteLink(item);
  };

  document.querySelectorAll(".add_item_link").forEach(btn => {
    btn.addEventListener("click", addFormToCollection);
  });

  document.querySelectorAll("ul.tags li").forEach((tag) => {
    addTagFormDeleteLink(tag);
  });

  const addTagFormDeleteLink = (item) => {
    const removeFormButton     = document.createElement("button");
    removeFormButton.innerText = "Delete this tag";

    item.append(removeFormButton);

    removeFormButton.addEventListener("click", (e) => {
      e.preventDefault();
      // remove the li for the tag form
      item.remove();
    });
  };
});
