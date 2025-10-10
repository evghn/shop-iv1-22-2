$(() => {
  $("#catalog-pjax").on("click", ".btn-cart-add", function (e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr("href"),
      method: "POST",
      success(data) {
        if (data) {
          $.ajax({
            url: "/account/cart/get-count",
            method: "POST",
            success(value) {
              $("#cart-items-count").html(value);
            },
          });
        }
      },
    });
  });
});
