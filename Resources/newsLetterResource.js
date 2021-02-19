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

export function sendNewsLetter(event) {
    event.preventDefault()
    const formData = new FormData(event.target);
    makeRequest('./../API/recievers/newsletterReciever.php', 'POST', formData, (result) => {
    })
}