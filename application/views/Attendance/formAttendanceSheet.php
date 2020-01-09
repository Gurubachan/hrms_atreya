<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
            <div class="box col-md-10">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="fa fa-angle-double-right "></i>Attendance Sheet</h2>
                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                        </div>
                    </div>

                    <div class="box-content">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<select name="" id="">
										<option value="">Today</option>
										<option value="">Yesterday</option>
										<option value="">Tommorow</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<input type="text" id="attendance_date" placeholder="mm/dd/yyyy">
								</div>
							</div>
						</div>
                        <div class="table-responsive">
                            <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-warning">
                                <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Employee Name</th>
                                    <th>ID Number</th>
                                    <th>Company Name</th>
                                    <th>Designation</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                </tr>
                                </thead>
                                <tbody id="load_attendance_sheet" style="color: #0b2e13;font-size: 13px;">
<!--                                <tr >-->
<!--                                    <th>1</th>-->
<!--                                    <th>Bijaya Bhusan Mohanty</th>-->
<!--                                    <th>AA1002</th>-->
<!--                                    <th>9861443189</th>-->
<!--                                    <th>Active</th>-->
<!--                                    <th class="text-center"><button type="button" class="btn btn-md"><i class="fa fa-list"></i></button></th>-->
<!--                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
            </div>
</div></div>
