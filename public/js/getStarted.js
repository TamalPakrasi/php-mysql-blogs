const loader = `<div class="spinner-border text-light" role="status">
  <span class="visually-hidden">Submitting...</span>
</div>`;

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

// registration
$(".register-form").submit(function (e) {
  e.preventDefault();

  const formdata = new FormData(e.target);

  const { base } = document.documentElement.dataset;

  $(".submit-register").html(loader).attr("disabled", true);

  $.ajax({
    type: "POST",
    url: `${base}/api/auth/register`,
    data: formdata,
    contentType: false,
    processData: false,
    success: function () {
      location.href = `${base}/profile/me`;
    },
    error: function (xhr) {
      const err = `<section id="alert-sec" class="position-fixed w-100" style="top: 20px;">
        <div class="alert alert-danger mx-auto alert-dismissible fade show" style="width: fit-content;" role="alert">
            ${xhr.responseJSON.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </section>`;

      $("#alert-sec")?.remove();
      $("#root").append(err);

      window.alertSection();

      $(".submit-register").html("Register").removeAttr("disabled");
    },
  });
});

// login
$(".login-form").submit(function (e) {
  e.preventDefault();

  const formdata = new FormData(e.target);

  const { base } = document.documentElement.dataset;

  $(".submit-login").html(loader).attr("disabled", true);

  $.ajax({
    type: "POST",
    url: `${base}/api/auth/login`,
    data: formdata,
    contentType: false,
    processData: false,
    success: function () {
      location.href = `${base}/profile/me`;
    },
    error: function (xhr) {
      const err = `<section id="alert-sec" class="position-fixed w-100" style="top: 20px;">
        <div class="alert alert-danger mx-auto alert-dismissible fade show" style="width: fit-content;" role="alert">
            ${xhr.responseJSON.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </section>`;

      $("#alert-sec")?.remove();
      $("#root").append(err);

      window.alertSection();

      $(".submit-login").html("Login").removeAttr("disabled");
    },
  });
});
