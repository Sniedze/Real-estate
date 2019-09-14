//////////////////////Delete property///////////////////////////////////////////

document
  .getElementById("all-properties")
  .addEventListener("click", function(e) {
    if (e.target && e.target.matches("img.like-icon")) {
      console.log("Like icon element clicked!");
      var likeIndex = $(event.target)
        .parent()
        .attr("id");
      //console.log(likeIndex);
      $.ajax({
        url: "api-like-property.php",
        method: "POST",
        data: {
          likeIndex: likeIndex
        },
        dataType: "text",
        success: function(data) {
          if (data) {
            console.log(data);
            // $("#user-saved-properties").prepend(jData.newDiv);
            // $("#user-saved-properties").load(" #user-saved-properties");
          }
        }
      });
    }
  });
