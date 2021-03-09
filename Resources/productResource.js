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
        callback(result)
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
            
            const productContainer = document.getElementById("productContainer")
            productContainer.className = "col"
            
            const productDiv = document.createElement("div")
            productDiv.className = "card col-sm-12 col-md-12 col-lg-4"
            
            const image = document.createElement("img")
            image.setAttribute("src", "./img/products/" + selectedProduct + image)
            image.className = "img-product"
            // Kundvagns-ikon i knappen
            const cartIcon = document.createElement("i") 
            cartIcon.className = "bi bi-bag"
            const addToCartBtn = document.createElement("button")
            addToCartBtn.className = "btn btn-outline-success"
            addToCartBtn.innerHTML = " Köp "
            // Funktion för att lägga i kundvagnen 
            addToCartBtn.addEventListener("click", function()  { 
                saveToLocalStorage(selectedProduct)
                numberOfProductsInCart()           
            }) 
            const title = document.createElement("h3")
            title.innerHTML = selectedProduct.name
            const price = document.createElement("h3") 
            price.innerHTML = selectedProduct.price - selectedProduct.discount + " kr"
            const inStock = document.createElement("h3")
            
            productContainer.append(productDiv) 
            productDiv.append(image)
            productDiv.append(title)
            productDiv.append(price)
            productDiv.append(inStock)
            
            if(selectedProduct.discount != 0) {
                const discount = document.createElement("h4")
                discount.className = "badge bg-primary"
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
            
            const productContainer = document.getElementById("productContainer")
            productContainer.className = "col"
            
            const productDiv = document.createElement("div")
            productDiv.className = "card col-sm-12 col-md-12 col-lg-4"
            
            const image = document.createElement("img")
            image.setAttribute("src", "./img/products/" + selectedProduct.image)
            image.className = "img-product"
            // Kundvagns-ikon i knappen
            const cartIcon = document.createElement("i") 
            cartIcon.className = "bi bi-bag"
            const addToCartBtn = document.createElement("button")
            addToCartBtn.className = "btn btn-outline-success"
            addToCartBtn.innerHTML = " Köp "
            // Funktion för att lägga i kundvagnen 
            addToCartBtn.addEventListener("click", function()  { 
                saveToLocalStorage(selectedProduct)
                numberOfProductsInCart()                 
            }) 
            const title = document.createElement("h3")
            title.innerHTML = selectedProduct.name
            const price = document.createElement("h3") 
            price.innerHTML = selectedProduct.price - selectedProduct.discount +  " kr"
            
            const discount = document.createElement("h4")
            discount.className = "badge bg-primary"
            discount.innerHTML = "10 %"
            discount.id = "discount"
            
            productContainer.append(productDiv) 

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

/* function getAll(){
    makeRequest('./API/recievers/categoryReciever.php?endpoint=getAll', 'GET', null, (result) => {
        console.log(result);
        console.log(result[0]['ID']);
        for (let i = 0; i < result.length; i++){
            
        console.log(result.length[i]);
        }
    })
};
getAll() */

function showBothMenAndWomen(){
    makeRequest('./API/recievers/categoryReciever.php?endpoint=getAll', 'GET', null, (result) => {
        for (let i = 0; i < result.length; i++){
            const showProducts = document.getElementById("allProducts")
            showProducts.innerHTML = "" 

            //console.log(result[5]['name']);
            
            for (let i = 0; i < result.length; i++) {
                const selectedProduct = result[i]
                
                //const productContainer = document.getElementById("productContainer")
                //productContainer.className = "col"
                
                const productDiv = document.createElement("div")
                productDiv.className = "card col-sm-12 col-md-12 col-lg-4"
                
                const image = document.createElement("img")
                image.setAttribute("src", "./img/products/" + selectedProduct.image)
                image.className = "img-product"
                // Kundvagns-ikon i knappen
                const cartIcon = document.createElement("i") 
                cartIcon.className = "bi bi-bag"
                const addToCartBtn = document.createElement("button")
                addToCartBtn.className = "btn btn-outline-success"
                addToCartBtn.innerHTML = " Köp "
                // Funktion för att lägga i kundvagnen 
                addToCartBtn.addEventListener("click", function()  { 
                    saveToLocalStorage(selectedProduct)
                    numberOfProductsInCart()
                }) 
                const title = document.createElement("h3")
                title.innerHTML = selectedProduct.name
                const price = document.createElement("h3") 
                price.innerHTML = selectedProduct.price - selectedProduct.discount + " kr"
                
                //productContainer.append(productDiv) 
                productDiv.append(image)
                productDiv.append(title)
                productDiv.append(price)
                
                if(selectedProduct.discount != 0) {
                    const discount = document.createElement("h4")
                    discount.className = "badge bg-primary"
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
    console.log(getCart)
    var quantity = document.getElementById("numberOfItemsInCart")
    quantity.innerHTML = getCart.length;   
}


