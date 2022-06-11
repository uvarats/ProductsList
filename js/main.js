(function (window, document, undefined) {
    window.onload = () => {
        const button = document.getElementById("delete-product-btn");
        button.addEventListener("click", massDelete);
    }
})(window, document, undefined);

function massDelete(){
    const checked = Array.from(document.querySelectorAll(".delete-checkbox:checked"));
    const divs = checked.map(function (current) {
        return current.closest(".col.mt-3");
    });
    const ids = checked.map(function (current){
        return current.value;
    });
    divs.forEach(function (current) {
        current.remove();
    })
}