<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products list</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row row-cols-2">
        <div class="col">
            <h3>Products list</h3>
        </div>
        <div class="col d-flex justify-content-end">
            <form action="/add-product">
                <input class="btn btn-outline-success me-3" type="submit" value="Add"/>
                <input class="btn btn-outline-danger" id="delete-product-btn" type="button" value="Mass delete"/>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <hr/>
    </div>
    <div class="row row-cols-4">
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">JVC200123</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="1">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Acme DISC</h6>
                    <p class="card-text">1.00$</p>
                    <p class="card-text">Size: 700mb</p>
                </div>
            </div>
        </div>

        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">JVC200123</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="2">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Acme DISC</h6>
                    <p class="card-text">1.00$</p>
                    <p class="card-text">Size: 700mb</p>
                </div>
            </div>
        </div>

        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">JVC200123</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="3">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Acme DISC</h6>
                    <p class="card-text">1.00$</p>
                    <p class="card-text">Size: 700mb</p>
                </div>
            </div>
        </div>

        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">JVC200123</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="4">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Acme DISC</h6>
                    <p class="card-text">1.00$</p>
                    <p class="card-text">Size: 700mb</p>
                </div>
            </div>
        </div>

        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">GGWP0007</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="5">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Peace and War</h6>
                    <p class="card-text">20.00$</p>
                    <p class="card-text">Weight: 2KG</p>
                </div>
            </div>
        </div>

        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">TR121232</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="6">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Chair</h6>
                    <p class="card-text">77.00$</p>
                    <p class="card-text">Dimension: 43x53x10</p>
                </div>
            </div>
        </div>
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">JVC200123</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="1">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Acme DISC</h6>
                    <p class="card-text">1.00$</p>
                    <p class="card-text">Size: 700mb</p>
                </div>
            </div>
        </div>
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">JVC200123</h5>
                            <input type="checkbox" class="form-check-input delete-checkbox" value="1">
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Acme DISC</h6>
                    <p class="card-text">1.00$</p>
                    <p class="card-text">Size: 7mb</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>