<?php
class M_kos extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function kos_pop($limit, $start, $st = NULL){
        if ($st == "NIL") $st = "";
     $sql = "select * from tb_kos_t_onl where stt_ks='2' and kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) ORDER BY v_kos_t DESC limit " . $start . ", " . $limit;
     $query = $this->db->query($sql);
    return $query->result();
    }
    public function kos_new_slider($limit, $start, $st = NULL){
        if ($st == "NIL") $st = "";
     $sql = "select * from tb_kos_t_onl,tb_slider where kd_kos_t<>'$st' and stt_ks='2' and kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) ORDER BY tgl_pst DESC limit " . $start . ", " . $limit;
     $query = $this->db->query($sql);
    return $query->result();
    }

    public function kos_new($limit, $start, $st = NULL){
        if ($st == "NIL") $st = "";
     $sql = "select * from tb_kos_t_onl where kd_kos_t<>'$st' and stt_ks='2' and kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) ORDER BY tgl_pst DESC limit " . $start . ", " . $limit;
     $query = $this->db->query($sql);
    return $query->result();
    }

    public function kos_kt($limit, $start, $st = NULL){
        if ($st == "NIL") $st = "";
     $sql = "select * from tb_kos_t_onl where ktg_r='$st' and stt_ks='2' and kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) limit " . $start . ", " . $limit;
     $query = $this->db->query($sql);
    return $query->result();
    }
     public function kos_l($limit, $start, $st = NULL){
        if ($st == "NIL") $st = "";
     $sql = "select * from tb_kos_t_onl where ktg_r='Pria' and kd_kos_t<>'$st' and stt_ks='2' and kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) limit " . $start . ", " . $limit;
     $query = $this->db->query($sql);
    return $query->result();
    }
    public function kos_p($limit, $start, $st = NULL){
        if ($st == "NIL") $st = "";
     $sql = "select * from tb_kos_t_onl where ktg_r='Wanita' and kd_kos_t<>'$st' and stt_ks='2' and kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) limit " . $start . ", " . $limit;
     $query = $this->db->query($sql);
    return $query->result();
    }
