create or replace view view_company(id, companytypeid, companyname, companyshortname, establishedon, gstno, address, distid, pincode, url, emailid, mobile, companytypename, companytypeshortname, distname, distshortname, stateid, statename, stateshortname, isactive) as
SELECT c.id,
       c.companytypeid,
       c.companyname,
       c.companyshortname,
       c.establishedon,
       c.gstno,
       c.address,
       c.distid,
       c.pincode,
       c.url,
       c.emailid,
       c.mobile,
       tct.typename      AS companytypename,
       tct.typeshortname AS companytypeshortname,
       td.distname,
       td.distshortname  AS distshortname,
       td.stateid        AS stateid,
       ts.statename,
       ts.stateshortname,
       c.isactive
FROM (((tbl_company c
    JOIN tbl_company_type tct ON ((c.companytypeid = tct.id)))
    JOIN tbl_district td ON ((c.distid = td.id)))
         JOIN tbl_state ts ON ((td.stateid = ts.id)));

create or replace view view_temp_employee(id, slno, fname, mname, lname, departmentmappingid, dob, mobile, emailid, aadharno, address, createdat, designationid, districtid, districtname, statid, statename, doj, dol, educationid, empid, epfno, esifno, fathername, genderid, mothername, maritalstatusid, panno, spousename, updatedat, updatedby, entryby, designationname, gendername, statusname, educationname, isactive) as
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
       tte.isactive
FROM (((((((tbl_temp_employee tte
    JOIN tbl_department_mapping tdm ON ((tte.departmentmappingid = tdm.id)))
    JOIN tbl_designation tdg ON ((tte.designationid = tdg.id)))
    JOIN tbl_gender tg ON ((tte.genderid = tg.id)))
    JOIN tbl_marital_status tms ON ((tte.maritalstatusid = tms.id)))
    JOIN tbl_district tdst ON ((tte.districtid = tdst.id)))
    JOIN tbl_education te ON ((tte.educationid = te.id)))
         JOIN tbl_state ts ON ((tdst.stateid = ts.id)));
