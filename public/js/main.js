(function (window, document, undefined) {
    window.onload = () => {
        const button = document.getElementById("delete-product-btn");
        button.addEventListener("click", massDelete);
        const addButton = document.querySelectorAll('.btn.btn-outline-success.me-3')[0];
        addButton.addEventListener('click', function (event) {
            location.replace('/add-product');
        })
    }
})(window, document, undefined);

async function massDelete() {
    const checked = Array.from(document.querySelectorAll(".delete-checkbox:checked"));
    const divs = checked.map(function (current) {
        return current.closest(".col.mt-3");
    });
    const ids = checked.map(function (current) {
        return current.value;
    });
    let stringIds = JSON.stringify(ids);
    await fetch('/product/delete', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
        },
        body: stringIds,
    });
    divs.forEach(function (current) {
        current.remove();
    })
}