var $form = $("form"),
  $successMsg = $(".alert");

$.validity.setup({
  outputMode: "label"
});

$form.validity(function() {
  $form.find("input[name='cname']")
    .require()
    .match(
      /^[a-zA-Z\s]{3,}$/gmi,
      "A valid name (only letters and spaces are allowed)"
    );
});

$form.on("submit", function(e) {
  if (!$(".error").length) {
    e.preventDefault();
    $successMsg.show();
  }
});