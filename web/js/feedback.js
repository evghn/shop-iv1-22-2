$(() => {
  $(".btn-feedback").on("click", function (e) {
    e.preventDefault();
    $("#modal-feedback").modal("show");
  });

  $("#feedback-pjax").on("pjax:end", () => {
    $("#modal-feedback").modal("hide");
    $.pjax.reload("#product-feedbacks-pjax");
    $(".btn-feedback").addClass("d-none");
  });
});
