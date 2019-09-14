function fvSignup() {
  console.log("clicked");
  var frmSignup = document.querySelector("#frmSignup");
  console.log(frmSignup);
  var bIsValid = fnbIsFormValid(frmSignup);
  if (bIsValid == false) {
    return;
  }
}

function fvUserSignup() {
  console.log("clicked");
  var frmUserSignup = document.querySelector("#frmUserSignup");
  console.log(frmUserSignup);
  var bIsValid = fnbIsFormValid(frmUserSignup);
  if (bIsValid == false) {
    return;
  }
}
