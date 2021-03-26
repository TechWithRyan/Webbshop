import { getLogggedInUser } from './userResource.js'  // vi kör G krav
import{ renderShippers } from './shipperResource.js'

function getCart() {
    return JSON.parse(localStorage.getItem("localCart")) || [];
  }
  function getShipperID() {
    return JSON.parse(localStorage.getItem("shipperID")) || [];
  }
  function getCurrentUser() {
    let customer = JSON.parse(localStorage.getItem("currentUser")) || [];
    console.log(customer)
    return customer
  }
  

function makeRequest(url, method, data, callback) {
    fetch(url, {
        method: method,
        body: data
    }).then((data) => {
        return data.json()
    }).then((result) => {
        callback(result);
    }).catch((err) => {
        console.log("Error: ", err)
    })
}
  


function getCustomerID(){
    let customer = getCurrentUser()
    getLogggedInUser((customer) => {    
        
        
        console.log(customer[0].customerID)    
        console.log(customer)
        //customerID === customer[0].customerID
    })
}

export function getUserOrders() {
    getCustomerID()
    makeRequest('./../API/recievers/orderReciever.php?endpoint=getAllFromUser', 'GET', null, (result) => {
        console.log(result);
        

        if (result.status == 404){
        } else {
            renderOrders(result);     
        }
    })
}


function renderOrders(result) {
    let MainOrderDiv = document.getElementsByClassName("MainOrderDiv")[0];
    let order = result;

    let orderDiv = document.createElement("div");
    orderDiv.classList = "orderDiv";
    orderDiv.innerHTML = '';
    MainOrderDiv.appendChild(orderDiv);
    
    for (let i = 0; i < order.length; i++) {
        let selectedOrder = order[i];
        let contentDiv = document.createElement('div');
        contentDiv.classList = 'contentDiv';
        
        let orderID = document.createElement('p');
        orderID.classList = 'text';
        orderID.innerText = 'orderID' + ' ' + selectedOrder.orderID + ',';
        
        let date = document.createElement('p')
        date.classList = 'text';
        date.innerText = 'datum' + ' ' + selectedOrder.date + ',';
        
        let sum = document.createElement('p');
        sum.classList = 'text';
        sum.innerText = 'Totalbelopp' + ' ' + selectedOrder.sum + 'kr' + ',';
        
        let quantity = document.createElement('p');
        quantity.classList = 'text';
        quantity.innerText = 'Kvantitet' + ' ' + selectedOrder.quantity + ',';
        
        let name = document.createElement('p');
        name.classList = 'text';
        name.innerText = 'Produkt:' + ' ' + selectedOrder.name + ',';
        
        let price = document.createElement('p');
        price.classList = 'text';
        price.innerText = 'Pris' + ' ' + selectedOrder.price + 'kr';
        
        orderDiv.appendChild(contentDiv);
        
        contentDiv.appendChild(orderID);
        contentDiv.appendChild(date);
        contentDiv.appendChild(sum);
        contentDiv.appendChild(quantity);
        contentDiv.appendChild(name);
        contentDiv.appendChild(price);
    }    
}    

function renderNewsletterSubscribers(sub) {
    let MainOrderDiv = document.getElementsByClassName("MainOrderDiv")[0];
    let order = sub;
    
    let orderDiv = document.createElement("div");
    orderDiv.classList = "orderDiv";
    orderDiv.innerHTML = '';
    MainOrderDiv.appendChild(orderDiv);
    
    for (let i = 0; i < order.length; i++) {
        let selectedOrder = order[i];
        let contentDiv = document.createElement('div');
        contentDiv.classList = 'contentDiv';
        
        let subscriptionID = document.createElement('p');
        subscriptionID.classList = 'text';
        subscriptionID.innerText = 'subscriptionID' + ' ' + selectedOrder.subscriptionID + ',';
        
        let fName = document.createElement('p')
        fName.classList = 'text';
        fName.innerText = 'Namn' +':'+ ' ' + selectedOrder.fName + ',';
        
        let lName = document.createElement('p');
        lName.classList = 'text';
        lName.innerText = 'Efternamn' +':'+ ' ' + selectedOrder.lName + ',';
        
        let email = document.createElement('p');
        email.classList = 'text';
        email.innerText = 'email' +':'+ ' ' + selectedOrder.email;
        
        orderDiv.appendChild(contentDiv);
        
        contentDiv.appendChild(subscriptionID);
        contentDiv.appendChild(fName);
        contentDiv.appendChild(lName);
        contentDiv.appendChild(email);
    }    
}  

