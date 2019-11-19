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
                        <li onclick="loadAttendanceType()"><i class="fa fa-calendar "></i> &nbsp;Attendance Type</li>
                        <li onclick="loadAttendance()"><i class="fa fa-calendar-plus "></i> &nbsp; Attendance Form</li>
                        <li onclick="loadAttendanceSheet()"><i class="fa fa-calendar-check"></i> &nbsp; Attendance Sheet</li>
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
