function getCart() {
    return JSON.parse(localStorage.getItem("localCart")) || [];
  }

function showProductsInCart() {
    const showCartProducts = document.getElementById("productsInCart")
    showCartProducts.innerHTML = "" 

    for (let i = 0; i < getCart().length; i++) {
        const selectedProduct = getCart()[i]
        
        const productContainer = document.createElement("div")
        productContainer.className = "row"
        
        const productDiv = document.createElement("div")
        productDiv.className = "cart-card"

        const image = document.createElement("img")
        image.setAttribute("src", "./img/products/" + selectedProduct.image)
        image.classList = "img-cart"

        
        const title = document.createElement("p")
        title.innerHTML = selectedProduct.name
        const price = document.createElement("p") 
        price.innerHTML = selectedProduct.price - selectedProduct.discount + " kr"
        
        
        // Kundvagns-radera i knappen
        const trashIcon = document.createElement("i") 
        trashIcon.className = "bi bi-trash"
        const deleteProductBtn = document.createElement("button")
        deleteProductBtn.className = "btn btn-outline-danger"
        deleteProductBtn.innerHTML = ""
        deleteProductBtn.num = i;
        deleteProductBtn.addEventListener("click", function(){
            removeProductFromCart(this.num)
            numberOfProductsInCart()
            totalCart()
        })
        productContainer.append(productDiv)    
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
        deleteProductBtn.appendChild(trashIcon)
        productDiv.append(deleteProductBtn)
        showCartProducts.append(productDiv)  
    }
}
showProductsInCart()

function removeProductFromCart(title){
    const cart = JSON.parse(localStorage.getItem("localCart"))
    var selectedProduct = title;
    cart.splice(selectedProduct, 1)    
    localStorage.setItem("localCart", JSON.stringify(cart))
    showProductsInCart()
}

function numberOfProductsInCart() {
    var getCart = JSON.parse(localStorage.getItem("localCart"))
    var quantity = document.getElementById("numberOfItemsInCart")
    quantity.innerHTML = getCart.length   
}
numberOfProductsInCart()

function totalCart(){
    const sumDiv = document.getElementById("totalSum")
    sumDiv.innerHTML = "";
    const cart = JSON.parse(localStorage.getItem("localCart"))
    let total = 0;
    const sum = document.createElement("h3")
    sum.classList = "sumText"
    
    for (var i = 0; i < cart.length; i++){
        total += Number(cart[i].price);
        sum.innerText = "Totalbelopp: " + total + " kr"
        sumDiv.appendChild(sum)
    }
}
totalCart()  


