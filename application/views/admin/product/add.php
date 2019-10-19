<div class="card-headerku">
    <h3>
        <i class="fas fa-campground    "></i>
        <span>Add Products</span>
    </h3>
</div>
<?php echo form_open_multipart('admin/product/add') ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-item">
        <label for="varName">Name</label>
        <input type="text" name="varName" class="form-input" required>
    </div>
    <div class="form-item">
        <label for="varCat">Category</label>
        <select name="varCat" class="form-input" required>
            <option selected>Choose a category</option>
            <?php foreach($kumpulanKategori as $cat): ?>
                <option value="<?= $cat->id_categories ?>"><?= $cat->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-item">
        <label for="varPrice">Price</label>
        <input type="number" name="varPrice" class="form-input" required>
    </div>
    <div class="form-item">
        <label for="varStock">Stock</label>
        <input type="number" name="varStock" class="form-input" required>
    </div>
    <div class="form-item">
        <label for="varDesc">Description</label>
        <textarea name="varDesc" class="form-input"></textarea>
    </div>
    <div class="form-item">
        <label for="varImg">Image</label>
        <input type="file" name="varImg" class="form-input" required>
    </div>
    <div class="form-item">
        <button type="submit" class="btn btn-ijo">
            <i class="fas fa-plus    "></i>
            <span>Submit</span>
        </button>
    </div>
</form>
<?php echo form_close() ?>