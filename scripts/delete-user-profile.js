//////////////////////Delete User Profile///////////////////////////////////////////

$(document).on("click", ".delete", function() {
  var deleteIndex = $(this)
    .parent()
    .attr("id");
  console.log("clicked");
  $.ajax({
    url: "api-delete-user-profile.php",
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
