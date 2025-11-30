$("#logout").submit(function (e) {
  e.preventDefault();

  const { base } = document.documentElement.dataset;

  const loader = `<div class="spinner-border text-light" role="status">
  <span class="visually-hidden">Submitting...</span>
</div>`;

  $("#logout-btn").html(loader).attr("disabled", true);

  $.ajax({
    type: "POST",
    url: `${base}/api/auth/logout`,
    success: function (res) {
      location.href = `${base}/`;
    },
    error: function (xhr) {
      const err = `<section id="alert-sec" class="position-fixed w-100" style="top: 20px;">
        <div class="alert alert-danger mx-auto" style="width: fit-content;" role="alert">
            ${xhr.responseJSON.message}
        </div>
    </section>`;

      $("#root").append(err);

      $("#logout-btn").html("Log out").removeAttr("disabled");
    },
  });
});
