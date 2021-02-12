async function getAllProducts(){
    const result = await makeRequest("./api/recievers/productReciever.php", "GET")
    console.log(result)
}


async function deleteAllProducts(){

    let body = new FormData()
    body.append("action", "deleteAll")

    const result = await makeRequest("./api/recievers/productReciever.php", "GET", body)
    console.log(result)
}


async function addProduct(){

    const product = {
        name: document.getElementById("name").value,
        price: document.getElementById("price").value,
        size: document.getElementById("size").value
    }

    let body = new FormData()
    body.append("action", "add")
    body.append("product", JSON.stringify(product))

    const result = await makeRequest("./api/recievers/productReciever.php", "POST", body)
    console.log(result)
}


async function makeRequest(url, method, body){
    try {
        const response = await fetch(url, {
            method, 
            body
        })
        return response.json()
    } catch(error) {
        console.log(error)
    }

}
