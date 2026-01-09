<?php 

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Halaman Utama';
        $data['nama'] = 'User';
        $this->view('home/index', $data);
    }
}