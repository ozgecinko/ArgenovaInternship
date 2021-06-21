function validate(){
    var name = document.getElementById("name").value;
    var surname = document.getElementById("surname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var password = document.getElementById("password").value;
    var genders = document.getElementsByName('gender');
    var error_message = document.getElementById("error_message");
    
    error_message.style.padding = "10px";
    
    var text;
    if(name==""){
      text = "Please Enter Valid Name";
      error_message.innerHTML = text;
      return false;
    }
    if(surname==""){
        text = "Please Enter Valid Surname";
        error_message.innerHTML = text;
        return false;
    }
    if(email.indexOf("@") == -1 || email.length < 6){
        text = "Please Enter Valid Email";
        error_message.innerHTML = text;
        return false;
    }
    if(password== " "){
        text = "Please Enter Valid Password";
        error_message.innerHTML = text;
        return false;
    }
    if(isNaN(phone) || phone.length != 10){
      text = "Please Enter Valid Phone Number";
      error_message.innerHTML = text;
      return false;
    }

    if(!genders[0].checked || !genders[1].checked)
    {
        text = "Please Enter Valid Gender";
        error_message.innerHTML = text;
        return false;
    }

    if(message.length <= 140){
      text = "Please Enter More Than 140 Characters";
      error_message.innerHTML = text;
      return false;
    }
    alert("Form Submitted Successfully!");
    return true;
  }