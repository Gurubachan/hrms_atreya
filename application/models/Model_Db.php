<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Model_Db extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }
    public function find_table($tblno){
        try{
            $table=array(
                '1'=>'tbl_user_type','2'=>'view_user_type',
                '3'=>'tbl_user','4'=>'view_user',
                '5'=>'tbl_user_authentication','6'=>'view_user_authentication',
                '7'=>'tbl_state','8'=>'view_state',
                '9'=>'tbl_district','10'=>'view_district',
                '11'=>'tbl_company_type','12'=>'view_company_type',
                '13'=>'tbl_company','14'=>'view_company',
                '15'=>'tbl_employee_type','16'=>'view_employee_type',
                '17'=>'tbl_gender','18'=>'view_gender',
                '19'=>'tbl_marital_status','20'=>'view_marital_status',
                '21'=>'tbl_education','22'=>'view_education',
                '23'=>'tbl_department','24'=>'view_department',
                '25'=>'tbl_designation','26'=>'view_designation',
                '27'=>'tbl_department_mapping','28'=>'view_department_mapping',
                '29'=>'tbl_temp_employee','30'=>'view_temp_employee',
                '31'=>'tbl_employee','32'=>'view_employee',
                '33'=>'tbl_bank_name','34'=>'view_bank_name',
                '35'=>'tbl_employee_bank_details','36'=>'view_employee_bank_details',
                '37'=>'tbl_year', '38'=>'view_year',
                '39'=>'tbl_religion','40'=>'view_religion',
                '41'=>'tbl_skill','42'=>'view_skill',
                '43'=>'tbl_experiance_type','44'=>'view_experiance_type',
                '45'=>'tbl_communication_type','46'=>'view_communication_type',
                '47'=>'tbl_job_posting','48'=>'view_job_posting',
                '49'=>'tbl_job_posting_qualification','50'=>'view_job_posting_qualification',
                '51'=>'tbl_job_posting_skill','52'=>'view_job_posting_skill',
                '53'=>'tbl_recruitment_application','54'=>'view_recruitment_application',
                '55'=>'tbl_communication_details','56'=>'view_communication_details',
                '57'=>'tbl_applicant_qualification','58'=>'view_applicant_qualification',
                '59'=>'tbl_applicant_work_experiance','60'=>'view_applicant_work_experiance',
                '61'=>'tbl_attendance_type','62'=>'view_attendance_type',
                '63'=>'tbl_attendance','64'=>'view_attendance',
                '65'=>'tbl_assurance','66'=>'view_assurance',
                '67'=>'tbl_periodtype','68'=>'view_periodtype',
                '69'=>'tbl_resource_type','70'=>'view_resource_type',
                '71'=>'tbl_resource_company','72'=>'view_resource_company',
                '73'=>'tbl_resource','74'=>'view_resource',
                '75'=>'tbl_datemanagement','76'=>'view_datemanagement',
                '77'=>'tbl_datetype','78'=>'view_datetype'
            );
            if($table[$tblno]){
                return $table[$tblno];
            }else{
                return false;
            }
        }catch (Exception $e){
            echo "Message:".$e->getMessage();
        }
    }
    public function select($tblno,$select=null,$where=null,$orderby=null,$groupby=null,$limit=0,$distinct=null,$offset=0){
        try{
            $table=$this->find_table($tblno);
            if($table!=false){
                if($select!=null){
                    $this->db->select($select);
                }
                if($where!=null){
                    $this->db->where($where);
                }
                if($orderby!=null){
                    $this->db->order_by($orderby);
                }
                if($groupby!=null){
                    $this->db->group_by($groupby);
                }
                if($limit>0){
                    $this->db->limit($limit);
                    if($offset>0){
                        $this->db->offset($offset);
                    }
                }
                if($distinct!=null){
                    $this->db->distinct($distinct);
                }
                $response=$this->db->get($table);
                if($response->num_rows()>0){
                    return $response->result();
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch (Exception $e){
            echo "Message:".$e->getMessage();
        }
    }
    /*public function insert($tblno,$data=array())
    {
        try{
            $table=$this->find_table($tblno);
            if($table!=false){
            	if(count($data)==1){
					$this->db->insert($table,$data[0]);
				}else{
					$this->db->insert_batch($table,$data);
				}

                if($this->db->affected_rows()>0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch (Exception $e)
        {
            echo "Message :".$e->getMessage();
        }
    }*/

    public function insert($tblno,$data=array())
    {
        try{
            $this->db->trans_begin();
            $table=$this->find_table($tblno);
            if($table!=false){
                if(count($data)==1){
                    $this->db->insert($table,$data[0]);
                    if($this->db->affected_rows()>0){
                        $id=$this->db->insert_id();
                    }else{
                        $id=false;
                    }
                    if($this->db->trans_status() === FALSE){
                        $this->db->trans_rollback();
                        $id=false;
                    }else{
                        $this->db->trans_commit();
                    }
                    return $id;
                }else{
                    $this->db->insert_batch($table,$data);
                    $res=$this->db->affected_rows();
                    if($this->db->trans_status() === FALSE){
                        $this->db->trans_rollback();
                        $res=0;
                    }else{
                        $this->db->trans_commit();
                    }
                    if($res>0){
                        return true;
                    }else{
                        return false;
                    }
                }
            }else{
                return false;
            }
        }catch (Exception $e)
        {
            echo "Message :".$e->getMessage();
        }
    }
    public function update($tblno,$data=array(),$column_name,$ids,$where=null)
    {
        try{
            $table=$this->find_table($tblno);
            if($table!=false){
                $this->db->set($data[0]);
                if($where!=null){
                    $this->db->where($where);
                }else{
                    $this->db->where_in($column_name,$ids);
                }
                $this->db->update($table);
                if($this->db->affected_rows()>0)
                {
                    if($where!=null){
                        return $this->db->affected_rows();
                    }else{
                        return true;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch (Exception $e)
        {
            echo "Message :".$e->getMessage();
        }
    }
    public function query($query,$type=null){
        try{
            if($query!=""){
                $res=$this->db->query($query);
                if($type!=null){
                    return	$this->db->affected_rows();
                }else{
                    if($res->num_rows()>0){
                        return $res->result();
                    }else{
                        return false;
                    }
                }
            }else{
                return false;
            }
        }catch (Exception $e){
            echo "Message :".$e->getMessage();
        }
    }
}
