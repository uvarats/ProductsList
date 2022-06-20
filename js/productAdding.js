(function (window, document, undefined) {
    window.onload = () => {
        const form = document.getElementById('product_form');
        form.addEventListener('submit', onsubmit);
        const switcher = document.getElementById('productType');
        switcher.addEventListener('change', typeSwitch);
        const cancel = document.querySelectorAll('.btn.btn-outline-danger')[0];
        cancel.addEventListener("click", (event) => {
            location.replace('/');
        });
    }
})(window, document, undefined);

const htmls = {
    DVD: "<div id=\"DVD\">\n" +
        "    <div class=\"mb-3\">\n" +
        "        <label for=\"size\" class=\"form-label\">Size</label>\n" +
        "        <input type=\"number\" class=\"form-control\" id=\"size\" aria-describedby=\"sizeHelp\"\n" +
        "               required>\n" +
        "        <div id=\"sizeHelp\" class=\"form-text\">Please, provide a size (in MB)!</div>\n" +
        "        <div class=\"invalid-feedback\">\n" +
        "            Please, provide a valid data!\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>",
    Book: "<div id=\"Book\">\n" +
        "    <div class=\"mb-3\">\n" +
        "        <label for=\"weight\" class=\"form-label\">Weight</label>\n" +
        "        <input type=\"number\" class=\"form-control\" id=\"weight\" aria-describedby=\"weightHelp\"\n" +
        "               required>\n" +
        "        <div id=\"weightHelp\" class=\"form-text\">Please, provide a weight (in Kg)!</div>\n" +
        "        <div class=\"invalid-feedback\">\n" +
        "            Please, provide a valid data!\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>",
    Furniture: "<div id=\"Furniture\">\n" +
        "    <div class=\"mb-3\">\n" +
        "        <label for=\"height\" class=\"form-label\">Height</label>\n" +
        "        <input type=\"number\" class=\"form-control\" id=\"height\" required>\n" +
        "    </div>\n" +
        "    <div class=\"mb-3\">\n" +
        "        <label for=\"width\" class=\"form-label\">Width</label>\n" +
        "        <input type=\"number\" class=\"form-control\" id=\"width\" required>\n" +
        "    </div>\n" +
        "    <div class=\"mb-3\">\n" +
        "        <label for=\"length\" class=\"form-label\">Length</label>\n" +
        "        <input type=\"number\" class=\"form-control\" id=\"length\" required>\n" +
        "    </div>\n" +
        "    <div class=\"form-text\">Please, provide dimensions</div>\n" +
        "    <div class=\"invalid-feedback\">\n" +
        "        Please, provide a valid data!\n" +
        "    </div>\n" +
        "</div>",
}

function onsubmit(event) {
    console.log('submit stage 1');
    if(!event.target.checkValidity()) {
        console.log('submit stage 2 (invalid form)');
        event.preventDefault();
        event.stopPropagation();
    }
    console.log('submit stage 3');
    event.target.classList.add('was-validated');
}
function typeSwitch(event) {
    let newType = event.target.value;
    let div = document.getElementById('dynamicFields');
    div.innerHTML = htmls[newType];
}