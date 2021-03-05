import { getUserOrders } from './Resources/orderResource.js'
import {getLogggedInUser} from './Resources/userResource.js'
import {getAllOrders} from './Resources/orderResource.js'
import {getAllSubscribers} from './Resources/orderResource.js'
import {getAllChangeProducts} from './Resources/orderResource.js'

checkAdminStatus();

function checkAdminStatus(){
    getLogggedInUser((customer) => {
        if (customer.isAdmin == 1) {
            // admin
            getAllOrders();
            getAllSubscribers();
            getAllChangeProducts();
        } else if (customer.isAdmin == 0) {
            // inte admin
            getUserOrders();
        }
    })

}
console.log(checkAdminStatus)

function numberOfProductsInCart() {
    var getCart = JSON.parse(localStorage.getItem("localCart"))
    var quantity = document.getElementById("numberOfItemsInCart")
    quantity.innerHTML = getCart.length  
}
numberOfProductsInCart()