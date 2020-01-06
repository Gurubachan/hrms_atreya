alter table tbl_temp_employee add  column  isattendance boolean default false
drop view view_temp_employee;
create or replace view view_temp_employee(id, slno, fname, mname, lname, departmentmappingid, dob, mobile,
    emailid, aadharno, address, createdat, designationid, districtid, districtname, statid, statename, doj, dol, educationid, empid, epfno, esifno, fathername, genderid, mothername, maritalstatusid, panno, spousename, updatedat, updatedby, entryby, designationname, gendername, statusname, educationname,companyname,datename,datetype, isactive,isattendance) as
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
       td.date,
       tdyp.name,
       tte.isactive,
       tte.isattendance
FROM ((((((((((tbl_temp_employee tte
    JOIN tbl_department_mapping tdm ON ((tte.departmentmappingid = tdm.id)))
    JOIN tbl_designation tdg ON ((tte.designationid = tdg.id)))
    JOIN tbl_gender tg ON ((tte.genderid = tg.id)))
    JOIN tbl_marital_status tms ON ((tte.maritalstatusid = tms.id)))
    JOIN tbl_district tdst ON ((tte.districtid = tdst.id)))
    JOIN tbl_education te ON ((tte.educationid = te.id)))
         JOIN tbl_state ts ON ((tdst.stateid = ts.id))))
        JOIN tbl_company tc on ((tdm.companyid = tc.id)))
        JOIN tbl_datemanagement td on ((tte.dateid = td.id)))
        JOIN tbl_datetype tdyp on ((tte.datetypeid = tdyp.id));

create table tbl_datemanagement
(
    id serial primary key,
    date date,
    datetype int not null ,
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby)references tbl_user(id) on Delete restrict on update cascade,
    foreign key (datetype)references tbl_datetype(id) on Delete restrict on update cascade
);
create table tbl_datetype
(
    id serial primary key,
    name varchar(30),
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby)references tbl_user(id) on Delete restrict on update cascade
);
create table tbl_attendance(
    id serial primary key ,
    empid int not null ,
    date date,
    status int,
    intime time,
    outtime time,
    entryby int not null,
    updatedby int,
    updatedat timestamp,
    createdat timestamp default current_timestamp,
    isactive boolean default true,
    foreign key (entryby)references tbl_user(id) on Delete restrict on update cascade
);