///////////////////////////////////////////////////////coding untuk menampilkan , pagination & pecarian //////////////////////////
    function get_kos($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select tb_kmps.nm_kmps,tb_kos_t_onl. * from tb_kos_t_onl,tb_kmps where nm_kos_t like '%$st%' or alm_ks like '%$st%' or nm_kmps like '%$st%' and tb_kos_t_onl.id_kmp=tb_kmps.id_kmp and tb_kos_t_onl.stt_ks='2' and tb_kos_t_onl.kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
      function get_kos_html_konten($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tb_kos_t_onl where tb_kos_t_onl.kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) and tb_kos_t_onl.stt_ks='2' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
       function get_kos_html_konten_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tb_kos_t_onl where tb_kos_t_onl.kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) and tb_kos_t_onl.stt_ks='2'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    function get_kos_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select tb_kmps.nm_kmps,tb_kos_t_onl. * from tb_kos_t_onl,tb_kmps where tb_kos_t_onl.nm_kos_t like '%$st%' or tb_kos_t_onl.alm_ks like '%$st%' or tb_kmps.nm_kmps like '%$st%' and tb_kos_t_onl.id_kmp=tb_kmps.id_kmp and tb_kos_t_onl.stt_ks='2' and tb_kos_t_onl.kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) ";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
     function get_kos_kt($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tb_kos_t_onl where ktg_r='$st' and kd_kos_t NOT IN(select kd_kos_t from tb_psn_usr_kost) ";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function lihat_kos($where=""){
    $data= $this->db->query('select tb_kmps.nm_kmps,tb_u_ser_kos_t.nml_us,tb_u_ser_kos_t.no_hp_us,tb_kos_t_onl. * from tb_kos_t_onl,tb_kmps,tb_u_ser_kos_t '.$where);
    return $data;
    }
    public function kontak($where=""){
    $data= $this->db->query('select * from tb_kon_ta_k '.$where);
    return $data;
    }
     public function rekening($where=""){
    $data= $this->db->query('select * from tb_rek_ks_awk '.$where);
    return $data;
    }
    public function kampus($where=""){
    $data= $this->db->query('select * from tb_kmps '.$where);
    return $data;
    }
  
    public function update_view($id){

    $this->db->set('v_kos_t','v_kos_t+1',False);
    $this->db->where('kd_kos_t',$id);
    $this->db->update('tb_kos_t_onl');
    
    }
     public function update_user_lev($id){

    $this->db->set('lev_ua','2',False);
    $this->db->where('no_ktp_us',$id);
    $this->db->update('tb_u_ser_kos_t');
    
    }
    public function data_kos_adm($where=""){
    $data= $this->db->query('select tb_u_ser_kos_t.nml_us,tb_kos_t_onl. * from tb_kos_t_onl,tb_u_ser_kos_t '.$where);
    return $data;
    }

    public function cek_log_user($table ,$where ){
    return $this->db->get_where($table ,$where );
    }
    public function cek_log_adm($table ,$where ){
    return $this->db->get_where($table ,$where );
    }
     public function cek_kos_usr($table ,$where ){
    return $this->db->get_where($table ,$where );
    }
     public function simpan_komen($tabelName,$data){
    $res = $data = $this->db->insert($tabelName,$data);
    return $res;
    }
     public function mendaftar($tabelName,$data){
    $res = $data = $this->db->insert($tabelName,$data);
    return $res;
    }
    public function simpan_kos($tabelName,$data){
    $res = $data = $this->db->insert($tabelName,$data);
    return $res;
    }
    public function profil($where=""){
    $data= $this->db->query('select * from tb_u_ser_kos_t '.$where);
    return $data;
    }
     public function profil_adm($where=""){
    $data= $this->db->query('select * from tb_ad_min_kos '.$where);
    return $data;
    }
    public function edit_profil($tabelName,$data,$where){
    $res = $data = $this->db->update($tabelName,$data,$where);
    return $res;
    }
    public function pesan_kos($tabelName,$data){
    $res = $data = $this->db->insert($tabelName,$data);
    return $res;
    }
    public function data_pesanan($where=""){
     $sql = "select tb_kos_t_onl.nm_kos_t,tb_kos_t_onl.ktg_r,tb_kos_t_onl.alm_ks,tb_kos_t_onl.hrg_ks,tb_psn_usr_kost. * from tb_kos_t_onl,tb_psn_usr_kost ".$where;
     $query = $this->db->query($sql);
    return $query;
   
    }
    public function j_pesanan($where=""){
     $sql = "select * from tb_psn_usr_kost ".$where;
     $query = $this->db->query($sql);
    return $query->num_rows();
    }
    public function j_trans($where=""){
     $sql = "select * from tb_psn_usr_kost,tb_trans_usr_kost ".$where;
     $query = $this->db->query($sql);
    return $query->num_rows();
   
    }
     public function data_transaksi($where=""){
     $sql = "select tb_psn_usr_kost.tgl_psn,tb_psn_usr_kost.metod_pemb,tb_trans_usr_kost.tgl_trans_us,tb_trans_usr_kost.no_fak_trans_us,tb_trans_usr_kost.tot_bay,tb_trans_usr_kost.stt_t,tb_trans_usr_kost.cek,tb_kos_t_onl. * from tb_psn_usr_kost,tb_trans_usr_kost,tb_kos_t_onl ".$where;
     $query = $this->db->query($sql);
    return $query;
   
    }
    public function batal_psn($tabelName,$where){
    $res = $data = $this->db->delete($tabelName,$where);
    return $res;
    }
   
     public function kos_usr($where=""){
    
     $sql = "select tb_kmps.nm_kmps,tb_kos_t_onl. * from tb_kmps,tb_kos_t_onl ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
    public function kos_tampil($where=""){
    
     $sql = "select * from tb_kos_t_onl ".$where;
     $query = $this->db->query($sql);
    return $query->result();
    }
   public function del_kos_us($tabelName,$where){
    $res = $data = $this->db->delete($tabelName,$where);
    return $res;
    }
     public function psn_ks_usr($where=""){
     $sql = "select tb_u_ser_kos_t.nml_us,tb_u_ser_kos_t.je_kel_us,tb_kos_t_onl.ktg_r,tb_kos_t_onl.hrg_ks,tb_psn_usr_kost. * from tb_u_ser_kos_t,tb_psn_usr_kost,tb_kos_t_onl ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
    public function tran_ks_usr($where=""){
     $sql = "select tb_u_ser_kos_t.nml_us,tb_kos_t_onl.ktg_r,tb_psn_usr_kost.metod_pemb,tb_kos_t_onl.hrg_ks,tb_kos_t_onl.kd_kos_t,tb_trans_usr_kost. * from tb_u_ser_kos_t,tb_psn_usr_kost,tb_kos_t_onl,tb_trans_usr_kost ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
       public function j_pesanan_kos($where=""){
     $sql = "select * from tb_psn_usr_kost,tb_kos_t_onl ".$where;
     $query = $this->db->query($sql);
    return $query->num_rows();
    }
    public function j_trans_kos($where=""){
     $sql = "select * from tb_psn_usr_kost,tb_trans_usr_kost,tb_kos_t_onl ".$where;
     $query = $this->db->query($sql);
    return $query->num_rows();
   
    }
    public function edit_kos_usr($tabelName,$data,$where){
    $res = $data = $this->db->update($tabelName,$data,$where);
    return $res;
    }
    public function data_usr($where=""){
    
     $sql = "select * from tb_u_ser_kos_t ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
    public function cari_kd_kos($where=""){
     $sql ="select RIGHT(kd_kos_t,6) AS kdmax from tb_kos_t_onl ORDER BY kd_kos_t DESC LIMIT 1".$where;
     $query = $this->db->query($sql);
    return $query;
    }
    public function cari_kd_pesann($where=""){
     $sql ="select RIGHT(id_psn_ks_us,6) AS kdmax from tb_psn_usr_kost ORDER BY id_psn_ks_us DESC LIMIT 1".$where;
     $query = $this->db->query($sql);
    return $query;
    }
    public function cari_kd_trans($where=""){
     $sql ="select RIGHT(no_fak_trans_us,6) AS kdmax from tb_trans_usr_kost ORDER BY no_fak_trans_us DESC LIMIT 1".$where;
     $query = $this->db->query($sql);
    return $query;
    }
     public function cek_pesann($where=""){
     $sql ="select * from tb_psn_usr_kost ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
    public function metod_pemb($tabelName,$data,$where){
    $res = $data = $this->db->update($tabelName,$data,$where);
    return $res;
    }
     public function rek($where=""){
     $sql ="select * from tb_rek_ks_awk ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
     public function nohp_pem($where=""){
     $sql = "select tb_u_ser_kos_t.no_hp_us,tb_u_ser_kos_t.nml_us,tb_kos_t_onl.no_ktp_us,tb_kos_t_onl.hrg_ks,tb_psn_usr_kost. * from tb_psn_usr_kost,tb_kos_t_onl,tb_u_ser_kos_t ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
     public function trans_kos($tabelName,$data){
    $res = $data = $this->db->insert($tabelName,$data);
    return $res;
    }
      public function pesan_kontak_us($where=""){
     $sql ="select * from tb_kmen_usr".$where;
     $query = $this->db->query($sql);
    return $query;
    }
     public function cek_trans($where=""){
     $sql ="select * from tb_trans_usr_kost ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
     public function data_trans_adm($where=""){
     $sql ="select tb_u_ser_kos_t.nml_us,tb_psn_usr_kost.id_psn_ks_us,tb_trans_usr_kost. * from tb_trans_usr_kost,tb_psn_usr_kost,tb_u_ser_kos_t ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
     public function data_psn_adm($where=""){
     $sql ="select tb_u_ser_kos_t.nml_us,tb_psn_usr_kost. * from tb_psn_usr_kost,tb_u_ser_kos_t ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
     public function bg_slider($where=""){
     $sql ="select * from tb_slider ".$where;
     $query = $this->db->query($sql);
    return $query;
    }
   public function c_trans($tabelName,$data,$where){
    $res = $data = $this->db->update($tabelName,$data,$where);
    return $res;
    }
    public function kos_confirm($tabelName,$data,$where){
    $res = $data = $this->db->update($tabelName,$data,$where);
    return $res;
    }
    
    
}