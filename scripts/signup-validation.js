function fvSignup() {
  console.log("clicked");
  var frmSignup = document.querySelector("#frmSignup");
  console.log(frmSignup);
  var bIsValid = fnbIsFormValid(frmSignup);
  if (bIsValid == false) {
    return;
  }
}
