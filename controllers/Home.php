<?php

defined('BASEPATH') or exit('no direct script acces allowed');


class Home extends CI_Controller
{


    /**
     * Class constructor.
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tps');
        $this->load->library('form_validation');
        // cek_sesi();
        $this->user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        
       
    }

  
    public function index()
    {
        $data = array(
            'isi' => 'users/index'
        );

        $this->load->view('users/index', $data, FALSE);
    }

    //mana tampilannya

    public function register1()
    {
        $data = array(
            'isi' => 'users/register1'
        );
        $this->load->view('users/register1', $data, FALSE);
    }

    //!

    public function marker()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Penanda Lokasi Pada Peta',
            'isi' => 'v_marker',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
        
    }



   

    public function polyline()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan polyline ',
            'isi' => 'v_polyline',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function kontak()
    {
        $data = array(
            'title' => 'Kontak Kami ',
            'isi' => 'v_kontak',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
        

    }

    // public function menuUtama()
    // {
    //     $data = array(
    //         'title' => 'Pemetaan Kegiatan Menu Bappeda Sukabumi ',
    //         'isi' => 'v_menuUtama'
    //     );
    //     $this->load->view('template/v_wrapper', $data, FALSE);
    // }

    public function router()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan router ',
            'isi' => 'v_router',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function TamanBappeda()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Taman Bappeda',
            'isi' => 'v_TamanBappeda',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function Polygone()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Polygone',
            'isi' => 'v_Polygone',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function circle()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan circle map',
            'isi' => 'v_circle',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function coordinat()
    {

        $data = array(
            'title' => 'Pemetaan Kegiatan coordinat map',
            'isi' => 'v_coordinat',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);


    }


    public function tps()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Pemetaan Dinas Sukabumi',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'tps/v_pemetaan_tps',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function perminatan()
    {
        $data = array(
            'title' => 'Pesan perminatan',
            'tps' => $this->m_tps->permintaan(),
            'isi' => 'users/permintaan',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tps2()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Pemetaan Ciclre Dinas Sukabumi',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'tps/v_pemetaan_tps2',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function routing()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Routing Machine',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'tps/v_routing',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function cluster()
    {

        $data = array(
            'title' => 'Pemetaan Kegiatan Menu Cluster',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'v_cluster',
            'user' => $this->user 


        );
        //            $data['user'] = $this->user;
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function heatmap()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Menu Heat-Map',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'tps/v_heatmap',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function profile()
    {
        $data = array(
            'title' => 'My profile',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'users/profile',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function editdata()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan ata Map',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'tps/v_editdata',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);

        //disini saya menambahkan menu pencarian
       if($this->input->post('submit')){
          $data['keyword']=$this->input->post('keyword');

        }
    }

    //edit map data

    public function editmap($id)
    {

        $data = array(
             $this->m_tps->edit('tbl_tps'),
            'user' => $this->user
        );
         if ($this->m_tps->edit($data) > 0) {
           $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert" style="color:black;">Data tersimpan</div>');
            redirect('home/detail');
            } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" style="color:black;">ada kesalahan </div>');
            redirect('home/detail');
        }

    }

    public function detailpermintaan($id)
    {

        $data = array
        (
            'title'=>'Kotak permintaan',
            'tps'=>$this->m_tps->detailpesan($id),
            'isi'=>'users/detailpermintaan',
            'user'=> $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    //proses edit data

    // public function proses_edit($id)
    // {
    //     $wilayah = $this->input->post('wilayah');
    //     $wilayah = $this->input->post('kecamatan');
    //     $wilayah = $this->input->post('nama_dinas');
    //     $wilayah = $this->input->post('latitude');
    //     $wilayah = $this->input->post('longitude');

    //     $data = array(

    //         'wilayah'   => $wilayah,
    //         'kecamatan' => $kecamatan,
    //         'nama_dinas'=> $nama_dinas,
    //         'latitude'  => $latitude,
    //         'longitude' => $longitude,

    //     );
    //     $where = array('id' => $id);
    //     $this->m_tps->edit($where, $data, 'permintaan');

    //     if ($this->m_tps->edit($data) > 0) {
    //        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert" style="color:black;">Data tersimpan</div>');
    //         redirect('home/detail');
    //         } else {
    //         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" style="color:black;">ada kesalahan </div>');
    //         redirect('home/detail');
    //     }

    
    // }

    //editdatamap // update
    // public function editdatamap($id)
    // {
    //     $data = array
    //     (

    //         $this->m_tps->editdatanya($id)->row_array();

    //     );
    //     if ($this->m_tps->editdatanya($data) > 0) {
    //        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert" style="color:black;">Data tersimpan</div>');
    //         redirect('home/editdata');
    //         } else {
    //         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" style="color:black;">ada kesalahan </div>');
    //         redirect('home/editdata');
    //     }
    // }



    public function tempatheatmap()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Menu Heat-Map',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'tps/v_tempatheatmap',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function controlmap()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan Menu control map',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'tps/v_controlmap',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function geojson()
    {
        $data = array(
            'title' => 'Pemetaan Kegiatan GeoJson Map (Polygone)',
            'tps' => $this->m_tps->get_all_data(),
            'isi' => 'v_geojson',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }




    public function input_data()
    {

        //dibawah ini saya memasukan gambar 

        $this->load->library('upload');
        $nmfile = 'home'.time();
        $config['upload_path'] = './template';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';


        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if($_FILES['photo']['name']){
            if($this->upload->do_upload('photo')){
                $gambar = $this->upload->data();
//-----------------------------------------------------------------------------------------//
                $data = array(
                'id'            =>      '123',
                'kode_tps'      =>      'TU123',
                'wilayah'       =>      $this->input->post('wilayah'),
                'kecamatan'     =>      $this->input->post('kecamatan'),
                'nama_tps'      =>      $this->input->post('nama_tps'),
                'lokasi'        =>      $this->input->post('lokasi'),
                'latitude'      =>      $this->input->post('latitude'),
                'longitude'     =>      $this->input->post('longitude'),
                'photo'         =>      $gambar['file_name'],
            );

            if ($this->m_tps->input_data($data) > 0) {
           $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert" style="color:black;">Data tersimpan</div>');
            redirect('home/editdata');
            } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" style="color:black;">ada kesalahan </div>');
            redirect('home/editdata');
        }
    }

            }
        }


        //request / kirim data ke admin atau minta reques ke admin

        public function kirim_data()
    {

        //dibawah ini saya memasukan gambar 

        $this->load->library('upload');
        $nmfile = 'home'.time();
        $config['upload_path'] = './template';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';


        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if($_FILES['photo']['name']){
            if($this->upload->do_upload('photo')){
                $gambar = $this->upload->data();
//-----------------------------------------------------------------------------------------//
                $data = array(
                'wilayah'       =>      $this->input->post('wilayah'),
                'kecamatan'     =>      $this->input->post('kecamatan'),
                'nama_dinas'      =>      $this->input->post('nama_dinas'),
                'keterangan'        =>      $this->input->post('keterangan'),
                'latitude'      =>      $this->input->post('latitude'),
                'longitude'     =>      $this->input->post('longitude'),
                'photo'         =>      $gambar['file_name'],
            );

            if ($this->m_tps->requestdata($data) > 0) {
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="color:black;">Data sudah terkirim tunggu kabar selanjutnya</div>');
            redirect('home/profile');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color:black;">ada kesalahan </div>');
            redirect('home/profile');
        }
    }

            }
        }

        //pesan perminatan
        // public function perminatan()
        // {
            
        //     $data = array
        //     (
        //         'title'=>'Pesan Perminatan',
        //         'tps'=> $this->m_tps->perminatandata(),
        //         'isi'=>'home/v_perminatan',
        //         'user' => $this->user
        // );
        // $this->load->view('template/v_wrapper', $data, FALSE);

        // }







    // public function pendaftaran_daerah()
    // {
    //     $data = array(
    //         'kecamatan' => $this->input->post('kecamatan'),
    //         'nama_tps' => $this->input->post('nama_tps'),
    //         'lokasi' => $this->input->post('lokasi'),
    //         'latitude' => $this->input->post('latitude'),
    //         'longitude' => $this->input->post('longitude'),

    //     );
    //     if ($this->m_tps->input_data($data) > 0) {
    //         $this->session->set_flashdata('pesan', 'barhasil tambah');
    //         redirect('home/tps/pemataan');
    //     } else {
    //         $this->session->set_flashdata('pesan', 'error');
    //         redirect('home/tps/pemetaan_tps');
    //     }
    // }



    public function input_pesan()
    {
        $data = array(

            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'pertanyaan' => $this->input->post('pertanyaan'),

        );
        if ($this->m_tps->input_pesan($data) > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pesan Terkirim </div>');
            redirect('home/kontak');
        } else {
            $this->session->set_flashdata('pesan', 'error');
            redirect('home/kontak');
        }
    }


    //?ini untuk menghapus
    public function hapus($id)
    {
        $where = array('id' => $id);
        if ($this->m_tps->hapus('tbl_tps', $where) > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert" style="text-align:center; color:black;"> Data Terhapus </div>');
            redirect('home/editdata');
        } else {
            $this->session->set_flashdata('pesan', 'error');
            redirect('home/editdata');
        }
    }

    //hapus menu akses

     public function hapusakses($id)
    {
        $where = array('id' => $id);
        if ($this->m_tps->hapusmenuakses('user_menu', $where) > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert" style="text-align:center; color:black;"> Data Terhapus </div>');
            redirect('home/menuakses');
        } else {
           $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert" style="text-align:center; color:black;"> Data Terhapus </div>');
            redirect('home/menuakses');
        }
    }

     public function hapusaksesmenu($id)
    {
        $where = array('id' => $id);
        if ($this->m_tps->hapusmenuaksesnav('user_sub_menu', $where) > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert" style="text-align:center; color:black;"> Data Terhapus </div>');
            redirect('home/submenumanagement');
        } else {
           $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert" style="text-align:center; color:black;"> Data Terhapus </div>');
            redirect('home/submenumanagement');
        }
    }

    //ini detail
    public function detail($id)
    {
        $data = array(
            'title'=>'detail',
            'tps'=>$this->m_tps->detailnya($id),
            'isi'=>'users/detail',
            'user'=> $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    //?ini untuk mengambil data dari table pessan
    public function pesanmasuk()
    {

        $data = array(
            'title' => 'pesan masuk',
            'pesanku' => $this->m_tps->pesanmasukk(),
            'isi' => 'tps/v_pesanmasuk',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    //?ini khusus page users

    public function login()
    {

        
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

      

        if ($this->form_validation->run() == false) {

            $data = array(
                'isi' => 'users/index'
            );
            $this->load->view('users/index', $data, FALSE);
        } else {
            //ini untuk validasi mengambil function di bawah
            $this->_proseslogin();
        }
    }

    private function _proseslogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $users = $this->db->get_where('users', ['email' => $email])->row_array();
        // var_dump($users);
        // die;
        if ($users) {
            //jika user actip
            if ($users['is_active'] == 1) {
                //chek password
                //disini nagmbil dari passwrod yang di imput 
                if (password_verify($password, $users['password'])) {
                    $data = [
                        'email' => $users['email'],
                        'role_id' => $users['role_id']
                    ];


                    $this->session->set_userdata($data);

                    //disini buat login sebagai admin atau users
                    if ($users['role_id'] == 1) {
                        //jadi jikalau yang login dengan role id 1 dia masuk ke admin
                        //dan jikalau 2 dia masuk sebagai user dan jikalau ada lebih saya bisa nambah role id nya dan logicnya
                        redirect('home/cluster');
                    } else {

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="color:black;">Selamat Datang dan silahkan lihat Peta Dinas</div>');
                        redirect('home/profile');
                    }
                   

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" style="text-align:center;" role="alert">Password kurang tepat</div>');
                    redirect('home/login');
                }
            } else {
                //password blum aktipasi
                $this->session->set_flashdata('message', '<div class="alert alert-danger" style="text-align:center;" role="alert"> Belum aktivasi email </div>');
                redirect('home/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" style="text-align:center;" role="alert"> Email belum terdaftar </div>');
            redirect('home/login');
        }
    }

    public function registration()
    {


        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim'
        );
        // $this->form_validation->set_rules(
        //     'dinas',
        //     'Dinas',
        //     'required|trim|'
        // );
        // $this->form_validation->set_rules(
        //     'email',
        //     'Email',
        //     'required|trim|
        //     valid_email|is_unique[user.email]',
        //     [
        //         'is_unique' => 'email ini sudah terdaftar'
        //     ]
        // );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[8]|matches[password2]',
            [
                'matches' => 'password tidak sama!',
                'min_lebgth' => 'password terlalu sedikit',
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|min_length[8]|matches[password1]'
        );

        if ($this->form_validation->run() == false) {

            $data = array(
                'title' => 'Register Pemetaan Dinas',
                'isi' => 'users/register1'
            );
            $this->load->view('users/register1', $data, FALSE);
        } else {
            $data =
                [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'dinas' => htmlspecialchars($this->input->post('dinas')),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 1,
                    'date_created' => time()
                ];
            //dibawah ini 
            $this->db->insert('users', $data);
            //dibawah ini saya membuat session jikalau register sudah masuk maka akan timbul alert sprti ini 
            //ini saya mambil alert dari boostraap dan si session ini di masukan atau di slipkan
            //ke dalam page login ,, dengan format $this->session->flashdata('nama pesan sessionnya(message)')
            $this->session->set_flashdata('message', '<div class="alert alert-success" style="text-align:center;" role="alert"> Selamat anda sudah terdaftar. Langsung Login yah</div>');
            redirect('home/index');
            // field email gak ada
        }
    }
    //ini khsus logut
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" style="text-align:center;" role="alert"> Logout Berhasil </div>');
        redirect('home/index');
    }



    //?ini khusus admin

    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi' => 'users/dashboard',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }


    //ini penambahan role akses
    public function role()
    {
        $data = array(
            'title' => 'Admin Role',
            'tps'=>$this->m_tps->aksesrole(),
            'isi' => 'users/role',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

//...............................................................................///

    //input / tambah role akses

    public function tambahaksesrole()
    {
        $data = array
        (
            'role' => $this->input->post('role'),
        );
        if ($this->m_tps->savemenurole($data)>0) {

              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Role Tersimpan</div>');
             redirect('home/role');
        } else {
             $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data Teri Simpan</div>');
             redirect('home/role');
        }
    }


    //disini saya menambahkan role akses

    public function role_acces()
    {
        $data = array
        (
            'title' => 'Role Access',
            'tps'=>$this->m_tps->menuaksesrole(),
            'isi' => 'users/role_acces',
            'user' => $this->user
        );
         $this->load->view('template/v_wrapper', $data,  FALSE);
    }
 
 //.................................................................................//




    //disini saya membuat kode ambil data dari menu_id untuk data akses
    //ini file MENUAKSES
    public function menuakses()
    {
        $data = array(

            'title' => 'hak_akses_menu',
            'tps' => $this->m_tps->aksesuser(),
            'isi' => 'users/menuakses',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);


    }

    //dibawah ini saya akan menambakan data untuk hak akses

    public function tambahakses()
    {
        $data = array
        (
            'menu' => $this->input->post('menu'),
        );
        if ($this->m_tps->savemenuakses($data)>0) {

              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data tidak Teri Simpan</div>');
             redirect('home/menuakses');
        } else {
             $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data Teri Simpan</div>');
             redirect('home/menuakses');
        }
    }

    //AKHIR FILE MENU AKSES


    //MEMBUAT TAMBAH SUB MENU
     public function submenumanagement()
    {
        $data = array(

            'title' => 'hak_akses_submenu',
            'tps' => $this->m_tps->submenu(),
            'isi' => 'users/submenumanagement',
            'user' => $this->user
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    //INPUT TAMBAH SUB MENU
    public function tambahsubmenu()
    {
        $data = array
        (

            'menu_id' => $this->input->post('menu_id'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active'=> $this->input->post('is_active')

        );
        if ($this->m_tps->savesubmenu($data)>0) {

              $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Teri Simpan</div>');
             redirect('home/submenumanagement');
        } else {
             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Teri Simpan</div>');
             redirect('home/submenumanagement');
        }
    }


    public function updatedatamap()
    {
        $data = array(
            'id' => '123',
            'kode_tps' => 'TU123',
            'wilayah' => 'Contoh wilayah',
            'kecamatan' => $this->input->post('kecamatan'),
            'nama_tps' => $this->input->post('nama_tps'),
            'lokasi' => $this->input->post('lokasi'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),

        );
        if ($this->m_tps->editdata($data) > 0) {
            $this->session->set_flashdata('pesan', 'barhasil tambah');
            redirect('home/editdata');
        } else {
            $this->session->set_flashdata('pesan', 'error');
            redirect('home/editdata');
        }
    }


        public function search(){
      
        $keyword = $this->input->post('keyword');
        $siswa = $this->SiswaModel->search($keyword);
 
        $hasil = $this->load->view('view', array('siswa'=>$siswa), true);
        
        // Buat sebuah array
        $callback = array(
          'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
        );
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
      }


    //function upload gambar
    public function tambah(){    
        $data = array();        
        if($this->input->post('submit')){
              $upload = $this->GambarModel->upload();            
              if($upload['result'] == "success"){ 
                        $this->GambarModel->save($upload);                
                        redirect('home/editdata');

             }else{
                 $data['message'] = $upload['error'];
        }               
    }

                   $this->load->view('gambar/form', $data);  
}

}