const form = document.querySelector('#email-validation');
const button = form.elements.namedItem('submit');
const alertbox = document.getElementById("alertbox");
const mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const colombia=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[co]{2,}))$/;

var checkbox = form.elements.namedItem("checkbox");
var email = form.elements.namedItem("email");

email.addEventListener('input',validate);
checkbox.addEventListener('change', validate);

function validate(e){
    if((email.value.length == 0)&&(checkbox.checked))
    { 
    button.disabled = true;
    alertbox.innerHTML = "Email address is required";
    return true;
    }
    else if ((email.value.length == 0)&&(!checkbox.checked))
    {
    alertbox.innerHTML = "";
    button.disabled = true;
    return true;
    }
    else if (!email.value.length == 0)
    {
        if(email.value.match(mailformat)&&(checkbox.checked))
        { 
            if (email.value.match(colombia))
            {
            alertbox.innerHTML = "We are not accepting subscriptions from Colombia emails";
            button.disabled = true;
            return true;
            }   
            else 
            {
            button.disabled = false;
            alertbox.innerHTML = "";
            return true;  
            }  
        }
        else if (email.value.match(mailformat)&&(!checkbox.checked))
        {
        alertbox.innerHTML = "You must accept the terms and conditions";
        button.disabled = true;
        return true;
        }
        else if (!email.value.match(mailformat))
        {
        alertbox.innerHTML = "Please provide a valid e-mail address";
        button.disabled = true;
        return true;
        }
    }
}