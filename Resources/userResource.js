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

export function getLogggedInUser(callback){
    makeRequest('./../API/recievers/userReciever.php?endpoint=getLoggedinUser', 'GET', null, (result) => {
        if (result == false){
            console.log("not logged in")
            callback(result)
        } else {
            callback(result)
            console.log(result)
        }
    })
}

export async function login(event) {
    var username = document.getElementById("usernameInput").value
    var password = document.getElementById("passwordInput").value
    makeRequest('./../API/recievers/userReciever.php?endpoint=login&username=' + username + '&password=' + password, 'GET', null, (customer) => {
        if (customer.status == 404){
            alert("Det gick inte att logga in!");
        } else {
            localStorage.setItem("currentUser", JSON.stringify(customer));
            //alert("Du är inloggad!");
            //window.location.href='index.php';
        }
    })
}


export function logout(customer) {
    localStorage.removeItem("currentUser", JSON.stringify(customer));
    makeRequest('./../API/recievers/userReciever.php?endpoint=logout', 'GET', null, (customer) => {
    })
    alert("Du har loggat ut!");
    window.location.href='index.php';
}


export function getSpecific(event) {
    var username = document.getElementById("usernameInput").value
    var password = document.getElementById("passwordInput").value
    makeRequest('./../API/recievers/userReciever.php?endpoint=getSpecific&username=' + username + '&password=' + password, 'GET', null, (customer) => {
        if (customer.status == 404){
        } else {
            console.log(customer)            
        }
    })
}

export function registerNewUser() {  
    var fName = document.getElementById("fName").value
    var lName = document.getElementById("lName").value
    var email = document.getElementById("usernameInput").value
    var phone = document.getElementById("phone").value
    var password = document.getElementById("passwordInput").value
    var city = document.getElementById("city").value
    var postalcode = document.getElementById("postalcode").value
    var country = document.getElementById("country").value
    var street = document.getElementById("street").value

    let data = new FormData()
    data.append("fName", fName)
    data.append("lName", lName)
    data.append("email", email)
    data.append("phone", phone)
    data.append("password", password)
    data.append("city", city)
    data.append("postalcode", postalcode)
    data.append("country", country)
    data.append("street", street)
    data.append("endpoint", "addNew")
            
    makeRequest('./../API/recievers/userReciever.php', 'POST', data, (result) => {
    })        
}