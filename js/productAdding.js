(function (window, document, undefined) {
    window.onload = () => {
        const form = document.getElementById('product_form');
        form.addEventListener('submit', onsubmit);
        const switcher = document.getElementById('productType');
        switcher.addEventListener('change', typeSwitch)
    }
})(window, document, undefined);
function onsubmit(event) {

    event.preventDefault();
}
function typeSwitch(event) {
    let newType = event.target.value;
    let div = document.getElementById('dynamicFields');
    let htmls = {
        DVD: "",
        Book: "",
        Furniture: "",
    }
    div.innerHTML = htmls[newType];
}