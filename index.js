//import { getAllCategory } from './js/productResource.js'
import { getDiscount } from './js/productResource.js'
//import {sendNewsLetter} from './js/newsLetterResource.js'

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

document.getElementById("menShoes").addEventListener("click", getAllCategory);
document.getElementById("womenShoes").addEventListener("click", getAllCategory)
document.getElementById("sale").addEventListener("click", getDiscount)
document.getElementById("newsletter-form").addEventListener("submit", sendNewsLetter)


console.log()