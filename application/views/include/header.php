<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/images/favicon.png');?>" type="image/ico" />
<!--    <script type="text/javascript" src="--><?//= base_url('assets/jss/jquery-3.4.1.min.js')?><!--"></script>-->
<!--    <link rel="stylesheet" href="--><?//= base_url('assets/css/bootstrap.css') ?><!--">-->
<!--    <link rel="stylesheet" href="--><?//= base_url('assets/css/custom.css')?><!--">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--demo-css-->
    <link href="<?= base_url('assets/css/font-face.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/font-awesome-4.7/css/font-awesome.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/font-awesome-5/css/fontawesome-all.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url('assets/vendor/bootstrap-4.1/bootstrap.min.css')?>" rel="stylesheet" media="all">
<!--    <script type="text/javascript" src="--><?//= base_url('assets/js/bootstrap.js');?><!--"></script>-->
    <!-- Vendor CSS-->
    <link href="<?= base_url('assets/vendor/animsition/animsition.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/wow/animate.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/slick/slick.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/select2/select2.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/vector-map/jqvmap.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/css/datatables.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/css/DataTables-1.10.20/dataTables.bootstrap4.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/css/jquery-ui.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/css/Chart.min.css')?>" rel="stylesheet" media="all">
    <!-- calender-->
    <!-- Main CSS-->
    <link href="<?= base_url('assets/css/theme.css')?>" rel="stylesheet" media="all" >
    <title>HRMS</title>
</head>
<body class="animsition" id="mainContainer">
<div class="col-sm-12">
<!--<body>-->
