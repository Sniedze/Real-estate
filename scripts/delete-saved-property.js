//////////////////////Delete property///////////////////////////////////////////

document
  .getElementById("saved-properties")
  .addEventListener("click", function(e) {
    if (e.target && e.target.matches("button.btn-delete-property")) {
      console.log("Button clicked!");
      var delIndex = $(event.target)
        .parent()
        .attr("id");
      console.log(delIndex);
      $.ajax({
        url: "api-delete-saved-property.php",
        method: "POST",
        data: {
          delIndex: delIndex
        },
        dataType: "text",
        success: function(data) {
          console.log(data);
          if (data) {
            $("#saved-properties").load(" #saved-properties");
            location.reload();
          }
        }
      });
    }
  });
