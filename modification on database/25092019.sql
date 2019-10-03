drop table tbl_applicant_work_experiance;
create table tbl_applicant_work_experiance
(
	id serial primary key ,
	apid int not null ,
	etid smallint not null /* experiance type id*/,
	providedby varchar(30) ,
	startdate date,
	enddate date check ( startdate < enddate :: date ),
	role varchar(20) ,
	remark varchar(255),
	entryby int not null ,
	createdat timestamp default current_timestamp,
	updatedby int,
	updatedat timestamp,
	isactive boolean default true,
	foreign key (entryby) references tbl_user(id) on DELETE restrict on update cascade ,
	foreign key (updatedby) references tbl_user(id) on delete restrict on update cascade,
	foreign key (apid) references tbl_recruitment_application (id) on delete restrict on update cascade
);
alter table tbl_applicant_qualification alter column board type varchar(30) using board::varchar(30);
alter table tbl_applicant_qualification alter column examname type varchar(20) using examname::varchar(20);

create or replace view view_recruitment_application(id, fname, mname, lname, fathername, mothername, spousename, dob, maritalstatusid, statusname, genderid, gendername, religionid, religion, contact, altcontact, whatsapp, email, at, po, ps, pincode, commitid, ctype, stateid, statename, distid, distname, orgname, boad, examname, yop, totalmark, securedmark, exetypeid, exetypename, companyname, doj, dol, role, remark, entryby, createdat, updatedby, updatedat, isactive) as
SELECT tra.id,
       tra.fname,
       tra.mname,
       tra.lname,
       tra.fathername,
       tra.mothername,
       tra.spousename,
       tra.dob,
       tra.maritalstatusid,
       tms.statusname,
       tra.genderid,
       tg.gendername,
       tra.religionid,
       tr.religion,
       tra.contact,
       tra.altcontact,
       tra.whatsapp,
       tra.email,
       tcd.at,
       tcd.po,
       tcd.ps,
       tcd.pincode,
       tcd.commtid     AS commitid,
       tct.type        AS ctype,
       td.stateid,
       ts.statename,
       tcd.dist        AS distid,
       td.distname,
       taq.orgname,
       taq.board       AS boad,
       taq.examname,
       taq.yop,
       taq.totalmark,
       taq.securedmark,
       tawe.etid       AS exetypeid,
       tet.type        AS exetypename,
       tawe.providedby AS companyname,
       tawe.startdate  AS doj,
       tawe.enddate    AS dol,
       tawe.role,
       tawe.remark,
       tra.entryby,
       tra.createdat,
       tra.updatedby,
       tra.updatedat,
       tra.isactive
FROM ((((((((((tbl_recruitment_application tra
    LEFT JOIN tbl_communication_details tcd ON ((tra.id = tcd.apid)))
    LEFT JOIN tbl_applicant_qualification taq ON ((tra.id = taq.apid)))
    LEFT JOIN tbl_applicant_work_experiance tawe ON ((tra.id = tawe.apid)))
    LEFT JOIN tbl_district td ON ((tcd.dist = td.id)))
    LEFT JOIN tbl_state ts ON ((td.stateid = ts.id)))
    LEFT JOIN tbl_marital_status tms ON ((tra.maritalstatusid = tms.id)))
    LEFT JOIN tbl_gender tg ON ((tra.genderid = tg.id)))
    LEFT JOIN tbl_religion tr ON ((tra.religionid = tr.id)))
    LEFT JOIN tbl_communication_type tct ON ((tcd.commtid = tct.id)))
    LEFT JOIN tbl_experiance_type tet ON ((tawe.etid = tet.id)));
