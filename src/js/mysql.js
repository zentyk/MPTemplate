import DataLogic from "./logic/dataLogic.js";

let btn = document.getElementById('sendBtn');
let dataLogic = new DataLogic();

let response = document.getElementById('response');

if(btn !== null) {
    btn.addEventListener('click', async function() {
        let name = document.getElementById('name').value;
        await dataLogic.getData(name);
        response.innerText = dataLogic.modelData.model.name;
    });
}