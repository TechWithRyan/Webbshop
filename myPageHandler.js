import { getUserOrders } from './Resources/orderResource.js'
import {getLogggedInUser} from './Resources/userResource.js'
import {getAllOrders} from './Resources/orderResource.js'
import {getAllSubscribers} from './Resources/orderResource.js'
import {getAllChangeProducts} from './Resources/orderResource.js'

checkAdminStatus();

function checkAdminStatus(){
    getLogggedInUser((customer) => {
        console.log(customer[0].isAdmin);
        
        if (customer[0].isAdmin == 1) {
            // admin
            getAllOrders();
            getAllSubscribers();
            getAllChangeProducts();
        } else if (customer[0].isAdmin == 0) {
            // inte admin
            getUserOrders();
            //console.log(result);
        }
    })
    
}
/* 
function numberOfProductsInCart() {
    var getCart = JSON.parse(localStorage.getItem("localCart"))
    var quantity = document.getElementById("numberOfItemsInCart")
    quantity.innerHTML = getCart.length  
}
numberOfProductsInCart() */