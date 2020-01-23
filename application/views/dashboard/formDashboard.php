<div class="container-fluid">
    <div class="row" >
        <div class="col-sm-12" style="margin-top:4%; min-height: 600px;">
			<div class="row">
				<div class="col-sm-2 dashboardPage" >
				<div style="position: fixed;">
                    <div class=" cardhover shadowDiv" id="" style="margin-top:4%;" >
                        <div class="card-body" >
                            <div class="form-group mr-auto ml-auto d-block p-t-0">
                                <span class="fa fa-caret-right">&nbsp;</span><label for="" id="dashboard">Home</label>
                            </div>
                        </div>
                    </div>
                    <div class=" cardhover shadowDiv" id="reportsFormMenu" >
                        <div class="card-body" >
                            <div class="form-group mr-auto ml-auto d-block p-t-0">
                                <span class="fa fa-caret-right">&nbsp;</span><label for="" id="reportsLabel">Reports</label>
                            </div>
                        </div>
                    </div>
                    <div class=" cardhover shadowDiv"  onclick="loadUser()">
                        <div class="card-body">
                            <div class="form-group mr-auto ml-auto d-block p-t-0">
                                <span class="fa fa-caret-right">&nbsp;</span><label for=""> User</label>
                                <div id="dashboard_calendar"></div>
                            </div>
                        </div>
                    </div>
                    <div class=" cardhover shadowDiv">
                        <div class="card-body">
                            <div class="form-group mr-auto ml-auto d-block p-t-0">
                                <label for=""><span class="fa fa-caret-right">&nbsp; </span>Calendar</label>
                                <div id="dashboard_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
				<div class="col-sm-1"></div>
				<div class=" col-sm-8 dashboardPage ">
					<div class="col-sm-1 " id="formLabel"><span class="menu_name_green">Forms</span></div>
					<hr class="hr">
					<div id="allforms_and_reports" style="margin-top: 15px;"></div>
				</div>
			</div>
        </div>
    </div>
</div>

