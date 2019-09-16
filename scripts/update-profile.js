//////////////////////Update Seller Profile///////////////////////////////////////////
$(".input").blur(function(e) {
  console.log("Touched");
  var sSellerId = $(this)
    .parent()
    .attr("id");
  var sUpdateKey = $(this).attr("data-update");
  var sNewValue = $(this).val();
  setInterval(function() {
    $.ajax({
      url: "api-update-seller-profile.php",
      dataType: "text",
      type: "POST",
      data: {
        id: sSellerId,
        key: sUpdateKey,
        value: sNewValue
      }
    })
      .done(data => {
        if (data) {
          console.log("Seller has been updated");
          console.log(sUpdateKey, sNewValue);
          //$("#form-container").load(" #form-container");

          location.reload();
        }
      })
      .fail(() => {});
  }, 100);
});
