//////////////////////Update Seller Profile///////////////////////////////////////////

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

//////////////////////Delete Seller Profile///////////////////////////////////////////

$(document).on("click", ".delete", function() {
  var deleteIndex = $(this)
    .parent()
    .attr("id");
  console.log("clicked");
  $.ajax({
    url: "api-delete-profile.php",
    data: {
      id: deleteIndex
    },
    dataType: "text",
    type: "POST",
    success: function(data) {
      console.log(data);
      if (data) {
        $("#form-container").load(" #form-container");
        
        location.reload();
      }
    },

    error: function() {
      alert("Fail!");
    }
  }).done(() => {
    $("#profile-deletion").text("PROFILE SUCCESSFULLY DELETED!");
  });
});

//////////////////////Upload new property///////////////////////////////////////////

$("#form-property-upload").on("submit", function(ev) {
  $("#upload-button").text = "...Loading";
  ev.preventDefault();
  console.log("clicked");
  $.ajax({
    url: "api-upload-new-property.php",
    method: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,

    success: function(data) {
      console.log("SUCCESS : ", data);
    },
    error: function(e) {
      $("#result").text(e.responseText);
      console.log("ERROR : ", e);
    }
  })
    .done(jData => {
      console.log(jData);

      $("#properties").prepend(jData.newDiv);
      $("#properties").load(" #properties");
    })
    .fail(() => {
      $("res").text("System under maintenance");
    });
});

