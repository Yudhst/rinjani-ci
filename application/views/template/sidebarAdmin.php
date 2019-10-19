<div class="sidebar">
            <div class="sidebar_item">
                MENU
            </div>
            <div class="sidebar_container">
                <div class="sidebar_item">
                    <a href="<?= base_url().'admin/admin/'?>">
                        <i class="fas fa-tachometer-alt    "></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="sidebar_item">
                    <a href="<?php echo base_url().'admin/category/'?>">
                        <i class="fas fa-bars    "></i>
                        <span>Categories</span>
                    </a>
                </div>
                <div class="sidebar_item">
                    <a href="<?php echo base_url().'admin/product/'?>">
                        <i class="fas fa-campground    "></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="sidebar_item" id="sidebar_item_user">
                    <p id="menuUsers">
                        <i class="fas fa-user-alt    "></i>
                        <span>Users</span>
                    </p>
                    <ul>
                        <li>
                            <a href="<?php echo base_url().'admin/user/'?>">
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>&nbsp;Active Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'admin/user/pending'?>">
                                <i class="fa fa-frown" aria-hidden="true"></i>
                                <span>Pending Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar_item" style="margin-top:-2%;" id="sidebar_item_trans">
                    <p id="menuTrans">
                        <i class="fas fa-piggy-bank    "></i>
                        <span>Transactions</span>
                    </p>
                    <ul>
                        <li>
                            <a href="<?php echo base_url().'admin/transaction/waiting'?>">
                                <i class="fas fa-clock    "></i>
                                <span>Wait for Confirm</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'admin/transaction/success'?>">
                                <i class="fas fa-money-check-alt    "></i>
                                <span>Finished</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="containerku">
            <div class="cardku">