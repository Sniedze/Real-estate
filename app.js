//$(image[src])=$("#profile-image[src*='Undefined']")?"images/profile-placeholder.png":"sProfileImageName";

if ($("#profile-image[src*='Undefined']")) {
  $("#profile-image").attr("src", "images/profile-placeholder.png");
} else {
  $("#profile-image").attr("src", "sProfileImageName");
}

$(document).on("blur", ".profile-details input", function() {
  var sSellerId = $(this)
    .parent()
    .attr("id");
  var sUpdateKey = $(this).attr("data-update");
  var sNewValue = $(this).val();
  $.ajax({
    url: "api-update-seller-profile.php",
    dataType: "json",
    type: "POST",
    data: {
      id: sSellerId,
      key: sUpdateKey,
      value: sNewValue
    }
  })
    .done(() => {
      console.log("Seller has been updated");
      console.log(sUpdateKey, sNewValue);
    })
    .fail(() => {});
});
