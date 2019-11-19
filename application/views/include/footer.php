<?php
defined("BASEPATH") or exit("No direct script access allowed.");
?>
<div class="row">
    <div class="col-md-12">
        <div class="copyright text-center">
            <p>Copyright © 2018. All rights reserved. By <a href="https://atreyaassociates.com">Atreya associates</a>.</p>
        </div>
    </div>
</div>

<!--<footer class="text-center"> copyright &copy: 2019</footer>-->
<!-- Jquery JS-->
<script type="text/javascript" src="<?= base_url('assets/vendor/jquery-3.2.1.min.js')?>"></script>
<!-- Bootstrap JS-->
<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap-4.1/popper.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap-4.1/bootstrap.min.js')?>"></script>


<script src="<?= base_url('assets/vendor/js-toast-master/toast.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/function.js')?>"></script>
<!-- Vendor JS       -->
<script type="text/javascript" src="<?= base_url('assets/vendor/slick/slick.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/wow/wow.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/animsition/animsition.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')?>">
</script>
<script type="text/javascript" src="<?= base_url('assets/vendor/counter-up/jquery.waypoints.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/counter-up/jquery.counterup.min.js')?>">
</script>
<script type="text/javascript" src="<?= base_url('assets/vendor/circle-progress/circle-progress.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.js')?>"></script>
<script type="text/javascript"  src="<?= base_url('assets/vendor/chartjs/Chart.bundle.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/select2/select2.min.js')?>">
</script>
<script type="text/javascript" src="<?= base_url('assets/vendor/vector-map/jquery.vmap.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/vector-map/jquery.vmap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/vector-map/jquery.vmap.sampledata.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/vector-map/jquery.vmap.world.js')?>"></script>
<link href="https://fonts.googleapis.com/css?family=Abel|Arima+Madurai|Caudex|Roboto+Condensed|Squada+One|Turret+Road|Varela+Round&display=swap" rel="stylesheet"> <!-- Main JS-->
<script type="text/javascript" src="<?= base_url('assets/js/main.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js')?>"></script>
<link href="<?= base_url('assets/toastr-master/build/toastr.css')?>" rel="stylesheet" media="all">
<script type="text/javascript" src="<?= base_url('assets/js/toastr.js')?>"></script>
<link href="<?= base_url('assets/pg-calendar-master/dist/css/pignose.calendar.css')?>" rel="stylesheet" media="all">
<link href="<?= base_url('assets/jquery-timpicker-master/jquery.timepicker.css')?>" rel="stylesheet" media="all">
<script type="text/javascript" src="<?= base_url('assets/pg-calendar-master/dist/js/pignose.calendar.full.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/jquery-timepicker-master/jquery.timepicker.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datatables.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/DataTables-1.10.20/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/DataTables-1.10.20/dataTables.bootstrap4.min.js')?>"></script>

   <script> function loadCompany() {
        window.location.href="<?= base_url('Forms/companyDashboard')?>";
    }
    function loadBankDetails() {
        window.location.href="<?= base_url('Forms/formBankDetails')?>";
    }
    function loadState() {
        window.location.href="<?= base_url('Forms/formState')?>"
    }
    function loadDistict() {
        window.location.href="<?= base_url('Forms/formDistrict')?>";
    }
    function loadEducation() {
        window.location.href="<?= base_url('Forms/formEducation')?>";
    }
    function loadYear() {
        window.location.href="<?= base_url('Forms/formYear')?>";
    }
    function loadEmployee() {
        window.location.href="<?= base_url('Forms/employeeDashboard')?>";
    }
    function loadMaritalStatus() {
        window.location.href="<?= base_url('Forms/formMaritalStatus')?>";
    }
    function loadGender() {
        window.location.href="<?= base_url('Forms/formGender')?>";
    }
    function mainDashboard() {
        window.location.href="<?= base_url('Dashboard/')?>";
    }
    function formDashboard() {
        window.location.href="<?= base_url('Forms/')?>";
    }
    function loadUser() {
        window.location.href="<?= base_url('Forms/userDashboard')?>";
    }
    function loadRecruitmentDashboard() {
        window.location.href="<?= base_url('Forms/formRecruitmentDashboard')?>";
    }
    function loadReligion() {
        window.location.href="<?= base_url('Forms/formReligion')?>";
    }
    function loadSkill() {
        window.location.href="<?= base_url('Forms/formSkill')?>";
    }
    function loadCommunicationType() {
        window.location.href="<?= base_url('Forms/formCommunicationType')?>";
    }
    function loadExperienceType() {
        window.location.href="<?= base_url('Forms/formExperienceType')?>";
    }
    function loadJobPosting() {
        window.location.href="<?= base_url('Forms/formJobPosting')?>";
    }
    function loadNewRecruitment() {
        window.location.href="<?= base_url('Forms/formRecruitment')?>";
    }
    function loadAttendanceDashboard() {
        window.location.href="<?= base_url('Forms/loadAttendanceDashboard')?>";
    }
    function loadAttendance() {
        window.location.href="<?= base_url('Forms/formAttendance')?>";
    }
    function loadAttendanceType() {
        window.location.href="<?= base_url('Forms/formAttendanceType')?>";
    }
    function loadAttendanceSheet() {
        window.location.href="<?= base_url('Forms/formAttendanceSheet')?>";
    }
    function loadResourceDashboard() {
        window.location.href="<?= base_url('Forms/loadResourceDashboard')?>";
    }
    function loadResourceType() {
        window.location.href="<?= base_url('Forms/formResourceType')?>";
    }
    function loadAssurance() {
        window.location.href="<?= base_url('Forms/formAssurance')?>";
    }
    function loadResourceComapany() {
        window.location.href="<?= base_url('Forms/formCompanies')?>";
    }
    function loadResource() {
        window.location.href="<?= base_url('Forms/formResource')?>";
    }
    function loadPeriodtype() {
        window.location.href="<?= base_url('Forms/formPeriodtype')?>";
    }
    function loadIdcardDashboard() {
        window.location.href="<?= base_url('Forms/formIdCardDashboard')?>";
    }
    function loadIDcardGenerate() {
        window.location.href="<?= base_url('Forms/formIdCardGenerate')?>";
    }
    function loadIDcardIssued() {
        window.location.href="<?= base_url('Forms/formIdCardIssued')?>";
    }
    function loadIDcardFormat() {
        window.location.href="<?= base_url('Forms/formIdCardFormate')?>";
    }

</script>
</div>
</div>
</body>
</html>
