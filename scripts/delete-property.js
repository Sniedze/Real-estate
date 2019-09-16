//////////////////////Delete property///////////////////////////////////////////

document.getElementById("properties").addEventListener("click", function(e) {
  if (e.target && e.target.matches("button.delete-button")) {
    console.log("Button element clicked!");
    var delIndex = $(event.target)
      .parent()
      .attr("id");

    $.ajax({
      url: "api-delete-property.php",
      method: "POST",
      data: {
        delIndex: delIndex
      },
      dataType: "text",
      success: function(data) {
        if (data == "success") {
          $("#properties").load(" #properties");
        }
      }
    }).done(jData => {
      $("#properties").load(" #properties");
    });
  }
});
