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

