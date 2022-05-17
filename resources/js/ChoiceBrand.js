const axios = require('axios').default;
import {alert} from "./alert";

class ChoiceBrand {
    constructor() {
        const brand = document.querySelector('#brand');
        const model = document.querySelector('#model');
        const saveForm = document.querySelector('#saveForm');
        const sendButton = document.querySelector('#sendButton');

        if (brand) {
            brand.addEventListener('click', (event) => {

                if (event.target.value > 0) {
                    this.getBrand(event.target.value);
                } else {
                    model.innerHTML = "";
                    model.disabled = true;
                    sendButton.disabled = true;
                }
            });
        }

        if (saveForm) {
            saveForm.addEventListener('submit', (event) => {
                event.preventDefault();

                this.setData(event);
            });
        }
    }

    setData(event) {
        let formData = new FormData(event.target);

        axios.post('/result', formData)
            .then(function (response) {

                if(response.data.result === 1){
                    alert('Отлично данные добавленные', 'success');
                } else alert('Ошибка что-то пошло не так', 'danger');
            })
            .catch(function (error) {
                alert('Ошибка запроса', 'danger');
            })
            .then(function () {
                // always executed
            });
    }

    getBrand(id) {
        axios.post('/model', {
            modelId: id,
        })
            .then(function (response) {
                const model = document.querySelector('#model');
                const sendButton = document.querySelector('#sendButton');
                /** снимаем ограничение */
                model.disabled = false;
                sendButton.disabled = false;
                /**  чистим селект **/
                model.innerHTML = "";

                for (let i in response.data) {
                    let select = document.createElement("option")
                    select.value = response.data[i].id;
                    select.textContent = response.data[i].name;

                    model.append(select)
                }
            })
            .catch(function (error) {
                alert('Ошибка запроса', 'danger');
            })
            .then(function () {
                // always executed
            });
    }
}

new ChoiceBrand();
