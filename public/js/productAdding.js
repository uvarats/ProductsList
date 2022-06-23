(function (window, document, undefined) {
    window.onload = async () => {
        const form = document.getElementById('product_form');
        form.addEventListener('submit', onsubmit);
        const switcher = document.getElementById('productType');
        switcher.addEventListener('change', typeSwitch);
        const cancel = document.querySelectorAll('.btn.btn-outline-danger')[0];
        cancel.addEventListener("click", (event) => {
            location.replace('/');
        });
        let dynamicFieldsResponse = await fetch('/product/get/dynamicfields', {
            method: 'POST',
        });
        htmls = await dynamicFieldsResponse.json();
    }
})(window, document, undefined);

let htmls;

async function onsubmit(event) {
    event.preventDefault();
    //event.stopPropagation();
    if (event.target.checkValidity()) {
        let response = await fetch('/product/submit', {
            method: 'POST',
            body: new FormData(event.target)
        });
        let responseJson = await response.json();
        console.log(responseJson);
    }
    event.target.classList.add('was-validated');
}
function typeSwitch(event) {
    let newType = event.target.value;
    let div = document.getElementById('dynamicFields');
    div.innerHTML = htmls[newType];
}