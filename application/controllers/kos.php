<?php
class Kos extends CI_Controller {
            
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
  
    public function index()
    {
        $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->html_konten(),
            "footer"=>$this->html_footer(),

            );
        $this->load->view("index",$comp);
    }
    public function search()
    {
        // get search string
        $search = ($this->input->post("kata_pencarian"))? $this->input->post("kata_pencarian") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("c_kos/search/$search");
        $config['total_rows'] = $this->m_kos->get_kos_count($search);

        $config['per_page'] = "12";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get books list
        $data['booklist'] = $this->m_kos->get_kos($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();
        
         $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->load->view("kos",$data,true),    /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("index",$comp);
    
    }
    public function html_slider()
    {
       
       $idb=$this->uri->segment(3);
         $data['page']="0";
        $config['per_page']='5';
        $data=array(
            "slider"=>$this->m_kos->kos_new_slider($config["per_page"], $data['page'], $idb),

            );
        return $this->load->view('slider',$data,true);

    }
    public function html_konten()
    {
        
        $config['base_url'] = site_url('kos/index');
        $config['total_rows'] = $this->m_kos->get_kos_html_konten_count();
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        // get books list
        $data['booklist'] = $this->m_kos->get_kos_html_konten($config["per_page"], $data['page'], NULL);
        
        $data['pagination'] = $this->pagination->create_links();
        
        // load view
        return $this->load->view('kos',$data,true);
    }
     public function new_kos()
    {
        $config['base_url'] = site_url('kos/new_kos');
        $config['total_rows'] = $this->m_kos->get_kos_html_konten_count();
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        // get books list
        $data['booklist'] = $this->m_kos->kos_new($config["per_page"], $data['page'], NULL);

        
        $data['pagination'] = $this->pagination->create_links();
        
       $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->load->view("kos",$data,true),    /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("index",$comp);
    }
    public function kategori($id)
    {
        $kt=$this->uri->segment(3);

        $config['base_url'] = site_url("kos/kategori/$kt");
        $config['total_rows'] = $this->m_kos->get_kos_kt($kt);

        $config['per_page'] = "12";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get books list
        $data['booklist'] = $this->m_kos->kos_kt($config['per_page'], $data['page'], $kt);

        $data['pagination'] = $this->pagination->create_links();
        
         $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->load->view("kos",$data,true),   /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("index",$comp);
    }

    public function lihat_kos($id)
    {

        $this->m_kos->update_view($id);

        $cek=$this->m_kos->lihat_kos("where kd_kos_t='$id'");
        if($cek->num_rows() > 0 ){
            $data=array(
                        "kost"=>$this->m_kos->lihat_kos("where tb_u_ser_kos_t.no_ktp_us=tb_kos_t_onl.no_ktp_us and tb_kos_t_onl.id_kmp=tb_kmps.id_kmp and tb_kos_t_onl.kd_kos_t='$id'")->result(),
                        );
            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("lihat_kos",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("index",$comp);
        }else{
            show_404();
        }

    }
    public function html_footer()
    {
       
       $idb=$this->uri->segment(3);
            $data['page']="0";
        $config['per_page']='4';
        $comp=array(
            "recent"=>$this->m_kos->kos_new($config["per_page"], $data['page'], $idb),
            "kosl"=>$this->m_kos->kos_l($config["per_page"], $data['page'], $idb),
            "kosp"=>$this->m_kos->kos_p($config["per_page"], $data['page'], $idb),
            "kontak"=>$this->m_kos->kontak()->result(),
            
            );
        return $this->load->view('footer',$comp,true);

    }
  
    public function komentar(){

                $nm=$_POST['nama'];
                $e_m=$_POST['email'];
                $sub=$_POST['sub'];
                $kom=$_POST['komen'];
                date_default_timezone_set("Asia/Jakarta");
                $tgl=date('Y-m-d H:i:s');

                if($nm=="" or $e_m=="" or $sub=="" or $kom==""){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Data tidak boleh ada yang kosong.</div>');
                redirect('kos/kontak');
                }
               
       
                    $data_insert=array(
                    'nm'=>$nm,
                    'em'=>$e_m,
                    'sub'=>$sub,
                    'kom'=>$kom,
                    'tgl'=>$tgl,
                    'id'=>''
                     );

            $res=$this->m_kos->simpan_komen('tb_kmen_usr',$data_insert);
            if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong> Komentar berhasil dikirim.</div>');
                redirect('kos/kontak');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Komentar gagal dikirim.</div>');
                redirect('kos/kontak');
                }
            
    }
     
     public function populer()
    {
        $config['base_url'] = site_url('kos/populer');
        $config['total_rows'] = $this->m_kos->get_kos_html_konten_count();
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        // get books list
        $data['booklist'] = $this->m_kos->kos_pop($config["per_page"], $data['page'], NULL);

        
        $data['pagination'] = $this->pagination->create_links();
        
         $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->load->view("kos",$data,true),   /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("index",$comp);
    }
    public function kontak()
    {
            $data=array(
                        "kontak"=>$this->m_kos->kontak()->result(),
                        );
            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("kontak",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("index",$comp);

    }
    public function daftar()
    {
            $data=array();
            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("daftar",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("index",$comp);

    }
     public function mendaftar(){
                $noktp=$_POST['nktp'];
                $nm=$_POST['nml'];
                $jk=$_POST['jk'];
                $nohp=$_POST['nohp'];
                $alm=$_POST['alm'];
                $user=$_POST['user'];
                $pas=md5($_POST['pas']);
                date_default_timezone_set("Asia/Jakarta");
                $tgl=date('Y-m-d H:i:s');

                if($noktp=="" or $nm=="" or $jk=="" or $nohp=="" or $alm=="" or $user=="" or $pas==""){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Data tidak boleh ada yang kosong.</div>');
                redirect('kos/daftar');
                }
               
       
                    $data_insert=array(
                    'no_ktp_us'=>$noktp,
                    'nml_us'=>$nm,
                    'je_kel_us'=>$jk,
                    'no_hp_us'=>$nohp,
                    'alm_us'=>$alm,
                    'ua_ks_user'=>$user,
                    'ua_ks_pas'=>$pas,
                    'lev_ua'=>'3',
                    'ft_us'=>'',
                    'tgl_daf'=>$tgl
                     );

            $res=$this->m_kos->mendaftar('tb_u_ser_kos_t',$data_insert);
            if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong> Anda Berhasil mendaftar silahkan login dengan username dan password yang anda daftarkan.</div>');
                redirect('kos/daftar');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Anda gagal untuk mendaftar.</div>');
                redirect('kos/daftar');
                }
            
    }
    public function pesan_kos($id){

             $idu=$this->session->userdata('noktp');

               if($idu==""){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Untuk melakukan pemesanan,anda harus login terlebih dahulu.</div>');
                redirect('kos/lihat_kos/'.$id);
                }
            
    }

    

}