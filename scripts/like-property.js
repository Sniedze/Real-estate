//////////////////////Delete property///////////////////////////////////////////

document
  .getElementById("all-properties")
  .addEventListener("click", function(e) {
    if (e.target && e.target.matches("img.like-icon")) {
      console.log("Like icon element clicked!");
      var likeIndex = $(e.target)
        .parent()
        .attr("id");
      console.log(likeIndex);
      $.ajax({
        url: "api-like-property.php",
        method: "POST",
        data: {
          likeIndex: likeIndex
        },
        dataType: "text",
        success: function(jData) {
          if (jData) {
            $.ajax({
              url: "api-send-email.php",
              method: "POST",
              data: {
                likeIndex: likeIndex
              },
              dataType: "text"
            });
          }
        }
      });
    }
  });
