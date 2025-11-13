$(() => {
  $(".btn-feedback").on("click", function (e) {
    e.preventDefault();
    $("#feedback-comment").val("");
    $("#feedback-comment").removeClass("is-valid");
    $("#feedback-comment").removeClass("is-invalid");

    $("#modal-feedback").modal("show");
  });

  $(".btn-feedback-edit").on("click", function (e) {
    e.preventDefault();
    $("#feedback-pjax").data("close", 0);
    $.pjax.reload("#feedback-pjax", {
      url: $(this).attr("href"),
      push: false,
      replace: false,
      timeout: 5000,
    });
    $("#modal-feedback").modal("show");
  });

  $("#feedback-pjax").on("pjax:end", function () {
    if ($(this).data("close")) {
      $("#modal-feedback").modal("hide");
      $.pjax.reload("#product-feedbacks-pjax");
      $(".btn-feedback").addClass("d-none");
    } else {
      $(this).data("close", 1);
    }
  });

  $("#modal-feedback").on("click", ".btn-cancel", function (e) {
    e.preventDefault();
    $("#modal-feedback").modal("hide");
  });
});
