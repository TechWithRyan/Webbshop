//get current user
// if (current user)
// submitform innerhtml = ""
// ny knapp? eventlistener? -> submit, makePurchase

import { registerNewUser } from './Resources/userResource.js'
import { getLogggedInUser } from './Resources/userResource.js'
import { login } from './Resources/userResource.js'
import { makeOrder } from './Resources/orderResource.js'

//document.getElementById("checkOutSubmit").addEventListener("submit", registerNewUser)

function cheakFunc(){
    getLogggedInUser((customer) => {           
        if(customer.fName){
            document.getElementById("checkoutField").innerHTML = "";
        }     
    })
}
cheakFunc();

document.getElementById("checkoutSubmit").addEventListener("click", buttonPayment);

/* function buttonPayment(){
    makeOrder();
    afterOrderAlert();
}; */

function buttonPayment(){
    getLogggedInUser((customer) => {        
        if(customer.fName){
            makeOrder();
            //afterOrderAlert();
        }
        else {
            //registerNewUser();
            login();
            makeOrder();
            //afterOrderAlert();
        }
        
    })
}

function afterOrderAlert(){
    alert("Tack för ditt köp! Välkommen åter!");
    window.location.href='index.php';
 }