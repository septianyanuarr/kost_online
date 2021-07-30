<?php
class Admin extends CI_Controller {
            
    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('status')!="login_adm"){
           
        }
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
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->data_kos_adm('where tb_u_ser_kos_t.no_ktp_us=tb_kos_t_onl.no_ktp_us')->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/kos_adm",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }

     public function del_kos_adm($kd){
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
                $this->session->set_flashdata('pes_kos_adm','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Data kos berhasil dihapus.</div>');
                redirect('admin/index');
    }else{
                $this->session->set_flashdata('pes_kos_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data kos gagal dihapus.</div>');
                redirect('admin/index');
    }
}
 public function tambah()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
        "data_us"=>$this->m_kos->data_usr()->result(),
        "kampus"=>$this->m_kos->kampus()->result(),
                    
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/tambah_kos",$data,true)
            );
        $this->load->view("./admin/home",$comp);
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

                $noktp=$_POST['noktp'];
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
                    $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Nama pemilik Belum ada.</div>');
                redirect('admin/tambah');
                }
                if($nmk=="" or $ktk=="" or $psk=="" or $jmk=="" or $hrg=="" or $ket=="" or $kmpt=="" or $alm==""){
                    $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data tidak boleh ada yang kosong.</div>');
                redirect('admin/tambah');
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
               $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('admin/tambah');
            }
        }else{
            $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto utama tidak boleh kosong.</div>');
               redirect('admin/tambah');
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
               $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto pilihan 1.</div>');
               redirect('admin/tambah');
            }
        }else{
            $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto pilihan 1 tidak boleh kosong.</div>');
               redirect('admin/tambah');
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
               $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('admin/tambah');
            }
        }else{
            $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Foto pilihan 2 tidak boleh kosong.</div>');
               redirect('admin/tambah');
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
                    'stt_ks'=>'2',
                    'tgl_pst'=>$tgl
                     );

            $res=$this->m_kos->simpan_kos('tb_kos_t_onl',$data_insert);
            if($res >= 1){

                $this->session->set_flashdata('pes_form_adm','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Kos berhasil didaftarkan.</div>');
                redirect('admin/tambah');
        
            }else{
                $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Kos gagal didaftarkan.</div>');
                redirect('admin/tambah');
                }
            
    }
    public function edit_kos($idk)
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
        "data_us"=>$this->m_kos->data_usr()->result(),
         'e_kos'=>$this->m_kos->kos_usr("where tb_kmps.id_kmp=tb_kos_t_onl.id_kmp and tb_kos_t_onl.kd_kos_t='$idk'")->result(),
         "kampus"=>$this->m_kos->kampus()->result(),
                    
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/edit_kos",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function simp_edit_kos(){

                $noktp=$_POST['noktp'];
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
                    $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Anda belum login,silahkan login terlebih dahulu.</div>');
                redirect('admin/edit_kos'.$kd);
                }
                if($nmk=="" or $ktk=="" or $psk=="" or $jmk=="" or $hrg=="" or $ket=="" or $kmpt=="" or $alm==""){
                    $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Data tidak boleh ada yang kosong.</div>');
                redirect('admin/edit_kos/'.$kd);
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
               $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('admin/edit_kos/'.$kd);
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
               $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto pilihan 1.</div>');
              redirect('admin/edit_kos/'.$kd);
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
               $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Jenis file tidak didukung atau ukuran terlalu besar untuk foto utama.</div>');
               redirect('admin/edit_kos/'.$kd);
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

                      @unlink($path.$ful);//hapus gambar lama difolder.
                      @unlink($path.$f1l);//hapus gambar lama difolder
                      @unlink($path.$f2l);//hapus gambar lama difolder

            $where=array(
                'kd_kos_t'=>$kd);

            $res=$this->m_kos->edit_kos_usr('tb_kos_t_onl',$data_update,$where);
            if($res >= 1){

                $this->session->set_flashdata('pes_form_adm','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Kos berhasil diedit.</div>');
                redirect('admin/edit_kos/'.$kd);
        
            }else{
                $this->session->set_flashdata('pes_form_adm','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Kos gagal diedit.</div>');
               redirect('admin/edit_kos/'.$kd);
                }
            
    }
     public function kos_konfirm()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->data_kos_adm('where tb_u_ser_kos_t.no_ktp_us=tb_kos_t_onl.no_ktp_us and stt_ks < 2')->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/kos_blm_konf",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function pesan()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->pesan_kontak_us()->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_pesan",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function cek_trans()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->cek_trans("where cek='Tidak'")->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/cek_trans",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
    public function data_trans()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->data_trans_adm("where tb_trans_usr_kost.id_psn_ks_us=tb_psn_usr_kost.id_psn_ks_us and tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us and tb_trans_usr_kost.cek='Ok'")->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_trans",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function data_pesanan()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->data_psn_adm("where tb_u_ser_kos_t.no_ktp_us=tb_psn_usr_kost.no_ktp_us")->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_pesanan",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
      public function usr_kos()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->data_usr("where lev_ua='3'")->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_user",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function pem_kos()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->data_usr("where lev_ua='2'")->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_pemilik",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function kontak()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->kontak()->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_kontak",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
      public function rekening()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->rekening()->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_rekening",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function kampus()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->kampus()->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_kampus",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
      public function slider()
    {
     $id=$this->session->userdata('id_adm');

      
      $data=array(
                    
                    "data"=>$this->m_kos->bg_slider()->result()
         );
        $comp=array(
           
            "adm"=>$this->m_kos->profil_adm("where id_ad_min='$id'")->result(),
            "kontak"=>$this->m_kos->kontak()->result(),
            "isi"=>$this->load->view("./admin/data_slider",$data,true)
            );
        $this->load->view("./admin/home",$comp);
    }
     public function konfirm_trans($idt){

     
                    $data_update=array( 
                    'stt_t'=>'Lunas',
                    'cek'=>'Ok'
                     );

            $where=array(
                'no_fak_trans_us'=>$idt);

            $res=$this->m_kos->c_trans('tb_trans_usr_kost',$data_update,$where);
            if($res >= 1){
                      
                $this->session->set_flashdata('pes_c_trans','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Transaksi berhasil dikonfirmasi.</div>');
                redirect('admin/cek_trans');
        
            }else{
                $this->session->set_flashdata('pes_c_trans','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Transaksi gagal dikonfirmasi.</div>');
                redirect('admin/cek_trans');
                }
            
    }
     public function confirm_kos($kdk){

     
                    $data_update=array( 
                    'stt_ks'=>'2'
                     );

            $where=array(
                'kd_kos_t'=>$kdk);

            $res=$this->m_kos->kos_confirm('tb_kos_t_onl',$data_update,$where);
            if($res >= 1){
                      
                $this->session->set_flashdata('pes_c_kos','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Kos berhasil dikonfirmasi.</div>');
                redirect('admin/kos_konfirm');
        
            }else{
                $this->session->set_flashdata('pes_c_kos','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Kos gagal dikonfirmasi.</div>');
                redirect('admin/kos_konfirm');
                }
            
    }



}