<?php
class User extends CI_Controller {
            
    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('status')!="login_usr"){
            redirect(base_url("kos"));
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('m_kos');
        $this->load->library('upload');
        $this->batal_pesanan_otomatis();
        
    }
     public function index()
    {
         $id=$this->session->userdata('noktp');
       $comp=array(
        
            "slider"=>$this->html_slider(),
            "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
            "kos"=>$this->html_konten(),
            "footer"=>$this->html_footer(),

            );
        $this->load->view("./user/home",$comp);
    }
    public function search()
    {
        // get search string
        $search = ($this->input->post("kata_pencarian"))? $this->input->post("kata_pencarian") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("user/search/$search");
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

        $id=$this->session->userdata('noktp');

         $comp=array(
            "slider"=>$this->html_slider(),
            "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
            "kos"=>$this->load->view("./user/kos",$data,true),    /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("./user/home",$comp);
    
    }
    public function html_slider()
    {
       
       $idb=$this->uri->segment(3);
         $data['page']="0";
        $config['per_page']='5';
        $data=array(
            "slider"=>$this->m_kos->kos_new_slider($config["per_page"], $data['page'], $idb),
            );
        return $this->load->view('./user/slider',$data,true);

    }
    public function html_konten()
    {
        
        $config['base_url'] = site_url('user/index');
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
        return $this->load->view('./user/kos',$data,true);
    }
     public function new_kos()
    {
        $config['base_url'] = site_url('user/new_kos');
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

         $id=$this->session->userdata('noktp');
        $data['user']=$this->m_kos->profil("where no_ktp_us='$id'")->result();
        
       $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->load->view("./user/kos",$data,true),    /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("./user/home",$comp);
    }
    public function kategori($id)
    {
        $kt=$this->uri->segment(3);

        $config['base_url'] = site_url("user/kategori/$kt");
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

         $id=$this->session->userdata('noktp');
        $data['user']=$this->m_kos->profil("where no_ktp_us='$id'")->result();
        
         $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->load->view("./user/kos",$data,true),   /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("./user/home",$comp);
    }

    public function lihat_kos($id)
    {

        $this->m_kos->update_view($id);

        $idk=$this->session->userdata('noktp');
        

        $cek=$this->m_kos->lihat_kos("where kd_kos_t='$id'");
        if($cek->num_rows() > 0 ){
            $data=array(
                        'user'=>$this->m_kos->profil("where no_ktp_us='$idk'")->result(),
                        "kost"=>$this->m_kos->lihat_kos("where tb_u_ser_kos_t.no_ktp_us=tb_kos_t_onl.no_ktp_us and tb_kos_t_onl.id_kmp=tb_kmps.id_kmp and tb_kos_t_onl.kd_kos_t='$id'")->result(),
                        );
            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/lihat_kos",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);
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
        return $this->load->view('./user/footer',$comp,true);

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
                redirect('user/kontak');
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
                redirect('user/kontak');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Komentar gagal dikirim.</div>');
                redirect('user/kontak');
                }
            
    }
     public function populer()
    {
        $config['base_url'] = site_url('user/populer');
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
        $id=$this->session->userdata('noktp');
        $data['user']=$this->m_kos->profil("where no_ktp_us='$id'")->result();
        
         $comp=array(
            "slider"=>$this->html_slider(),
            "kos"=>$this->load->view("./user/kos",$data,true),   /// html_konten dan yg lainya adalah fungtion html_konten yg dbawah.
            "footer"=>$this->html_footer(),
            );
        $this->load->view("./user/home",$comp);
    }
    public function kontak()

    {
                $idk=$this->session->userdata('noktp');
            $data=array(
                        'user'=>$this->m_kos->profil("where no_ktp_us='$idk'")->result(),
                        "kontak"=>$this->m_kos->kontak()->result(),
                        );
            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/kontak",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);

    }
      public function buka_kos()
    {
            $idk=$this->session->userdata('noktp');
            $data=array(
                        'user'=>$this->m_kos->profil("where no_ktp_us='$idk'")->result(),
                        "kampus"=>$this->m_kos->kampus()->result(),
                        "kontak"=>$this->m_kos->kontak()->result(),
                        );
            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/buka_kos",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);

    }
    public function daftarkan_kos(){

         $ck=$this->m_kos->cari_kd_kos();
            
            if($ck->num_rows()>0){
                foreach($ck->result() as $k){
                    $kd=$k->kdmax+1;
                    
                }
            }else{
                $kd="1";
            }
               $bk=str_pad($kd,6,"0",STR_PAD_LEFT);
                $kdj="KK$bk";

                $noktp=$this->session->userdata('noktp');
                $nmk=$_POST['nmk'];
                $ktk=$_POST['ktk'];
                $psk=$_POST['psk'];
                $jmk=$_POST['jmk'];
                $hrg=$_POST['hrg'];
                $ket=$_POST['ket'];
                $kmpt=$_POST['id_kmp'];
                $alm=$_POST['alm'];

                date_default_timezone_set("Asia/Jakarta");
                $tgl=date('Y-m-d H:i:s');
               if($noktp==""){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Anda belum login,silahkan login terlebih dahulu.</div>');
                redirect('user/buka_kos');
                }
                if($nmk=="" or $ktk=="" or $psk=="" or $jmk=="" or $hrg=="" or $ket=="" or $kmpt=="" or $alm==""){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data tidak boleh ada yang kosong.</div>');
                redirect('user/buka_kos');
                }
                

        if(!empty($_FILES['fu']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/kos_t/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('fu'))
            {
                $uploadData=$this->upload->data();
                $fu=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('user/buka_kos');
            }
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto utama tidak boleh kosong.</div>');
               redirect('user/buka_kos');
        }
        if(!empty($_FILES['f1']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/kos_t/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('f1'))
            {
                $uploadData=$this->upload->data();
                $f1=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto pilihan 1.</div>');
               redirect('user/buka_kos');
            }
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto pilihan 1 tidak boleh kosong.</div>');
               redirect('user/buka_kos');
        }
        if(!empty($_FILES['f2']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/kos_t/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('f2'))
            {
                $uploadData=$this->upload->data();
                $f2=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('user/buka_kos');
            }
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto pilihan 2 tidak boleh kosong.</div>');
               redirect('user/buka_kos');
        }
                    $data_insert=array(
                     'kd_kos_t'=>$kdj,   
                    'no_ktp_us'=>$noktp,
                    'nm_kos_t'=>$nmk,
                    'ktg_r'=>$ktk,
                    'fas_lts'=>$psk,
                    'hrg_ks'=>$hrg,
                    'ket_ks'=>$ket,
                    'alm_ks'=>$alm,
                    'jml_kmr_ks'=>$jmk,
                    'id_kmp'=>$kmpt,
                    'v_kos_t'=>'0',
                    'ft_utm'=>$fu,
                    'ft_p1'=>$f1,
                    'ft_p2'=>$f2,
                    'stt_ks'=>'1',
                    'tgl_pst'=>$tgl
                     );

            $res=$this->m_kos->simpan_kos('tb_kos_t_onl',$data_insert);
            if($res >= 1){
                $this->m_kos->update_user_lev($noktp);

                 $data_session=array(
                'lev'=>'2',
                );
                $this->session->set_userdata($data_session);

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Kos berhasil didaftarkan.</div>');
                redirect('user/buka_kos');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Kos gagal didaftarkan.</div>');
                redirect('user/buka_kos');
                }
            
    }
        
    public function profil()
    {
        $id=$this->session->userdata('noktp');

        $cek=$this->m_kos->profil("where no_ktp_us='$id'");
        if($cek->num_rows() > 0 ){
            $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                        );
            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/profil",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);
        }else{
            show_404();
        }

    }
    public function edit_profil($id){

    $noktp=$_POST['noktp'];   
    $nml=$_POST['nml'];
    $jk=$_POST['jk'];
    $nohp=$_POST['nohp'];
    $alm=$_POST['alm'];
    $user=$_POST['user'];
    $pas=$_POST['pas'];
    $cpas=$_POST['cpas'];
    $ftl=$_POST['ft_lama'];
   


                 if($noktp=='' or $nml=='' or $jk=='' or $alm=='' or $user=='' or $pas==''){
                    $this->session->set_flashdata('pesan','<div class="row"><div class="col-md-11"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data tidak boleh ada yang kosong.</div></div></div>');
                redirect('user/profil');
                }
                if($pas<>$cpas){
                    $this->session->set_flashdata('pesan','<div class="row"><div class="col-md-11"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Konfirmasi password anda tidak cocok atau masih kosong.</div></div></div>');
                redirect('user/profil');
               }
            
                

         if(!empty($_FILES['ftu']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $path='./assets/images/use_r/';
        $config['upload_path'] = $path; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('ftu'))
            {
                $uploadData=$this->upload->data();
                $ftu=$uploadData['file_name'];

            }else{
               $this->session->set_flashdata('pesan','<div class="row"><div class="col-md-11"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> File foto tidak didukung atau ukuran terlalu besar.</div></div></div>');
               redirect('user/profil');
            }

       } else{
            $ftu=$ftl;
            
       }
    $data_update=array(
    'nml_us'=>$nml,
    'je_kel_us'=>$jk,
    'alm_us'=>$alm,
    'no_hp_us'=>$nohp,
    'ua_ks_user'=>$user,
    'ua_ks_pas'=>md5($pas),
    'ft_us'=>$ftu
    );

  

    $where=array(
    'no_ktp_us'=>$noktp);

    $res=$this->m_kos->edit_profil('tb_u_ser_kos_t',$data_update,$where); 
    
     @unlink($path.$ftl);//hapus gambar lama difolder.
   
        if($res >= 1){
        $this->session->set_flashdata('pesan','<div class="row"><div class="col-md-11"><div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Data berhasil diedit.</div></div></div>');
        redirect('user/profil');
        }else{
        $this->session->set_flashdata('pesan','<div class="row"><div class="col-md-11"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data gagal diedit.</div></div></div>');
        redirect('user/profil');
        }
   
}
  public function data_pesanan()
    {
        $id=$this->session->userdata('noktp');

        $cek=$this->m_kos->profil("where no_ktp_us='$id'");
        if($cek->num_rows() > 0 ){
            $pes=array(
                "pesanan"=>$this->m_kos->data_pesanan("where tb_kos_t_onl.kd_kos_t=tb_psn_usr_kost.kd_kos_t and tb_psn_usr_kost.no_ktp_us='$id'")->result(),
                "transaksi"=>$this->m_kos->data_transaksi("where tb_kos_t_onl.kd_kos_t=tb_psn_usr_kost.kd_kos_t and tb_psn_usr_kost.no_ktp_us='$id' and tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us")->result()
                );

            $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                        "j_trans"=>$this->m_kos->j_trans("where tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us and tb_psn_usr_kost.no_ktp_us='$id'"),
                        "j_pesanan"=>$this->m_kos->j_pesanan("where no_ktp_us='$id'"),
                        "dt_psn"=>$this->load->view("./user/pesanan",$pes,true),
                        "dt_trans"=>$this->load->view("./user/transaksi",$pes,true),
                        );

            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/data_pesanan",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);
        }else{
            show_404();
        }

    }
   
    public function pesan_kos($id){

         $ck=$this->m_kos->cari_kd_pesann();
            
            if($ck->num_rows()>0){
                foreach($ck->result() as $k){
                    $kd=$k->kdmax+1;
                    
                }
            }else{
                $kd="1";
            }
                $bk=str_pad($kd,6,"0",STR_PAD_LEFT);
                $kdj="PS$bk";
            
                $idu=$this->session->userdata('noktp');

                date_default_timezone_set("Asia/Jakarta");
                $tglp=date('Y-m-d H:i:s');
                $thn=substr($tglp,0,4);
                $bln=substr($tglp,5,2);
                $tgle=substr($tglp,8,2);
                $tglh=$tgle+7;
                $time=substr($tglp,11,8);
                $tgla=$thn."-".$bln."-".$tglh." ".$time;

                $cek_jk=$this->m_kos->data_usr("where no_ktp_us='$idu'")->result();
                foreach($cek_jk as $cj){
                    $jku=$cj->je_kel_us;
                }
                $cek_kt=$this->m_kos->kos_tampil("where kd_kos_t='$id'");
                 foreach($cek_kt as $ck){
                    $ktg=$ck->ktg_r;
                }

               if($jku<>$ktg){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Maaf kos ini hanya untuk '.$ktg.'</div>');
                redirect('user/lihat_kos/'.$id);
               }

               $cek_pesanan=$this->m_kos->cek_pesann("where no_ktp_us='$idu' and stt='Belum Konfirmasi'");
               if($cek_pesanan->num_rows()>0){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Anda memiliki pesanan yang belum dikonfirmasi silahkan selesaikan / batalkan terlebih dahulu.</div>');
                redirect('user/lihat_kos/'.$id);
               }

               if($idu==""){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Untuk melakukan pemesanan,anda harus login terlebih dahulu.</div>');
                redirect('user/lihat_kos/'.$id);
                }
        
                    $data_insert=array(
                     'id_psn_ks_us'=>$kdj,   
                    'no_ktp_us'=>$idu,
                    'kd_kos_t'=>$id,
                    'metod_pemb'=>'',
                    'tgl_psn'=>$tglp,
                    'tgl_akhr'=>$tgla,
                    'stt'=>"Belum Konfirmasi"
                     );

            $res=$this->m_kos->pesan_kos('tb_psn_usr_kost',$data_insert);
            if($res >= 1){

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Anda berhasil memesan kos,silahkan periksa dimenu pesanan untuk konfimasi lebih lanjut.</div>');
                redirect('user/lihat_kos/'.$id);
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Anda gagal memesan kos.</div>');
                redirect('user/lihat_kos/'.$id);
                }
            
    }
    public function batal_pesanan($id){
    $where=array('id_psn_ks_us'=>$id);
    $res = $data= $this->m_kos->batal_psn('tb_psn_usr_kost',$where);
    if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Pesanan anda sudah dibatalkan.</div>');
                redirect('user/data_pesanan');
    }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Pesanan anda gagal dibatalkan.</div>');
                redirect('user/data_pesanan');
    }
}
public function batal_pesanan_otomatis(){

        date_default_timezone_set("Asia/Jakarta");
    $jtgl=6;
    $res = $data= $this->m_kos->batal_psn('tb_psn_usr_kost','datediff(curdate(),tgl_psn) >'.$jtgl.' and stt="Belum Konfirmasi"');
    
}
 public function konfirmasi($idp)
    {
        $id=$this->session->userdata('noktp');

    $cek_ps=$this->m_kos->cek_pesann("where id_psn_ks_us='$idp'")->result();
                foreach($cek_ps as $cps){
                  }
                  if($cps->metod_pemb=="1"){

                    $pes=array(
                "transaksi"=>$this->m_kos->data_transaksi("where tb_kos_t_onl.kd_kos_t=tb_psn_usr_kost.kd_kos_t and tb_psn_usr_kost.no_ktp_us='$id' and tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us")->result()
                );
             
                 $konf=array( 
                'psn'=>$this->m_kos->cek_pesann("where id_psn_ks_us='$idp'")->result(),
                 'metod'=>$this->m_kos->cek_pesann("where id_psn_ks_us='$idp'")->result(),
                 'rek'=>$this->m_kos->rek()->result(),
                 'dtpem'=>$this->m_kos->nohp_pem("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us=tb_u_ser_kos_t.no_ktp_us and tb_psn_usr_kost.id_psn_ks_us='$idp'")->result(),
                 );   
              
          

                       $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                         "j_trans"=>$this->m_kos->j_trans("where tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us and tb_psn_usr_kost.no_ktp_us='$id'"),
                        "j_pesanan"=>$this->m_kos->j_pesanan("where no_ktp_us='$id'"),
                        "dt_psn"=>$this->load->view("./user/konfirmasi_lanjut",$konf,true),
                         "dt_trans"=>$this->load->view("./user/transaksi",$pes,true),
                        );
                  }else{

        $cek=$this->m_kos->profil("where no_ktp_us='$id'");
       
             $pes=array(
                "transaksi"=>$this->m_kos->data_transaksi("where tb_kos_t_onl.kd_kos_t=tb_psn_usr_kost.kd_kos_t and tb_psn_usr_kost.no_ktp_us='$id' and tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us")->result()
                );
            $konf=array(
                'psn'=>$this->m_kos->cek_pesann("where id_psn_ks_us='$idp'")->result()
                );

            $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                         "j_trans"=>$this->m_kos->j_trans("where tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us and tb_psn_usr_kost.no_ktp_us='$id'"),
                        "j_pesanan"=>$this->m_kos->j_pesanan("where no_ktp_us='$id'"),
                        "dt_psn"=>$this->load->view("./user/konfirmasi",$konf,true),
                         "dt_trans"=>$this->load->view("./user/transaksi",$pes,true),
                        );
        }

            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/data_pesanan",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);
       

    }

     public function kelola_kos()
    {
        $id=$this->session->userdata('noktp');

        $cek=$this->m_kos->profil("where no_ktp_us='$id'");
        if($cek->num_rows() > 0 ){
            $ks_us=array(
                'booklist'=>$this->m_kos->kos_usr("where tb_kmps.id_kmp=tb_kos_t_onl.id_kmp and tb_kos_t_onl.no_ktp_us='$id'")->result(),
               
                );
            $ps_us=array(
                 'pesan'=>$this->m_kos->psn_ks_usr("where tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'")->result(),
                );
             $tr_us=array(
                 'trans'=>$this->m_kos->tran_ks_usr("where tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us and tb_kos_t_onl.no_ktp_us='$id'")->result(),
                );

            $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                        "data"=>$this->load->view("./user/kos_usr",$ks_us,true),
                        'j_psn_ks'=>$this->m_kos->j_pesanan_kos("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'"),
                        'j_tran_ks'=>$this->m_kos->j_trans_kos("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_trans_usr_kost.id_psn_ks_us=tb_psn_usr_kost.id_psn_ks_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'"),
                        "pesan"=>$this->load->view("./user/pesanan_usr",$ps_us,true),
                        "trans"=>$this->load->view("./user/transaksi_usr",$tr_us,true)
                        );

            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/data_kos",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);
        }else{
            show_404();
        }

    }
   
    public function del_kos_us($kd){
            $where=array('kd_kos_t'=>$kd);

    $path='./assets/images/kos_t/';
    $row=$this->m_kos->kos_tampil("where kd_kos_t='$kd'");
       
      

$res = $data= $this->m_kos->del_kos_us('tb_kos_t_onl',$where);
 foreach($row as $dt){

    @unlink($path.$dt->ft_utm);//hapus gambar difolder.
    @unlink($path.$dt->ft_p1);//hapus gambar difolder.
    @unlink($path.$dt->ft_p2);//hapus gambar difolder.
}
    if($res >= 1){
                $this->session->set_flashdata('pes_dt_us','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Data kos berhasil dihapus.</div>');
                redirect('user/kelola_kos');
    }else{
                $this->session->set_flashdata('pes_dt_us','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data kos gagal dihapus.</div>');
                redirect('user/kelola_kos');
    }
}
 public function tambah_kos()
    {
        $id=$this->session->userdata('noktp');

        $cek=$this->m_kos->profil("where no_ktp_us='$id'");
        if($cek->num_rows() > 0 ){
            $ks_us=array(
                
                "kampus"=>$this->m_kos->kampus()->result(),
               
                );
            $ps_us=array(
                 'pesan'=>$this->m_kos->psn_ks_usr("where tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'")->result(),
                );
             $tr_us=array(
                 'trans'=>$this->m_kos->tran_ks_usr("where tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us and tb_kos_t_onl.no_ktp_us='$id'")->result(),
                );

            $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                        "data"=>$this->load->view("./user/tambah_kos",$ks_us,true),
                        'j_psn_ks'=>$this->m_kos->j_pesanan_kos("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'"),
                        'j_tran_ks'=>$this->m_kos->j_trans_kos("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_trans_usr_kost.id_psn_ks_us=tb_psn_usr_kost.id_psn_ks_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'"),
                        "pesan"=>$this->load->view("./user/pesanan_usr",$ps_us,true),
                        "trans"=>$this->load->view("./user/transaksi_usr",$tr_us,true)
                        );

            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/data_kos",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);
        }else{
            show_404();
        }

    }
      public function simpan_kos(){

             $ck=$this->m_kos->cari_kd_kos();
            
            if($ck->num_rows()>0){
                foreach($ck->result() as $k){
                    $kd=$k->kdmax+1;
                    
                }
            }else{
                $kd="1";
            }
               $bk=str_pad($kd,6,"0",STR_PAD_LEFT);
                $kdj="KK$bk";

                $noktp=$this->session->userdata('noktp');
                $nmk=$_POST['nmk'];
                $ktk=$_POST['ktk'];
                $psk=$_POST['psk'];
                $jmk=$_POST['jmk'];
                $hrg=$_POST['hrg'];
                $ket=$_POST['ket'];
                $kmpt=$_POST['id_kmp'];
                $alm=$_POST['alm'];

                date_default_timezone_set("Asia/Jakarta");
                $tgl=date('Y-m-d H:i:s');
               if($noktp==""){
                    $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Anda belum login,silahkan login terlebih dahulu.</div></div>');
                redirect('user/tambah_kos');
                }
                if($nmk=="" or $ktk=="" or $psk=="" or $jmk=="" or $hrg=="" or $ket=="" or $kmpt=="" or $alm==""){
                    $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data tidak boleh ada yang kosong.</div></div>');
                redirect('user/tambah_kos');
                }
                

        if(!empty($_FILES['fu']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/kos_t/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('fu'))
            {
                $uploadData=$this->upload->data();
                $fu=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div></div>');
               redirect('user/tambah_kos');
            }
        }else{
            $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto utama tidak boleh kosong.</div></div>');
               redirect('user/tambah_kos');
        }
        if(!empty($_FILES['f1']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/kos_t/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('f1'))
            {
                $uploadData=$this->upload->data();
                $f1=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto pilihan 1.</div></div>');
               redirect('user/tambah_kos');
            }
        }else{
            $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto pilihan 1 tidak boleh kosong.</div></div>');
               redirect('user/tambah_kos');
        }
        if(!empty($_FILES['f2']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/kos_t/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('f2'))
            {
                $uploadData=$this->upload->data();
                $f2=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div></div>');
               redirect('user/tambah_kos');
            }
        }else{
            $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto pilihan 2 tidak boleh kosong.</div></div>');
               redirect('user/tambah_kos');
        }
                    $data_insert=array(
                     'kd_kos_t'=>$kdj,   
                    'no_ktp_us'=>$noktp,
                    'nm_kos_t'=>$nmk,
                    'ktg_r'=>$ktk,
                    'fas_lts'=>$psk,
                    'hrg_ks'=>$hrg,
                    'ket_ks'=>$ket,
                    'alm_ks'=>$alm,
                    'jml_kmr_ks'=>$jmk,
                    'id_kmp'=>$kmpt,
                    'v_kos_t'=>'0',
                    'ft_utm'=>$fu,
                    'ft_p1'=>$f1,
                    'ft_p2'=>$f2,
                    'stt_ks'=>'1',
                    'tgl_pst'=>$tgl
                     );

            $res=$this->m_kos->simpan_kos('tb_kos_t_onl',$data_insert);
            if($res >= 1){
                $this->m_kos->update_user_lev($noktp);

                 $data_session=array(
                'lev'=>'2',
                );
                $this->session->set_userdata($data_session);

                $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Kos berhasil didaftarkan.</div></div>');
                redirect('user/tambah_kos');
        
            }else{
                $this->session->set_flashdata('pes_dt_us','<div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Kos gagal didaftarkan.</div></div>');
                redirect('user/tambah_kos');
                }
            
    }
    public function edit_kos($idk)
    {
        $id=$this->session->userdata('noktp');

        $cek=$this->m_kos->profil("where no_ktp_us='$id'");
        if($cek->num_rows() > 0 ){
            $ks_us=array(
                'e_kos'=>$this->m_kos->kos_usr("where tb_kmps.id_kmp=tb_kos_t_onl.id_kmp and tb_kos_t_onl.kd_kos_t='$idk'")->result(),
                "kampus"=>$this->m_kos->kampus()->result()
               
                );
            $ps_us=array(
                 'pesan'=>$this->m_kos->psn_ks_usr("where tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'")->result(),
                );
             $tr_us=array(
                 'trans'=>$this->m_kos->tran_ks_usr("where tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us and tb_kos_t_onl.no_ktp_us='$id'")->result(),
                );

            $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                        "data"=>$this->load->view("./user/edit_kos",$ks_us,true),
                        'j_psn_ks'=>$this->m_kos->j_pesanan_kos("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'"),
                        'j_tran_ks'=>$this->m_kos->j_trans_kos("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_trans_usr_kost.id_psn_ks_us=tb_psn_usr_kost.id_psn_ks_us and tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us='$id'"),
                        "pesan"=>$this->load->view("./user/pesanan_usr",$ps_us,true),
                        "trans"=>$this->load->view("./user/transaksi_usr",$tr_us,true)
                        );

            $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/data_kos",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);
        }else{
            show_404();
        }
}
   public function simp_edit_kos(){

                $noktp=$this->session->userdata('noktp');
                $kd=$_POST['kd'];
                $nmk=$_POST['nmk'];
                $ktk=$_POST['ktk'];
                $psk=$_POST['psk'];
                $jmk=$_POST['jmk'];
                $hrg=$_POST['hrg'];
                $ket=$_POST['ket'];
                $kmpt=$_POST['id_kmp'];
                $alm=$_POST['alm'];
                $ful=$_POST['ful'];
                $f1l=$_POST['f1l'];
                $f2l=$_POST['f2l'];

                date_default_timezone_set("Asia/Jakarta");
                $tgl=date('Y-m-d H:i:s');
               if($noktp==""){
                    $this->session->set_flashdata('pes_dt_us','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Anda belum login,silahkan login terlebih dahulu.</div>');
                redirect('user/edit_kos/'.$kd);
                }
                if($nmk=="" or $ktk=="" or $psk=="" or $jmk=="" or $hrg=="" or $ket=="" or $kmpt=="" or $alm==""){
                    $this->session->set_flashdata('pes_dt_us','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data tidak boleh ada yang kosong.</div>');
                redirect('user/edit_kos/'.$kd);
                }
                

        if(!empty($_FILES['fu']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $path='./assets/images/kos_t/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('fu'))
            {
                $uploadData=$this->upload->data();
                $fu=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pes_dt_us','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('user/edit_kos/'.$kd);
            }
        }else{
            $fu=$ful;
        }
        if(!empty($_FILES['f1']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $path='./assets/images/kos_t/';
        $config['upload_path'] = $path;//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('f1'))
            {
                $uploadData=$this->upload->data();
                $f1=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pes_dt_us','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto pilihan 1.</div>');
               redirect('user/edit_kos/'.$kd);
            }
        }else{
           $f1=$f1l;
        }
        if(!empty($_FILES['f2']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $path='./assets/images/kos_t/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('f2'))
            {
                $uploadData=$this->upload->data();
                $f2=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('pes_dt_us','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('user/edit_kos/'.$kd);
            }
        }else{
            $f2=$f2l;
        }
                    $data_update=array( 
                    'no_ktp_us'=>$noktp,
                    'nm_kos_t'=>$nmk,
                    'ktg_r'=>$ktk,
                    'fas_lts'=>$psk,
                    'hrg_ks'=>$hrg,
                    'ket_ks'=>$ket,
                    'alm_ks'=>$alm,
                    'jml_kmr_ks'=>$jmk,
                    'id_kmp'=>$kmpt,
                    'ft_utm'=>$fu,
                    'ft_p1'=>$f1,
                    'ft_p2'=>$f2,
                    'tgl_pst'=>$tgl
                     );

                    

            $where=array(
                'kd_kos_t'=>$kd);

            $res=$this->m_kos->edit_kos_usr('tb_kos_t_onl',$data_update,$where);
            if($res >= 1){
                        @unlink($path.$ful);//hapus gambar lama difolder.
                      @unlink($path.$f1l);//hapus gambar lama difolder
                      @unlink($path.$f2l);//hapus gambar lama difolder

                $this->session->set_flashdata('pes_dt_us','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Kos berhasil diedit.</div>');
                redirect('user/edit_kos/'.$kd);
        
            }else{
                $this->session->set_flashdata('pes_dt_us','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Kos gagal diedit.</div>');
                redirect('user/edit_kos/'.$kd);
                }
            
    }
    public function metode_pembayaran(){

         $id=$this->session->userdata('noktp');

            $mtp=$_POST['mtp'];
            $idp=$_POST['idp'];

            $data_update=array('metod_pemb' => $mtp);
            $where=array(
                'id_psn_ks_us'=>$idp);

            $res=$this->m_kos->metod_pemb('tb_psn_usr_kost',$data_update,$where);
            if($res >= 1){
                 $pes=array(
                "transaksi"=>$this->m_kos->data_transaksi("where tb_kos_t_onl.kd_kos_t=tb_psn_usr_kost.kd_kos_t and tb_psn_usr_kost.no_ktp_us='$id' and tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us")->result()
                );
             
                 $konf=array( 
                'psn'=>$this->m_kos->cek_pesann("where id_psn_ks_us='$idp'")->result(),
                 'metod'=>$this->m_kos->cek_pesann("where id_psn_ks_us='$idp'")->result(),
                 'rek'=>$this->m_kos->rek()->result(),
                 'dtpem'=>$this->m_kos->nohp_pem("where tb_psn_usr_kost.kd_kos_t=tb_kos_t_onl.kd_kos_t and tb_kos_t_onl.no_ktp_us=tb_u_ser_kos_t.no_ktp_us and tb_psn_usr_kost.id_psn_ks_us='$idp'")->result(),
                 );   
              
          

                       $data=array(
                        "user"=>$this->m_kos->profil("where no_ktp_us='$id'")->result(),
                         "j_trans"=>$this->m_kos->j_trans("where tb_psn_usr_kost.id_psn_ks_us=tb_trans_usr_kost.id_psn_ks_us and tb_psn_usr_kost.no_ktp_us='$id'"),
                        "j_pesanan"=>$this->m_kos->j_pesanan("where no_ktp_us='$id'"),
                        "dt_psn"=>$this->load->view("./user/konfirmasi_lanjut",$konf,true),
                         "dt_trans"=>$this->load->view("./user/transaksi",$pes,true),
                        );

                 $comp=array(
                        "slider"=>"",
                        "kos"=>$this->load->view("./user/data_pesanan",$data,true),
                        "footer"=>$this->html_footer(),
                        );
                    
                    $this->load->view("./user/home",$comp);

        
            }else{
                $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Terjadi kesalahan saat konfirmasi.</div></div></div>');
                redirect('user/Konfirmasi/'.$id);
                }
    }
        public function trans_cod(){

         $ck=$this->m_kos->cari_kd_trans();
            
            if($ck->num_rows()>0){
                foreach($ck->result() as $k){
                    $kd=$k->kdmax+1;
                    
                }
            }else{
                $kd="1";
            }
                $bk=str_pad($kd,6,"0",STR_PAD_LEFT);
                $kdj="KA_NF$bk";

                $id=$_POST['idp'];
            
                $idu=$this->session->userdata('noktp');

                date_default_timezone_set("Asia/Jakarta");
                $tglp=date('Y-m-d H:i:s');
                $thn=substr($tglp,0,4);
                $bln=substr($tglp,5,2);
                $tgle=substr($tglp,8,2);
                $tglh=$tgle+7;
                $time=substr($tglp,11,8);
                $tgla=$thn."-".$bln."-".$tglh." ".$time;


               if($idu==""){
                    $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Untuk melakukan menyelesaikan transaksi,anda harus login terlebih dahulu.</div></div></div>');
                redirect('user/konfirmasi/'.$id);
                }
                if($id==""){
                    $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Terjadi kesalahan kami tidak menemukan pesanan anda.</div></div></div>');
                redirect('user/konfirmasi/'.$id);
                }
        
                    $data_insert=array(
                     'no_fak_trans_us'=>$kdj,   
                    'id_psn_ks_us'=>$id,
                    'no_rek'=>'',
                    'bkti'=>'',
                    'tot_bay'=>'0',
                    'stt_t'=>"Belum Lunas",
                    'cek'=>"Ok",
                    'tgl_trans_us'=>$tglp
                     );

            $res=$this->m_kos->trans_kos('tb_trans_usr_kost',$data_insert);
            if($res >= 1){

                $data_update=array('stt' => 'Konfirmasi');
            $where=array(
                'id_psn_ks_us'=>$id);

            $res=$this->m_kos->metod_pemb('tb_psn_usr_kost',$data_update,$where);

                $this->session->set_flashdata('pesan_pesanan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Konfirmasi anda sudah selesai silahkan temui pemilik kos dengan membawa bukti pemesanan dari kami.</div>');
                redirect('user/data_pesanan');
        
            }else{
                $this->session->set_flashdata('pesan_pesanan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Terjadi kesalahan saat mengkonfirmasi pesanan,coba lagi nanti.</div>');
                 redirect('user/data_pesanan');
                }
            
    }
      public function trans_bank(){

         $ck=$this->m_kos->cari_kd_trans();
            
            if($ck->num_rows()>0){
                foreach($ck->result() as $k){
                    $kd=$k->kdmax+1;
                    
                }
            }else{
                $kd="1";
            }
                $bk=str_pad($kd,6,"0",STR_PAD_LEFT);
                $kdj="KA_NF$bk";

                $id=$_POST['idp'];
                $mtp=$_POST['mtp'];
                $tot=$_POST['totbay'];
                $rek=$_POST['norek'];
            
                $idu=$this->session->userdata('noktp');

                date_default_timezone_set("Asia/Jakarta");
                $tglp=date('Y-m-d H:i:s');
                $thn=substr($tglp,0,4);
                $bln=substr($tglp,5,2);
                $tgle=substr($tglp,8,2);
                $tglh=$tgle+7;
                $time=substr($tglp,11,8);
                $tgla=$thn."-".$bln."-".$tglh." ".$time;


               if($idu==""){
                    $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Untuk melakukan menyelesaikan transaksi,anda harus login terlebih dahulu.</div></div></div>');
              redirect('user/konfirmasi/'.$id);
                }
                if($id==""){
                    $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Terjadi kesalahan kami tidak menemukan pesanan anda.</div></div></div>');
               redirect('user/konfirmasi/'.$id);
                }
                 if($tot=="" or $rek==""){
                    $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data konfirmasi tidak boleh ada yang kosong.</div></div></div>');
                redirect('user/konfirmasi/'.$id);
                }


        if(!empty($_FILES['buktrans']['name']))
        {
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/bukti_trans/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2Mb
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimum 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

             $this->upload->initialize($config);
        
            if ($this->upload->do_upload('buktrans'))
            {
                $uploadData=$this->upload->data();
                $bt=$uploadData['file_name'];
            }else{
               $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk bukti transaksi.</div></div></div>');
               redirect('user/konfirmasi/'.$id);
            }
        }else{
            $this->session->set_flashdata('psn_konfr','<div class="row"><div class="col-md-9"><div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Bukti transfer tidak boleh kosong.</div></div></div>');
               redirect('user/konfirmasi/'.$id);
        }
        
                    $data_insert=array(
                     'no_fak_trans_us'=>$kdj,   
                    'id_psn_ks_us'=>$id,
                    'no_rek'=>$rek,
                    'bkti'=>$bt,
                    'tot_bay'=>$tot,
                    'stt_t'=>"",
                    'cek'=>'Tidak',
                    'tgl_trans_us'=>$tglp
                     );

            $res=$this->m_kos->trans_kos('tb_trans_usr_kost',$data_insert);
            if($res >= 1){

                $data_update=array('stt' => 'Konfirmasi');
            $where=array(
                'id_psn_ks_us'=>$id);

            $res=$this->m_kos->metod_pemb('tb_psn_usr_kost',$data_update,$where);

                $this->session->set_flashdata('pesan_pesanan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Konfirmasi anda sudah selesai silahkan tunggu bebarapa menit,untuk bisa mencetak bukti pemesanan.</div>');
                redirect('user/data_pesanan');
        
            }else{
                $this->session->set_flashdata('pesan_pesanan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Terjadi kesalahan saat mengkonfirmasi pesanan,coba lagi nanti.</div>');
                 redirect('user/data_pesanan');
                }
            
    }
}