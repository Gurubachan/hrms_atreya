
drop view view_temp_employee;
create view view_temp_employee(id, slno, fname, mname, lname, departmentmappingid, dob, mobile, emailid, aadharno,
                               address, createdat, designationid, districtid, districtname, statid, statename, doj, dol,
                               educationid, empid, epfno, esifno, fathername, genderid, mothername, maritalstatusid,
                               panno, spousename, updatedat, updatedby, entryby, designationname, gendername,
                               statusname, educationname, companyname, isactive, isattendance) as
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


drop view view_user;
alter table tbl_user alter column logo type varchar(30) using logo::varchar(30);
create view view_user(id, usertypeid, typename, name,mname,lname, emailid, mobile, dob, logo, isactive, username, password,
                      authisactive, typeisactive) as
SELECT u.id,
       u.usertypeid,
       ut.typename,
       u.fname      AS name,
       u.mname,
       u.lname,
       u.emailid,
       u.mobile,
       u.dob,
       u.logo,
       u.isactive,
       u.username,
       tua.password,
       tua.isactive AS authisactive,
       ut.isactive  AS typeisactive
FROM ((tbl_user u
    JOIN tbl_user_type ut ON ((u.usertypeid = ut.id)))
         JOIN tbl_user_authentication tua ON ((u.id = tua.userid)));

