import { login } from './Resources/userResource.js'
document.getElementById("login_btn").addEventListener("click", login);

import { logout } from './Resources/userResource.js'
document.getElementById("logout_btn").addEventListener("click", logout);

// Visar antal produkter i kundvagnen
function numberOfProductsInCart() {
    var getCart = JSON.parse(localStorage.getItem("localCart"))
    var quantity = document.getElementById("numberOfItemsInCart")
    quantity.innerHTML = getCart.length  
}
numberOfProductsInCart()