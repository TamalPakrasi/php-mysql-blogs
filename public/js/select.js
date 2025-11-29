$(".chain-select").change(function () {
  const value = $(this).val();

  const chainVal = $(".chain-field").val();

  $(this).children(`[value="${value}"]`).remove();

  $(this).val("");

  const html = `${chainVal ? chainVal + ", " : ""}${value}`;
  $(".chain-field").val(html);
});

$(".chain-field").on("keydown", function (e) {
  e.preventDefault();
});