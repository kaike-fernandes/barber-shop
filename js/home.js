$(`.icon-hamburguer`).on("click", function () {
  $(`.list`).toggleClass("bi-arrow-right bi bi-arrow-left");
  $(`.sidebar`).toggleClass("expanded");
});
