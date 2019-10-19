<div class="card-headerku">
    <h3>
        <i class="fas fa-user    "></i>
        <span>Edit User</span>
    </h3>
</div>
<?php foreach($user as $usr): ?>
    <form action="" method="post">
        <div class="form-item">
            <label for="var_name">Name</label>
            <input type="text" name="varName" class="form-input" value="<?= $usr->fullname ?>" required>
        </div>
        <div class="form-item">
            <label for="var_email">Email</label>
            <input type="email" name="varEmail" class="form-input" value="<?= $usr->email ?>" required>
        </div>
        <div class="form-item">
            <label for="var_user">Username</label>
            <input type="text" name="varUsername" class="form-input" value="<?= $usr->username ?>" required>
        </div>
        <div class="form-item">
            <label for="var_pass">Password</label>
            <input type="password" name="varPassword" class="form-input" required>
        </div>
        <div class="form-item">
            <label for="var_role">Role</label>
            <select name="varRole" class="form-input" required>
                <option value="user" selected> -> Select a role</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-item">
            <button type="submit" class="btn btn-ijo">
                <i class="fas fa-plus    "></i>
                <span>Submit</span>
            </button>
        </div>
    </form>
<?php endforeach ?>