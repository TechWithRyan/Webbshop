//get current user
// if (current user)
// submitform innerhtml = ""
// ny knapp? eventlistener? -> submit, makePurchase

import { registerNewUser } from './Resources/userResource.js'
import { getLogggedInUser } from './Resources/userResource.js'
import { login } from './Resources/userResource.js'
import { makeOrder } from './Resources/orderResource.js'

//document.getElementById("checkOutSubmit").addEventListener("submit", registerNewUser)

 function testFunction(){
    getLogggedInUser((user) => {           
        if(user.fName){
            document.getElementById("checkoutField").innerHTML = "";
        }     
    })
}
testFunction();

document.getElementById("checkoutSubmit").addEventListener("click", buttonFunction)

/* function buttonFunction(){
    getLogggedInUser((user) => {        
        if(user.fName){
            makeOrder();
            afterOrderAlert();
        }
        else {
            registerNewUser();
            login();
            makeOrder();
            afterOrderAlert();
        }
        
    })
} */

function buttonFunction(){
    
    makeOrder();
    alert("Tack för ditt köp! Välkommen åter!!!");
    window.location.href='index.php';
 
}