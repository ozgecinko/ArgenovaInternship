$(document).ready(function() {
  $("#contact-form").submit(function(event) {
      event.preventDefault();
      var name = $("#name").val();
      var surname = $("#surname").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var phone = $("#phone").val();
      var message = $("#message").val();

      badWordFilter(name);
      badWordFilter(surname);
      badWordFilter(email);
      badWordFilter(message);

      if(name.length == "")
      {
        $("#pname").text("Please enter your name.");
        $("#name").focus();
        return false;
      }
      else if(surname.length == "")
      {
        $("#psurname").text("Please enter your surname.");
        $("#surname").focus();
        return false;
      }
      else if(email.length == "")
      {
        $("#pemail").text("Please enter your email.");
        $("#email").focus();
        return false;
      }
      else if(password.length == "")
      {
        $("#ppasword").text("Please enter valid password.");
        $("#password").focus();
        return false;
      }
      else if(isNaN(phone) || phone.length != 10)
      {
        $("#pphone").text("Please enter valid phone number.");
        $("#phone").focus();
        return false;
      }
      else if($("input[name='gender']:checked").length == 0)
      {
        $("#pgender").text("Please enter your gender.");
        $("#gender").focus();
        return false;
      }
      else if(message.length == "")
      {
        $("#pmessage").text("Please enter your message.");
        $("#message").focus();
        return false;
      }

      if(name.length !="" && surname.length !="" && phone.length !="" && email.length !="" && message.length !="" && password.length !="" && ("input[name='gender']:checked").length != 0)
      {
        swal({
          icon: 'success',
          title: 'Successfully Submitted!',
        })
      }

  })
});


function badWordFilter(str){
  var filterWords = ["fool", "dumb", "idiot"];
  var rgx = new RegExp(filterWords.join(""), "gi"); 

  for (let i = 0; i < filterWords.length; i++) {
    if(str.includes(filterWords[i])){
      swal({
        icon: 'warning',
        title: 'No Bad Words!',
      })
      return str.replace(rgx, "***"); 
    }
  }
}