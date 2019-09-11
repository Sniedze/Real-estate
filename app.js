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

//Upload Profile image

// $(document).ready(function(e) {
//   $("#profile-image-form").on("submit", function(e) {
//     e.preventDefault();
//     $("#message").empty();
//     $("#loading").show();
//     var sSellerId = $(this)
//       .parent()
//       .parent()
//       .attr("id");
//     $.ajax({
//       url: "api-update-seller-profile.php",
//       type: "POST",
//       data: { data: new FormData(this), id: sSellerId },
//       contentType: false,
//       cache: false,
//       processData: false,

//       success: function(data) {
//         $("#loading").hide();
//         $("#message").html(data);
//       }
//     }).done(() => {
//       console.log("Uploaded");
//     });
//   });
// });

//Upload new property

// $("#upload-button").click(function() {
//   var sNewPropertyName = $("#txtNewAgentName").val();
//   var sNewAgentEmail = $("#txtNewAgentEmail").val();

//   $.ajax({
//     url: "api-create-agent.php",
//     method: "POST",
//     data: $("form").serialize(),
//     dataType: "JSON"
//   })
//     .done(jData => {
//       var sDivNewAgent = `
//           <div id="${jData.id}" class="agent">
//             <img src="a.jpg">
//             <input data-update="name" type="text" value="${sNewAgentName}">
//             <input data-update="email" type="text" value="${sNewAgentEmail}">
//           </div>`;
//       $(".agents").prepend(sDivNewAgent);
//     })
//     .fail(() => {
//       $("#lblWelcome").text("System under maintenance");
//     });
// });
