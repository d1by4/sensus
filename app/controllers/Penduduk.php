<?php

class Penduduk extends Controller
{
    public function index()
    {
        $data['judul'] = 'Penduduk';
        $data['penduduk'] = $this->model('Penduduk_model')->getAllPenduduk();
        $this->view('template/header', $data);
        $this->view('penduduk/index', $data);
        $this->view('template/footer');
    }

    public function add()
    {
        if ($this->model('Penduduk_model')->add($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/penduduk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/penduduk');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Penduduk_model')->deletePenduduk($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/penduduk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/penduduk');
            exit;
        }
    }

    // mengambil data yang sudah ada dari model
    public function getEdit()
    {
        echo json_encode($this->model('Penduduk_model')->getPendudukById($_POST['id']));
    }

    public function edit()
    {
        // var_dump($this->model('Penduduk_model')->editDataPenduduk($_POST));
        // die();
        if ($this->model('Penduduk_model')->editDataPenduduk($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/penduduk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/penduduk');
            exit;
        }
    }
}
