$("#btnData").click(function(event) {

  //Fetch form to apply custom Bootstrap validation
  var form = $("#formData")

  if (form[0].checkValidity() === false) {
    event.preventDefault()
    event.stopPropagation()
  }
  
  form.addClass('was-validated');
});

  
function SubmitsEncry(userPwd) {
  if (userPwd != "") {
    var hash = CryptoJS.SHA3(userPwd);
    hash=hash.toString(CryptoJS.enc.Hex);
  }
  return hash;
} 
