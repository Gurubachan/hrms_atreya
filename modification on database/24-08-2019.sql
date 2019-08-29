create view view_temp_employee
    as select
              tte.id,
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
              td.departmentname,
              tdg.designationname,
              tg.gendername,
              tms.statusname,
              tdst.distname,
              te.educationname,
              tte.isactive
     from(
    tbl_temp_employee tte
    join tbl_department td on (tte.departmentmappingid = td.id)
        join tbl_designation tdg on (tte.designationid = tdg.id)
        join tbl_gender tg on (tte.genderid = tg.id)
            join tbl_marital_status tms on (tte.maritalstatusid = tms.id)
                join tbl_district tdst on (tte.districtid = tdst.id)
                    join tbl_education te on (tte.educationid = te.id)
    );
   create view view_department_mapping as
    select  tdm.id,
            tdm.companyid,
            tc.companyname,
            tdm.departmentid,
            td.departmentname,
            tdm.entryby,
            tdm.createdat,
            tdm.updatedby,
            tdm.updatedat,
            tdm.isactive
           from(
                  tbl_department_mapping tdm
                  join tbl_company tc on tdm.companyid = tc.id
                      join tbl_department td on tdm.departmentid = td.id
                      );
