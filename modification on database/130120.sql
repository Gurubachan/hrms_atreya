//hrms user view modification
// added createdat in the view
//created by bijaya

drop view if exists view_user;
create or replace view view_user as
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
       u.createdat,
       tua.password,
       tua.isactive AS authisactive,
       ut.isactive  AS typeisactive
FROM ((tbl_user u
    JOIN tbl_user_type ut ON ((u.usertypeid = ut.id)))
         JOIN tbl_user_authentication tua ON ((u.id = tua.userid)));
