//////////////////////Delete property///////////////////////////////////////////

document.getElementById("properties").addEventListener("click", function(e) {
  if (e.target && e.target.matches("button.delete-button")) {
    console.log("Button element clicked!");
  }
});
