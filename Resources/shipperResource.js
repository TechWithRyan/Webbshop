

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

export function getAllShippers() {
        event.preventDefault()
        makeRequest('./../API/recievers/shippersReciever.php?endpoint=getAllShippers', 'GET', null, (result) => {
        if (result.status == 404){
        } else {
            renderShippers(result);     
        }
    })
}

export function renderShippers(result) {  
   let shippersWrap = document.getElementById("shippers");
   let shipper = result;
   
   for (let i = 0; i < shipper.length; i++) {
    let selectedShipper = shipper[i];

    let shipperDiv = document.createElement('div');
        shipperDiv.classList = 'shipperDiv';
        
        let shipperID = document.createElement('p');
        shipperID.classList = 'shipperID';
        shipperID.innerText = selectedShipper.shipperID;


        let name = document.createElement('p');
        name.classList = 'shipperName';
        name.innerText = selectedShipper.name;


        let info = document.createElement('p')
        info.classList = 'shipperInfo';
        info.innerText = selectedShipper.info;

        let buttonDiv = document.createElement('p')
        buttonDiv.classList = 'buttonDiv'
        let choiceBtn = document.createElement('button')
        choiceBtn.classList = 'chooseShipper'
        choiceBtn.innerText = 'Välj'
        choiceBtn.addEventListener('click', function() {
            localStorage.setItem('shipperID', selectedShipper.shipperID)
        })
        buttonDiv.appendChild(choiceBtn);

        shippersWrap.appendChild(shipperDiv);
        shipperDiv.appendChild(name);
        shipperDiv.appendChild(info);
        shipperDiv.appendChild(buttonDiv);
    }    
}