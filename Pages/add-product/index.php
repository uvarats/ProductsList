<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product adding</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script type="module" src="/js/productAdding.js"></script>
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <form id="product_form" method="post" novalidate>
                <div class="row row-cols-2">
                    <div class="col">
                        <h3>Product adding</h3>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <input class="btn btn-outline-success me-3" type="submit" value="Add"/>
                        <input class="btn btn-outline-danger" type="button" value="Cancel"/>
                    </div>
                </div>
                <div class="row mt-2">
                    <hr/>
                </div>
                <div class="mb-3">
                    <label for="sku" class="form-label">SKU</label>
                    <input type="text" class="form-control" id="sku" required>
                    <div class="invalid-feedback">
                        Please, provide a SKU!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required>
                    <div class="invalid-feedback">
                        Please, provide a name of product!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="number" class="form-control" id="price" required>
                    <div class="invalid-feedback">
                        Please, provide a valid price in $.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="productType" class="form-label">Type switcher</label>
                    <select class="form-select" id="productType" required>
                        <option selected>DVD</option>
                        <option>Book</option>
                        <option>Furniture</option>
                    </select>
                </div>
                <div id="dynamicFields">
                    <div id="DVD">
                        <div class="mb-3">
                            <label for="size" class="form-label">Size</label>
                            <input type="number" class="form-control" id="size" aria-describedby="sizeHelp"
                                   required>
                            <div id="sizeHelp" class="form-text">Please, provide a size (in MB)!</div>
                            <div class="invalid-feedback">
                                Please, provide a valid data!
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>