function renderProducts(product) {
    let MainOrderDiv = document.getElementsByClassName("MainOrderDiv")[0];
    let order = product;
    
    let orderDiv = document.createElement("div");
    orderDiv.classList = "orderDiv";
    orderDiv.innerHTML = '';
    MainOrderDiv.appendChild(orderDiv);
    
    for (let i = 0; i < order.length; i++) {
        let selectedOrder = order[i];
        let contentDiv = document.createElement('div');
        contentDiv.classList = 'contentDiv';
        
        let productID = document.createElement('p');
        productID.classList = 'text';
        productID.innerText = 'productID' + ' ' + selectedOrder.productID + ',';
        
        let name = document.createElement('p')
        name.classList = 'text';
        name.innerText = 'Namn' +':'+ ' ' + selectedOrder.name + ',';
        
        let inStock = document.createElement('p');
        inStock.classList = 'text';
        inStock.innerText = 'lagerSaldo' +':'+ ' ' + selectedOrder.inStock;
        
        let productInput = document.createElement('input');
        productInput.classList = 'productInput';
        productInput.innerText = 'ändra antal';
        let productButton = document.createElement('button');
        productButton.classList = 'productButton';
        productButton.innerText = 'uppdatera';
        productButton.addEventListener("click", function() {
            FormData = new FormData()
            FormData.set('productID', selectedOrder.productID)
            FormData.append('inStock', productInput.value)
            FormData.append('endpoint', 'updateInStock')
            makeRequest('./../API/recievers/productReciever.php', 'POST', FormData, (result) => {
                if (result) {
                    location.reload();
                }
            })
        })
        orderDiv.appendChild(contentDiv);
        contentDiv.appendChild(productID);
        contentDiv.appendChild(name);
        contentDiv.appendChild(inStock);
        contentDiv.appendChild(productInput);
        contentDiv.appendChild(productButton);
    }    
}  

export function makeOrder(){
    let customer = getCurrentUser()
    getLogggedInUser((customer) => {    

console.log(getShipperID())

        cartSort(customer[0].customerID, getShipperID())
                //console.log(customer[0].customerID)    
    
})
}
export function getAllOrders() {
    //console.log(getAllOrders);
    makeRequest('./../API/recievers/orderReciever.php?endpoint=getAllOrder', 'GET', null, (result) => {
        console.log(result);
        if (result.status == 404){
            alert(result);
        } else {
            renderOrders(result);     
        }
    })
}
export function getAllSubscribers() {
    makeRequest('./../API/recievers/orderReciever.php?endpoint=getAllSubscribers', 'GET', null, (result) => {
        if (result.status == 404){
        } else {
            let sub = result;           
            renderNewsletterSubscribers(sub);     
        }
    })
}

export function getAllChangeProducts() {
    makeRequest('./../API/recievers/orderReciever.php?endpoint=getAllChangeProducts', 'GET', null, (result) => {
        if (result.status == 404){
        } else {
            let product = result;
            renderProducts(product);
        }
    })
}

function formatDate(date) {
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();
        if (month.length < 2) 
    month = '0' + month;
    if (day.length < 2) 
    day = '0' + day;
    return [year, month, day].join('-');
}
function cartSort(customerID, shipperID){
    console.log(shipperID)
    let order = {
        sum: 0,
        customerID: customerID,
        shipperID: shipperID,
        date: formatDate(new Date().toDateString()),
        details: []
    }
    console.log(order)
let cart = getCart()
    //console.log(cart)
        cart.forEach((product) => {
            //console.log(product)
        let exists = false
        order.sum += (Number)(product.price)
                order.details.forEach((orderDetail) => {
            if(orderDetail.productID == product.productID) {
                orderDetail.quantity++
                orderDetail.sum += (Number)(product.price)
                exists = true
            }
        })
        if(!exists) {
            order.details.push({
                productID: product.productID,
                quantity: 1,
                sum: (Number)(product.price)
            })
        }
    })
    let data = new FormData();
    data.set("sortedCart", JSON.stringify(order))
    data.set("endpoint", "createOrder")
    makeRequest('./../API/recievers/orderReciever.php', 'POST', data, (result) => {

        console.log(result)
        console.log(order)
    })
};
