<?php
defined("BASEPATH") or exit("No direct script access allowed.");
?>
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
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

<!-- Main JS-->
<script type="text/javascript" src="<?= base_url('assets/js/main.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js')?>"></script>
<script>
    function loadCompany() {
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
</script>
</div>
</div>
</body>
</html>
