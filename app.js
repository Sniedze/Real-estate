//$(image[src])=$("#profile-image[src*='Undefined']")?"images/profile-placeholder.png":"sProfileImageName";

if ($("#profile-image[src*='Undefined']")) {
  $("#profile-image").attr("src", "images/profile-placeholder.png");
} else {
  $("#profile-image").attr("src", "sProfileImageName");
}

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

    success: function() {
      location.reload();
    },
    error: function() {
      alert("Fail!");
    }
  }).done(() => {
    console.log("Seller has been deleted");
  });
});

//////////////////////Upload new property///////////////////////////////////////////

$("#form-property-upload").on("submit", function(ev) {
  $("#upload-button").text = "...Loading";
  ev.preventDefault();
  // var sCity = $("#city").val();
  // var sStreet = $("#street").val();
  // var sZip = $("#zip").val();
  // var sSize = $("#size").val();
  // var sBedrooms = $("#bedrooms").val();
  // var sBathrooms = $("#bathrooms").val();
  // var sPrice = $("#price").val();
  // var sDescription = $("#description").val();

  console.log("clicked");
  $.ajax({
    url: "api-upload-new-property.php",
    method: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,

    success: function(data) {
      $("#result").text(data);
      console.log("SUCCESS : ", data);
      // var sDivNewProperty = `
      //       <div id="${jData.id}" class="property">
      //       <h3 id="address">${jData.street}, ${jData.city}, ${
      //   jData.zip
      // }</h3>
      //       <img style="width: 200px; height: auto" src="images/${
      //         jData.imagePath
      //       }">
      //       <h4 id="details">${jData.bedrooms} bds | ${jData.bathrooms} ba | ${
      //   jData.size
      // } m2 </h4>
      //       <h3 id="price">DKK ${jData.price}</h3>
      //       <p id="description">${jData.description}</p>
      //    </div>`;
      // $("#properties").prepend(sDivNewProperty);
    },
    error: function(e) {
      $("#result").text(e.responseText);
      console.log("ERROR : ", e);
    }
  })
    .done(jData => {
      console.log(jData);
      // var sDivNewProperty = `
      //       <div id="${jData.id}" class="property">
      //       <h3 id="address">${jData.street}, ${jData.city}, ${
      //   jData.zip
      // }</h3>
      //       <img style="width: 200px; height: auto" src="images/${
      //         jData.imagePath
      //       }">
      //       <h4 id="details">${jData.bedrooms} bds | ${jData.bathrooms} ba | ${
      //   jData.size
      // } m2 </h4>
      //       <h3 id="price">DKK ${jData.price}</h3>
      //       <p id="description">${jData.description}</p>
      //    </div>`;
      $("#properties").prepend(jData.newDiv);
      $("#properties").load(" #properties");
    })
    .fail(() => {
      $("res").text("System under maintenance");
    });
});
