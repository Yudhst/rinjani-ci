<div class="card-headerku">
    <h3>
        <i class="fas fa-user    "></i>
        <span>Edit Categories</span>
    </h3>
</div>
<?php foreach($category as $cat): ?>
<form action="" method="post">
    <div class="form-item">
        <label for="var_name">Name</label>
        <input type="text" name="varName" value="<?= $cat->name ?>" class="form-input" required>
    </div>
    <div class="form-item">
        <button type="submit" class="btn btn-ijo">
            <i class="fas fa-edit    "></i>
            <span>Submit</span>
        </button>
    </div>
</form>
<?php endforeach; ?>