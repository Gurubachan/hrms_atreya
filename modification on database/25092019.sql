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

create view view_recruitment_application(id,fname,mname,lname,fathername,
    mothername,spousename,dob,maritalstatusid,statusname,genderid,gendername,
    religionid,religion,contact,altcontact,whatsapp,email,at,po,ps,pincode,commitid,ctype,
    stateid,statename,distid,distname,orgname,boad,examname,yop,totalmark,securedmark,
    exetypeid,exetypename,companyname,doj,dol,role,remark,
    entryby,createdat,updatedby,updatedat,isactive)as
    select tra.id,
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
           tcd.commtid,
           tct.type,
           td.stateid,
           ts.statename,
           tcd.dist,
           td.distname,
           taq.orgname,
           taq.board,
           taq.examname,
           taq.yop,
           taq.totalmark,
           taq.securedmark,
           tawe.etid,
           tet.type,
           tawe.providedby,
           tawe.startdate,
           tawe.enddate,
           tawe.role,
           tawe.remark,
           tra.entryby,
           tra.createdat,
           tra.updatedby,
           tra.updatedat,
           tra.isactive
    from(tbl_recruitment_application tra join tbl_communication_details tcd on tra.id = tcd.apid
        join tbl_applicant_qualification taq on tra.id = taq.apid
            join tbl_applicant_work_experiance tawe on tra.id = tawe.apid
                join tbl_district td on tcd.dist = td.id
                    join tbl_state ts on td.stateid = ts.id
                        join tbl_marital_status tms on tra.maritalstatusid = tms.id
                            join tbl_gender tg on tra.genderid = tg.id
                                join tbl_religion tr on tra.religionid = tr.id
                                    join tbl_communication_type tct on tcd.commtid = tct.id
                                        join tbl_experiance_type tet on tawe.etid = tet.id);
