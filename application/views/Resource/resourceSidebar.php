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
                        <li onclick="loadResourceType()"><i class="fa fa-cubes "></i> &nbsp;Resource Type</li>
                        <li onclick="loadResourceComapany()"><i class="fa fa-cubes "></i> &nbsp;Resource Company</li>
                        <li onclick="loadAssurance()"><i class="fa fa-handshake-o "></i> &nbsp;Assurance</li>
                        <li onclick="loadPeriodtype()"><i class="fa fa-cubes "></i> &nbsp;Assurance Period</li>
                        <li onclick="loadResource()"><i class="fa fa-suitcase "></i> &nbsp; Resource</li>

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

