//////////////////////Delete property///////////////////////////////////////////

document.getElementById("properties").addEventListener("click", function(e) {
    if (e.target && e.target.matches("button.delete-button")) {
      console.log("Button element clicked!");
      var delIndex = $(event.target)
        .parent()
        .attr("id");
      console.log(delIndex);
      $.ajax({
        url: "api-delete-property.php",
        method: "POST",
        data: {
          delIndex: delIndex
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
  