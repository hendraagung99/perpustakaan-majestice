<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{


function index(){
$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$data['transaksi'] = $this->db->query("select * from transaksi order by id_pinjam
desc limit 10")->result();
$data['anggota'] = $this->db->query("select * from anggota order by id_anggota
desc limit 10")->result();
$data['buku'] = $this->db->query("select * from buku order by id_buku desc
limit 10")->result();
$data['kategori'] = $this->db->query("select * from kategori order by id_kategori desc
limit 10")->result();
$this->load->view('admin/header',$data);
$this->load->view('admin/index',$data);
$this->load->view('admin/footer');
} 

 public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

function ganti_password(){
$this->load->view('admin/header');
$this->load->view('admin/ganti_password');
$this->load->view('admin/footer');
}

 function ganti_password_act(){
$pass_baru = $this->input->post('pass_baru');
$ulang_pass = $this->input->post('ulang_pass');
$this->form_validation->set_rules('pass_baru','Password
Baru','required|matches[ulang_pass]');
$this->form_validation->set_rules('ulang_pass','Ulangi Password
Baru','required');
if($this->form_validation->run() != false){
$data = array('password' =>md5($pass_baru));
$w = array('id_admin' => $this->session->userdata('id'));
$this->M_perpus->update_data($w,$data,'admin');
redirect(base_url().'admin/ganti_password?pesan=berhasil');
}else{
$this->load->view('admin/header');
$this->load->view('admin/ganti_password');
$this->load->view('admin/footer');
}}

public function detail($id){
    $this->load->model('M_perpus');
    $detail = $this->M_perpus->detail_data($id);
    $data['detail'] = $detail;
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/detail', $data);
    $this->load->view('templates/footer');

  }

function user(){

$data['user'] = $this->db->get('user')->result();
$data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$this->load->view('admin/header', $data1);
$this->load->view('admin/user',$data);
$this->load->view('admin/footer');
} 

function userbooking(){

$data['booking'] = $this->db->get('booking')->result();
$data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$this->load->view('admin/header', $data1);
$this->load->view('admin/userbooking',$data);
$this->load->view('admin/footer');
} 


function buku(){
$data['buku'] = $this->M_perpus->get_data('buku')->result();
$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$this->load->view('admin/header',$data);
$this->load->view('admin/buku',$data);
$this->load->view('admin/footer');
} 

function tambah_buku(){
$data['kategori'] = $this->M_perpus->get_data('kategori')->result();
 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$this->load->view('admin/header',$data);
$this->load->view('admin/tambahbuku',$data);
$this->load->view('admin/footer');
} 

function tambah_buku_act(){
$data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$tgl_input = date('Y-m-d');
$id_kategori = $this->input->post('id_kategori' , true);
$judul = $this->input->post('judul_buku' , true);
$pengarang = $this->input->post('pengarang' , true);
$penerbit = $this->input->post('penerbit' , true);
$thn_terbit = $this->input->post('thn_terbit', true);
$isbn = $this->input->post('isbn' , true);
$jumlah_buku = $this->input->post('jumlah_buku' , true);
$lokasi = $this->input->post('lokasi' , true);
$status = $this->input->post('status_buku' , true);
$this->form_validation->set_rules('id_kategori','Kategori','required');
$this->form_validation->set_rules('judul_buku','Judul Buku','required');
$this->form_validation->set_rules('status','Status Buku','required');
if($this->form_validation->run() == false){
//configurasi upload Gambar
$config['upload_path'] = './asset/upload/';
$config['allowed_types'] = 'jpg|png|jpeg|pdf';
$config['max_size'] = '2048';
$config['file_name'] = 'gambar'.time();
$this->load->library('upload',$config);
if($this->upload->do_upload('foto')){
$image = $this->upload->data();
$data = array(
'id_kategori' => $id_kategori,
'judul_buku' => $judul,
'pengarang' => $pengarang,
'penerbit' => $penerbit,
'thn_terbit' => $thn_terbit,
'isbn' => $isbn,
'jumlah_buku' => $jumlah_buku,
'lokasi' => $lokasi,
'gambar' => $image['file_name'],
'tgl_input' => $tgl_input,
'status_buku' => $status
);
$this->M_perpus->insert_data($data,'buku');
 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert" >
  <strong>Data Behasil Ditambah</strong> 
</div>');
redirect(base_url().'admin/buku');
}else{
$this->load->view('admin/header',$data1);
$this->load->view('admin/tambahbuku',$data1);
$this->load->view('admin/footer',$data1);
}
}
}

function hapus_buku($id){
$where = array('id_buku' => $id);
$this->M_perpus->delete_data($where,'buku');
 $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert" >
  <strong>Data Behasil Dihapus</strong> 
  
</div>');
redirect(base_url().'admin/buku');
}

function edit_buku($id){
$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$where = array('id_buku' =>$id);
$data['buku'] = $this->db->query("select * from buku B, kategori K where
B.id_kategori=K.id_kategori and B.id_buku='$id'")->result();
$data['kategori'] =$this->M_perpus->get_data('kategori')->result();
$this->load->view('admin/header',$data);
$this->load->view('admin/editbuku',$data);
$this->load->view('admin/footer');
} 

function update_buku(){
$data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	
$id = $this->input->post('id');
$id_kategori = $this->input->post('id_kategori' , true);
$judul = $this->input->post('judul_buku' , true);
$pengarang = $this->input->post('pengarang' , true);
$penerbit = $this->input->post('penerbit' , true);
$thn_terbit = $this->input->post('thn_terbit' , true);
$isbn = $this->input->post('isbn' , true);
$jumlah_buku = $this->input->post('jumlah_buku' , true);
$lokasi = $this->input->post('lokasi' , true);
$status = $this->input->post('status_buku' , true);

$this->form_validation->set_rules('id_kategori','ID Kategori','required');
$this->form_validation->set_rules('judul_buku','Judul
Buku','required|min_length[4]');
$this->form_validation->set_rules('pengarang','Pengarang','required|min_length[4]');
$this->form_validation->set_rules('penerbit','Penerbit','required|min_length[4]');
$this->form_validation->set_rules('thn_terbit','Tahun
Terbit','required|min_length[4]');
$this->form_validation->set_rules('isbn','Nomor ISBN','required|numeric');
$this->form_validation->set_rules('jumlah_buku','Jumlah
Buku','required|numeric');
$this->form_validation->set_rules('lokasi','Lokasi
Buku','required|min_length[4]');
$this->form_validation->set_rules('status_buku','Status Buku','required');

if($this->form_validation->run() != false){
$config['upload_path'] = './asset/upload/';
$config['allowed_types'] = 'jpg|png|jpeg';
$config['max_size'] = '2048';
$config['file_name'] = 'gambar'.time();
$this->load->library('upload',$config);
$where = array('id_buku' => $id);

$data = array(
'id_kategori' => $id_kategori,
'judul_buku' => $judul,
'pengarang' => $pengarang,
'penerbit' => $penerbit,
'thn_terbit' => $thn_terbit,
'isbn' => $isbn,
'jumlah_buku' => $jumlah_buku,
'lokasi' => $lokasi,
'gambar' => $image['file_name'],
'tgl_input' => $tgl_input,
'status_buku' => $status
);
	if($this->upload->do_upload('foto')){
	//proses upload Gambar
	$image = $this->upload->data();
	unlink('asset/upload/'.$this->input->post('old_pict',TRUE));
	$data['gambar'] = $image['file_name'];
	$this->M_perpus->update_data('buku',$data,$where);
	} else{
	$this->M_perpus->update_data('buku',$data,$where);
	}
	$this->M_perpus->update_data('buku',$data,$where);
	$this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible fade show" role="alert" >
  <strong>Data Behasil Diperbarui</strong> 
 
</div>');
	redirect(base_url().'admin/buku');

} else{
$where = array('id_buku' => $id);
$data['buku'] = $this->db->query("select * from buku b, kategori k
where b.id_kategori=k.id_kategori and b.id_buku='$id'")->result();
$data['kategori'] = $this->M_perpus->get_data('kategori')->result();
$this->load->view('admin/header',$data1);
$this->load->view('admin/editbuku',$data);
$this->load->view('admin/footer');
}
} 


function kategori(){
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$data['kategori'] = $this->M_perpus->get_data('kategori')->result();

        $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required', [
            'required' => 'kategori harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header',$data);
			$this->load->view('admin/kategori',$data);
			$this->load->view('admin/footer');

        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori', TRUE)
            ];

            $this->M_perpus->insert_data($data,'kategori');
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert" >
  <strong>Data Behasil Ditambah</strong> 
</div>');
            redirect('admin/kategori');
        }
} 

function hapus_kategori($id){
$where = array('id_kategori' => $id);
$this->M_perpus->delete_data($where,'kategori');
$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Behasil Dihapus</strong> 
 
</div>');
redirect(base_url().'admin/kategori');
}


function anggota(){
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$data['anggota'] = $this->M_perpus->get_data('anggota')->result();
$this->load->view('admin/header',$data);
$this->load->view('admin/anggota',$data);
$this->load->view('admin/footer');
} 

function tambah_anggota(){
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$this->load->view('admin/header',$data);
$this->load->view('admin/tambahanggota',$data);
$this->load->view('admin/footer');
} 

function tambah_anggota_act(){
$nama_anggota = $this->input->post('nama_anggota');
$gender = $this->input->post('gender');
$no_telp = $this->input->post('no_telp');
$alamat = $this->input->post('alamat');
$email = $this->input->post('email');
$password = $this->input->post('password');
$this->form_validation->set_rules('nama_anggota','Nama Anggota','required');
$this->form_validation->set_rules('no_telp','No.Telpon','required');
$this->form_validation->set_rules('alamat','Alamat','required');
$this->form_validation->set_rules('email','Email','required');
$this->form_validation->set_rules('password','Password','required');
if($this->form_validation->run() != false){
$data = array(
'nama_anggota' => $nama_anggota,
'gender' => $gender,
'no_telp' => $no_telp,
'alamat' => $alamat,
'email' => $email,
'password' => $password,
);
$this->M_perpus->insert_data($data,'anggota');
 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert" >
  <strong>Data Behasil Ditambah</strong> 
</div>');
redirect(base_url().'admin/anggota');
}else{
$this->load->view('admin/header');
$this->load->view('admin/tambahanggota');
$this->load->view('admin/footer');
}
}

function hapus_anggota($id){
$where = array('id_anggota' => $id);
$this->M_perpus->delete_data($where,'anggota');
$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Behasil Dihapus</strong> 
 
</div>');
redirect(base_url().'admin/anggota');
}

function edit_anggota($id){
$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$where = array('id_anggota' =>$id);
$data['anggota'] = $this->db->query("select * from anggota where
id_anggota='$id'")->result();
$this->load->view('admin/header',$data);
$this->load->view('admin/editanggota',$data);
$this->load->view('admin/footer');
} 

function update_anggota(){
$id = $this->input->post('id');
$nama_anggota = $this->input->post('nama_anggota');
$gender = $this->input->post('gender');
$penerbit = $this->input->post('penerbit');
$no_telp = $this->input->post('no_telp');
$alamat = $this->input->post('alamat');
$email = $this->input->post('email');
$password = $this->input->post('password');
$this->form_validation->set_rules('nama_anggota','Nama
Anggota','required');
$this->form_validation->set_rules('no_telp','No.Telpon','required');
$this->form_validation->set_rules('alamat','Alamat','required');
$this->form_validation->set_rules('email','Email','required');
$this->form_validation->set_rules('password','Password','required');
if($this->form_validation->run() != false){
$where = array('id_anggota' => $id);
$data = array(
'nama_anggota' => $nama_anggota,
'gender' => $gender,
'no_telp' => $no_telp,
'alamat' => $alamat,
'email' => $email,
'password' => $password,
);
$this->M_perpus->update_data('anggota',$data,$where);
$this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible fade show" role="alert" >
  <strong>Data Behasil Diperbarui</strong> 
 
</div>');
redirect(base_url().'admin/anggota');
} else{
$where = array('id_anggota' =>$id);
$data['anggota'] = $this->db->query("select * from anggota where
id_anggota='$id'")->result();
$this->load->view('admin/header');
$this->load->view('admin/editanggota',$data);
$this->load->view('admin/footer');
}
} 

function peminjaman(){
$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$data['peminjaman'] = $this->db->query("SELECT * FROM transaksi T,
buku B, anggota A WHERE T.id_buku=B.id_buku and
T.id_anggota=A.id_anggota")->result();
$this->load->view('admin/header',$data);
$this->load->view('admin/peminjaman',$data);
$this->load->view('admin/footer');
} 

function tambah_peminjaman(){
$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$w = array('status_buku'=>'1');
$data['buku'] = $this->M_perpus->edit_data($w,'buku')->result();
$data['anggota'] = $this->M_perpus->get_data('anggota')->result();
$data['peminjaman'] = $this->M_perpus->get_data('transaksi')->result();
$this->load->view('admin/header',$data);
$this->load->view('admin/tambah_peminjaman',$data);
$this->load->view('admin/footer');
} 

function tambah_peminjaman_act(){
$tgl_pencatatan = date('Y-m-d H:i:s');
$anggota = $this->input->post('anggota');
$buku = $this->input->post('buku');
$tgl_pinjam = $this->input->post('tgl_pinjam');
$tgl_kembali = $this->input->post('tgl_kembali');
$denda = $this->input->post('denda');
$this->form_validation->set_rules('anggota','Anggota','required');
$this->form_validation->set_rules('buku','Buku','required');
$this->form_validation->set_rules('tgl_pinjam','Tanggal Pinjam','required');
$this->form_validation->set_rules('tgl_kembali','Tanggal
Kembali','required');
$this->form_validation->set_rules('denda','Denda','required');
if($this->form_validation->run() != false){
$data = array(
'tgl_pencatatan' => $tgl_pencatatan,
'id_anggota' => $anggota,
'id_buku' => $buku,
'tgl_pinjam' => $tgl_pinjam,
'tgl_kembali' => $tgl_kembali,
'denda' => $denda,
'tgl_pengembalian' => '0000-00-00',
'total_denda' => '0',
'status_pengembalian' =>'0',
'status_peminjaman' =>'0'
);
$this->M_perpus->insert_data($data,'transaksi');
$d = array('status_buku' =>'0','tgl_input' =>
substr($tgl_pencatatan,0,10));
$w = array('id_buku' => $buku);
$this->M_perpus->update_data('buku', $d,$w);
$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert" >
  <strong>Buku Berhasil Di Booking</strong> 
</div>');
redirect(base_url().'admin/peminjaman');
}else{
$w = array('status_buku' => '1');
$data['buku'] = $this->M_perpus->edit_data($w,'buku')->result();
$data['anggota'] = $this->M_perpus->get_data('anggota')->result();
$this->load->view('admin/header');
$this->load->view('admin/tambah_peminjaman',$data);
$this->load->view('admin/footer');
}
} 

function transaksi_hapus($id){
$w = array('id_pinjam' => $id);
$data = $this->M_perpus->edit_data($w,'transaksi')->row();
$ww = array('id_buku' => $data->id_buku);
$data2 = array('status_buku' => '1');
$this->M_perpus->update_data('buku',$data2,$ww);
$this->M_perpus->delete_data($w,'transaksi');
redirect(base_url().'admin/peminjaman');
} 

}
?>
