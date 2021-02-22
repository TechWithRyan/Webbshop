function getCart() {
    return JSON.parse(localStorage.getItem("localCart")) || [];
  }

var inCart = getCart();
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

export function getAllCategory() {
    const category = this.innerHTML;
    let categorytoSend;
    if (category == "Herr"){
        categorytoSend = 1;
    } else if (category == "Dam") {
        categorytoSend = 2;
    }
    makeRequest('./../API/recievers/categoryReciever.php?endpoint=getSpecific&categorytoSend=' + categorytoSend , 'GET', null, (result) => {
        const showProducts = document.getElementById("allProducts")
        showProducts.innerHTML = "" 

        for (let i = 0; i < result.length; i++) {
            const selectedProduct = result[i]
            
            const productDiv = document.createElement("div")
            productDiv.classList = "productDiv"

            const image = document.createElement("img")
            image.setAttribute("src", "./img/products/" + selectedProduct + image)
            image.classList = "productImage"
            // Kundvagns-ikon i knappen
            const cartIcon = document.createElement("i") 
            cartIcon.classList = "fas fa-cart-arrow-down"
            const addToCartBtn = document.createElement("button")
            addToCartBtn.innerHTML = "Köp"
            addToCartBtn.classList = "addToCartBtn"
            // Funktion för att lägga i kundvagnen 
            addToCartBtn.addEventListener("click", function()  { 
                saveToLocalStorage(selectedProduct)
                numberOfProductsInCart()           
            }) 
            const title = document.createElement("p")
            title.innerHTML = selectedProduct.name
            const price = document.createElement("p") 
            price.innerHTML = selectedProduct.price - selectedProduct.discount + " kr"

            productDiv.append(image)
            productDiv.append(title)
            productDiv.append(price)

            if(selectedProduct.discount != 0) {
                const discount = document.createElement("p")
                discount.innerHTML = "10 %"
                discount.id = "discount"
                productDiv.append(discount)
            }
            addToCartBtn.appendChild(cartIcon)
            productDiv.append(addToCartBtn)
            showProducts.append(productDiv)            
    }
    })
}

export function getDiscount() {
    makeRequest('./API/recievers/categoryReciever.php?endpoint=getDiscount', 'GET', null, (result) => {
        const showProducts = document.getElementById("allProducts")
        showProducts.innerHTML = "" 

        for (let i = 0; i < result.length; i++) {
            const selectedProduct = result[i]
            
            const productDiv = document.createElement("div")
            productDiv.classList = "productDiv"

            const image = document.createElement("img")
            image.setAttribute("src", "./img/products/" + selectedProduct.image)
            image.classList = "productImage"
            // Kundvagns-ikon i knappen
            const cartIcon = document.createElement("i") 
            cartIcon.classList = "fas fa-cart-arrow-down"
            const addToCartBtn = document.createElement("button")
            addToCartBtn.innerHTML = "Köp"
            addToCartBtn.classList = "addToCartBtn"
            // Funktion för att lägga i kundvagnen 
            addToCartBtn.addEventListener("click", function()  { 
                saveToLocalStorage(selectedProduct)
                numberOfProductsInCart()                 
            }) 
            const title = document.createElement("p")
            title.innerHTML = selectedProduct.name
            const price = document.createElement("p") 
            price.innerHTML = selectedProduct.price - selectedProduct.discount +  " kr"

            const discount = document.createElement("p")
            discount.innerHTML = "10 %"
            discount.id = "discount"

            productDiv.append(image)
            productDiv.append(title)
            productDiv.append(price)
            productDiv.append(discount)
            addToCartBtn.appendChild(cartIcon)
            productDiv.append(addToCartBtn)
            showProducts.append(productDiv) 
        }
    })
}

function showBothMenAndWomen(){
    makeRequest('./API/recievers/categoryReciever.php?endpoint=getAll', 'GET', null, (result) => {
    for (let i = 0; i < result.length; i++){
        const showProducts = document.getElementById("allProducts")
        showProducts.innerHTML = "" 

        for (let i = 0; i < result.length; i++) {
            const selectedProduct = result[i]
            
            const productDiv = document.createElement("div")
            productDiv.classList = "productDiv"

            const image = document.createElement("img")
            image.setAttribute("src", "./img/products/" + selectedProduct.image)
            image.classList = "productImage"
            // Kundvagns-ikon i knappen
            const cartIcon = document.createElement("i") 
            cartIcon.classList = "fas fa-cart-arrow-down"
            const addToCartBtn = document.createElement("button")
            addToCartBtn.innerHTML = "Köp"
            addToCartBtn.classList = "addToCartBtn"
            // Funktion för att lägga i kundvagnen 
            addToCartBtn.addEventListener("click", function()  { 
                saveToLocalStorage(selectedProduct)
                numberOfProductsInCart()
            }) 
            const title = document.createElement("p")
            title.innerHTML = selectedProduct.name
            const price = document.createElement("p") 
            price.innerHTML = selectedProduct.price - selectedProduct.discount + " kr"

            productDiv.append(image)
            productDiv.append(title)
            productDiv.append(price)

            if(selectedProduct.discount != 0) {
                const discount = document.createElement("p")
                discount.innerHTML = "10 %"
                discount.id = "discount"
                productDiv.append(discount)
            }
            addToCartBtn.appendChild(cartIcon)
            productDiv.append(addToCartBtn)
            showProducts.append(productDiv)            
    }
    }
})
}
showBothMenAndWomen()

function saveToLocalStorage(selectedProduct) {
    /* Sparar kundvagnen till localstorage */
    inCart.push(selectedProduct)
    var json_str = JSON.stringify(inCart);
    localStorage.localCart = json_str;
}

function numberOfProductsInCart() {
    var getCart = JSON.parse(localStorage.getItem("localCart"))
    var quantity = document.getElementById("numberOfItemsInCart")
    quantity.innerHTML = getCart.length;   
}
numberOfProductsInCart()

