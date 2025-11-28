(() => {
  "use strict";

  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  forms.forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

$(".auth").click(function () {
  const role = $(this).data("role");

  $("form").each(function () {
    this.reset();
    $(this).removeClass("was-validated").addClass("d-none");
  });

  $(`.${role}-form`).removeClass("d-none");

  $(".auth").removeClass("btn-primary").addClass("btn-outline-light");

  $(this).removeClass("btn-outline-light").addClass("btn-primary");
});

$(".togglePassword").click(function () {
  const input = $(this).prev("input");

  input.attr("type") === "password"
    ? input.attr("type", "text")
    : input.attr("type", "password");
});
