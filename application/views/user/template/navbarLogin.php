<?php
    if (empty($this->session->userdata('id_user'))) {
        redirect('login');
    }
?>
<div class="navbar">
    <img src="<?php echo base_url().'assets/img/logo.png' ?>" alt="logo">
    <div>
        <a href="<?= base_url().'user/home'?>" id="linkHome" class="navLink">
            <i class="fas fa-campground    "></i>
            <span>Home</span>
        </a>
        <a href="<?= base_url().'user/home/catalogue'?>" id="linkCat" class="navLink">
            <i class="fas fa-list    "></i>
            <span>Catalogue</span>
        </a>
        <a href="<?= base_url().'user/home/cart'?>" id="linkCart" class="navLink">
            <i class="fas fa-cart-arrow-down    "></i>
            <span>My Cart</span>
        </a>
        <a href="<?= base_url().'user/home/mytrans'?>" id="linkTrans" class="navLink">
            <i class="fas fa-money-check-alt    "></i>
            <span>My Transaction</span>
        </a>

        <a href="<?= base_url().'login/logout'?>" id="linkLogout" class="navLink">
            <i class="fas fa-power-off    "></i>
            <span>Login</span>
        </a>
    </div>
</div>