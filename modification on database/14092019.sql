
create view view_job_posting(id,companyid,companyname,postname,designationid,designationname,nov,
    localtion,jobdescriptiom,experiance,responsibility,startdate,enddate,qualificationid,
    educationname,skillid,skill,createdat,updatedby,updatedat,isactive) as
select
jp.id,
       jp.companyid,
       tc.companyname,
       jp.postname,
       jp.designationid,
       td.designationname,
       jp.nov,
       jp.localtion,
       jp.jobdescriptiom,
       jp.experiance,
       jp.responsibility,
       jp.startdate,
       jp.enddate,
       tjpq.qualificationid,
       te.educationname,
       tjps.skillid,
       ts.skill,
       jp.createdat,
       jp.updatedby,
       jp.createdat,
       jp.isactive
from (tbl_job_posting jp join tbl_job_posting_qualification tjpq on jp.id = tjpq.jpid
     join tbl_job_posting_skill tjps on jp.id = tjps.jpid
         join tbl_education te on tjpq.qualificationid = te.id
             join tbl_skill ts on tjps.skillid = ts.id
                 join tbl_designation td on jp.designationid = td.id
                     join tbl_company tc on jp.companyid = tc.id);
