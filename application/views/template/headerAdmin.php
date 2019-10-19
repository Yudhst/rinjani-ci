<?php
    if ($this->session->userdata('role') != 'admin') {
        redirect('login');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- JS Locals -->
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js' ?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui-1.12.1/jquery-ui.min.js' ?>"></script>

    <!-- Font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- Local Files -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/js/jquery-ui-1.12.1/jquery-ui.min.css' ?>" />

    <script src="<?php echo base_url().'assets/js/app.js' ?>"></script>

    <title><?= $title ?></title>
</head>


<body>
    <div class="navbar">
        <img src="<?php echo base_url().'assets/img/logo.png'?>" alt="logo" id="hideSidebar" style="cursor:pointer;">
        <div>
            <a href="<?= base_url().'login/logout'?>" id="linkLogout">
                <i class="fas fa-power-off    "></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
    <div class="container_body">