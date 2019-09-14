//////////////////////Delete property///////////////////////////////////////////

document
  .getElementById("all-properties")
  .addEventListener("click", function(e) {
    if (e.target && e.target.matches("img.like-icon")) {
      console.log("Like icon element clicked!");
      var likeIndex = $(event.target)
        .parent()
        .attr("id");
      console.log(likeIndex);
      $.ajax({
        url: "api-delete-property.php",
        method: "POST",
        data: {
          likeIndex: likeIndex
        },
        dataType: "text",
        success: function(data) {
          console.log(data);
          if (data == "success") {
            $("#properties").load(" #properties");
          }
        }
      });
    }
  });
