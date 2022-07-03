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
        if(responseJson['error']) {
            alert(responseJson['error'], 'danger');
        }
        if(responseJson['success']) {
            location.replace('/');
        }
    }
    event.target.classList.add('was-validated');
}
function typeSwitch(event) {
    let newType = event.target.value;
    let div = document.getElementById('dynamicFields');
    div.innerHTML = htmls[newType];
}

function alert(message, type) {
    let placeholder = document.getElementById('alertPlaceholder');
    let wrapper = document.createElement('div');

    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('');

    placeholder.append(wrapper);
}