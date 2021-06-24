var name = document.getElementById("name").value;
var surname = document.getElementById("surname").value;
var phone = document.getElementById("phone").value;
var email = document.getElementById("email").value;
var message = document.getElementById("message").value;
var password = document.getElementById("password").value;
var genders = document.getElementsByName('gender');
var error_message = document.getElementById("error_message");

function validate(){ 
    error_message.style.padding = "10px";
    badWordFilter(message);
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
    if(password== ""){
        text = "Please Enter Valid Password";
        error_message.innerHTML = text;
        return false;
    }
    if(isNaN(phone) || phone.length != 10){
      text = "Please Enter Valid Phone Number";
      error_message.innerHTML = text;
      return false;
    }

    if(!genders[0].checked && !genders[1].checked)
    {
        text = "Please Enter Valid Gender";
        error_message.innerHTML = text;
        return false;
    }

    if(message==""){
      text = "Please Enter More Than 0 Characters";
      error_message.innerHTML = text;
      return false;
    }

    sweetAlertClick();
    return true;
}

function sweetAlertClick(){
  if(name!='' && surname!='' && phone!='' && email!='' && message!='' && password!='' && genders.length != 0)
  {
    Swal.fire({
      icon: 'success',
      title: 'Successfully Submitted!',
    })
  }
  else{
    Swal.fire({
      icon: 'error',
      title: 'Fields Empty!',
    })
  }
  
}

function badWordFilter(str){
  var filterWords = ["fool", "dumb", "idiot"];
  var rgx = new RegExp(filterWords.join(""), "gi"); 

  for (let i = 0; i < filterWords.length; i++) {
    if(str.includes(filterWords[i])){
      Swal.fire({
        icon: 'warning',
        title: 'No Bad Words!',
      })
      return str.replace(rgx, "***"); 
    }
  }
  return str;      
}