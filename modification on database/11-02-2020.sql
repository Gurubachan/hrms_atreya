drop view view_temp_employee;
drop view view_job_posting;
alter table tbl_education alter column educationname type varchar(60) using educationname::varchar(60);
create or replace view view_temp_employee(id, slno, fname, mname, lname, departmentmappingid, dob, mobile, emailid, aadharno, address, createdat, designationid, districtid, districtname, statid, statename, doj, dol, educationid, empid, epfno, esifno, fathername, genderid, mothername, maritalstatusid, panno, spousename, updatedat, updatedby, entryby, designationname, gendername, statusname, educationname, companyname, isactive, isattendance) as
SELECT tte.id,
	   tte.slno,
	   tte.fname,
	   tte.mname,
	   tte.lname,
	   tte.departmentmappingid,
	   tte.dob,
	   tte.mobile,
	   tte.emailid,
	   tte.aadharno,
	   tte.address,
	   tte.createdat,
	   tte.designationid,
	   tte.districtid,
	   tdst.distname AS districtname,
	   tdst.stateid  AS statid,
	   ts.statename,
	   tte.doj,
	   tte.dol,
	   tte.educationid,
	   tte.empid,
	   tte.epfno,
	   tte.esifno,
	   tte.fathername,
	   tte.genderid,
	   tte.mothername,
	   tte.maritalstatusid,
	   tte.panno,
	   tte.spousename,
	   tte.updatedat,
	   tte.updatedby,
	   tte.entryby,
	   tdg.designationname,
	   tg.gendername,
	   tms.statusname,
	   te.educationname,
	   tc.companyname,
	   tte.isactive,
	   tte.isattendance
FROM ((((((((tbl_temp_employee tte
	JOIN tbl_department_mapping tdm ON ((tte.departmentmappingid = tdm.id)))
	JOIN tbl_designation tdg ON ((tte.designationid = tdg.id)))
	JOIN tbl_gender tg ON ((tte.genderid = tg.id)))
	JOIN tbl_marital_status tms ON ((tte.maritalstatusid = tms.id)))
	JOIN tbl_district tdst ON ((tte.districtid = tdst.id)))
	JOIN tbl_education te ON ((tte.educationid = te.id)))
	JOIN tbl_state ts ON ((tdst.stateid = ts.id)))
		 JOIN tbl_company tc ON ((tdm.companyid = tc.id)));
create or replace view view_job_posting(id, companyid, companyname, postname, designationid, designationname, nov, localtion, jobdescription, experiancename, responsibility, startdate, enddate, qualificationid, educationname, skillid, skill, createdat, updatedby, updatedat, isactive) as
SELECT jp.id,
	   jp.companyid,
	   tc.companyname,
	   jp.postname,
	   jp.designationid,
	   td.designationname,
	   jp.nov,
	   jp.localtion,
	   jp.jobdescription,
	   jp.experience AS experiancename,
	   jp.responsibility,
	   jp.startdate,
	   jp.enddate,
	   tjpq.qualificationid,
	   te.educationname,
	   tjps.skillid,
	   ts.skill,
	   jp.createdat,
	   jp.updatedby,
	   jp.createdat  AS updatedat,
	   jp.isactive
FROM ((((((tbl_job_posting jp
	JOIN tbl_job_posting_qualification tjpq ON ((jp.id = tjpq.jpid)))
	JOIN tbl_job_posting_skill tjps ON ((jp.id = tjps.jpid)))
	JOIN tbl_education te ON ((tjpq.qualificationid = te.id)))
	JOIN tbl_skill ts ON ((tjps.skillid = ts.id)))
	JOIN tbl_designation td ON ((jp.designationid = td.id)))
		 JOIN tbl_company tc ON ((jp.companyid = tc.id)));
drop view view_department_mapping;
create or replace view view_department_mapping(id,companytypeid,companytypename, companyid, companyname, departmentid, departmentname, entryby, createdat, updatedby, updatedat, isactive) as
SELECT tdm.id,
	   tc.companytypeid,
	   tct.typename as companytypename,
	   tdm.companyid,
	   tc.companyname,
	   tdm.departmentid,
	   td.departmentname,
	   tdm.entryby,
	   tdm.createdat,
	   tdm.updatedby,
	   tdm.updatedat,
	   tdm.isactive
FROM ((tbl_department_mapping tdm
	JOIN tbl_company tc ON ((tdm.companyid = tc.id)))
		 join tbl_company_type tct on tc.companytypeid=tct.id
		 JOIN tbl_department td ON ((tdm.departmentid = td.id)));

alter table tbl_employee_basic_details alter column empslno type varchar(20) using empslno::varchar(20);
alter table tbl_employee_basic_details
	add religionid smallint default null;


