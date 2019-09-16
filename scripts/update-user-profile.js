$("input.input").blur(function(e) {
  console.log("Touched");
  var sUserId = $(this)
    .parent()
    .parent()
    .attr("id");
  console.log(sUserId);
  var sUpdateKey = $(this).attr("data-update");
  var sNewValue = $(this).val();
  $.ajax({
    url: "api-update-user-profile.php",
    dataType: "json",
    type: "POST",
    data: {
      id: sUserId,
      key: sUpdateKey,
      value: sNewValue
    }
  })
    .done(data => {
      if (data) {
        console.log("Seller has been updated");
        console.log(sUpdateKey, sNewValue);
        $("#user-form-container").load(" #user-form-container");

        location.reload();
      }
    })
    .fail(() => {});
});
