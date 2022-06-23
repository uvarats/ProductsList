<?php

return json_encode([
    "DVD" => '<div id="DVD">
    <div class="mb-3">
        <label for="size" class="form-label">Size</label>
        <input type="number" step=".01" max="3e38" class="form-control" id="size" name="size" aria-describedby="sizeHelp"
               required>
        <div id="sizeHelp" class="form-text">Please, provide a size (in MB)!</div>
        <div class="invalid-feedback">
            Please, provide a valid data!
        </div>
    </div>
</div>',
    "Book" => '<div id="Book">
    <div class="mb-3">
        <label for="weight" class="form-label">Weight</label>
        <input type="number" step=".01" max="3e38" class="form-control" id="weight" name="weight" aria-describedby="weightHelp"
               required>
        <div id="weightHelp" class="form-text">Please, provide a weight (in Kg)!</div>
        <div class="invalid-feedback">
            Please, provide a valid data!
        </div>
    </div>
</div>',
    "Furniture" => '<div id="Furniture">
    <div class="mb-3">
        <label for="height" class="form-label">Height</label>
        <input type="number" step=".01" max="3e38" class="form-control" id="height" name="height" required>
    </div>
    <div class="mb-3">
        <label for="width" class="form-label">Width</label>
        <input type="number" step=".01" max="3e38" class="form-control" id="width" name="width" required>
    </div>
    <div class="mb-3">
        <label for="length" class="form-label">Length</label>
        <input type="number" step=".01" max="3e38" class="form-control" id="length" name="length" required>
    </div>
    <div class="form-text">Please, provide dimensions</div>
    <div class="invalid-feedback">
        Please, provide a valid data!
    </div>
</div>'
]);