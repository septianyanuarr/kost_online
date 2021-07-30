<?php
class Login extends CI_Controller {
            
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('m_kos');
        
        $this->load->library('upload');
        
    }
   
    public function aksi_login(){

        $username=mysql_real_escape_string($this->input->post('user'));
        $password=md5(mysql_real_escape_string($this->input->post('pas')));

        $where=array(
                'ua_ks_user'=>$username,
                'ua_ks_pas'=>$password
                );

        $cek=$this->m_kos->cek_log_user("tb_u_ser_kos_t",$where);
            if (count($cek->result())==0){
        $cek=$this->m_kos->cek_log_adm("tb_ad_min_kos",$where);
             }
             foreach($cek->result() as $qad)

                {
             $lev=$qad->lev_ua;
                }
             if(count($cek->result()) >0 AND $lev==2){

                $data_session=array(
                'noktp'=>$qad->no_ktp_us,
                'nama'=>$qad->nml_us,
                'ft'=>$qad->ft_us,
                'lev'=>$qad->lev_ua,
                'status'=>"login_usr"
                );
        $this->session->set_userdata($data_session);
        redirect (base_url("user"));
           
             }else if(count($cek->result()) >0 AND $lev==3){

                $data_session=array(
                'noktp'=>$qad->no_ktp_us,
                'nama'=>$qad->nml_us,
                'ft'=>$qad->ft_us,
                 'lev'=>$qad->lev_ua,
                'status'=>"login_usr"
                );

        $this->session->set_userdata($data_session);
        redirect (base_url("user"));

            }else if(count($cek->result()) >0 AND $lev==1){

                $data_session=array(
                'id_adm'=>$qad->id_ad_min,
                'nama'=>$qad->nm_ad_min,
                'ft'=>$qad->ft_adm,
                'status'=>"login_adm"
                );

        $this->session->set_userdata($data_session);
        redirect (base_url("admin"));
           
            }else {
                 $this->session->set_flashdata('gagal_login','<script> alert ("Username atau Password tidak cocok..!!"); </script>');
                redirect (base_url('kos'));
       }
    }

    public function logout(){

        $this->session->sess_destroy();
        redirect (base_url('kos'));
    }

}