<?php
defined("BASEPATH") or exit("No direct script access allowed.");
?>
<div class="ch-container">
<div class="row" style="margin-top: 5%;">
<div class="box col-sm-2">
    <div class="box-inner">
        <div class="box-header well">
            <h2><i class="fa fa-angle-double-right "></i> Quick Links</h2>
        </div>
        <div class="box-content">
            <ul class="main-menu">
                <li onclick="mainDashboard()"><i class="fa fa-home "></i> &nbsp; Home</li>
                <li onclick="formDashboard()"><i class="fa fa-link "></i> &nbsp; Dashboard</li>
            </ul>
            <hr>
            <ul class="main-menu">
                <li onclick="loadState()"><i class="fa fa-cubes "></i> &nbsp; State</li>
                <li onclick="loadDistict()"><i class="fa fa-cube "></i> &nbsp; District</li>
                <li onclick="loadEducation()"><i class="fa fa-graduation-cap "></i> &nbsp; Education</li>
                <li onclick="loadYear()"><i class="fa fa-calendar-o "></i> &nbsp; Year</li>
                <li onclick="loadBankDetails()"><i class="fa fa-bank "></i> &nbsp; Bank</li>
            </ul>
            <hr>
            <ul class="main-menu">
                <li onclick="loadGender();"><i class="fa fa-venus-mars "></i> &nbsp; Gender</li>
                <li onclick="loadMaritalStatus()"><i class="fa fa-gem "></i> &nbsp; Marital Status</li>
            </ul>
            <hr>
            <ul class="main-menu">
                <li onclick=""><i class="fa fa-calendar-check-o "></i> &nbsp; Attendance</li>
                <li onclick=""><i class="fa fa-user-times "></i> &nbsp; Leave</li>
                <li onclick=""><i class="fa fa-id-card "></i> &nbsp; ICard</li>
                <li onclick=""><i class="fa fa-bullseye "></i> &nbsp; Resources</li>
                <li onclick=""><i class="fa fa-cogs "></i> &nbsp; Maintenance</li>
            </ul>
            <hr>
            <ul class="main-menu">
                <li onclick="loadCompany()"><i class="fa fa-building "></i> &nbsp; Company</li>
                <li onclick="loadEmployee()"><i class="fa fa-user "></i> &nbsp; Employee</li>
            </ul>
        </div>
        <hr>
        <div class="box-header well">
            <h2><i class="fa fa-angle-double-right "></i> Options</h2>
        </div>
        <div class="box-content">
            <ul class="main-menu">
                <li><i class="fa fa-feed "></i> &nbsp; Feedback</li>
                <li><i class="zmdi zmdi-sign-in"></i> &nbsp; Logout</li>
            </ul>
        </div>
    </div>
</div>
