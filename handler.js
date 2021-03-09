//import { getAllCategory } from './Resources/productResource.js'
import { getDiscount } from './Resources/productResource.js'
import {sendNewsLetter} from './Resources/newsLetterResource.js'

var iKundvagn = [];

function cartCheck(){
const inCart = localStorage.localCart;
if (inCart) {
    iKundvagn = JSON.parse(inCart);
}
}
cartCheck();

function makeRequest(url, method, FormData, callback) {
    fetch(url, {
        method: method,
        body: FormData
    }).then((data) => {
        return data.json()
    }).then((result) => {
        callback(result);
    }).catch((err) => {
        console.log("Error: ", err)
    })
}

//document.getElementById("men").addEventListener("click", getAllCategory);
//document.getElementById("women").addEventListener("click", getAllCategory)
//document.getElementById("baby").addEventListener("click", getAllCategory)
//document.getElementById("sale").addEventListener("click", getDiscount)
document.getElementById("newsletter-form").addEventListener("submit", sendNewsLetter)


