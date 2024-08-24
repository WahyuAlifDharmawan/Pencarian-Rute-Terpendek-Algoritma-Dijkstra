<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_TempatFasilitasumum as TempatFasilitasumumModel;
use App\Models\M_Perbatasan as TitikPerbatasan;

class Data_fasilitasumum extends BaseController
{
    public function TampilDataFasilitasumum()
    {
        if (!session()->has('email_admin')) {
            return redirect()->to(base_url('admin/login')); // Jika belum login, arahkan ke halaman login
        }

        $model = new TempatFasilitasumumModel();
        $data['tempatFasilitasumum'] = $model->findAll();

        return view('admin/data_fasilitasumum', $data);
    }

    public function index()
    {
        if (!session()->has('email_admin')) {
            return redirect()->to(base_url('admin/login')); // Jika belum login, arahkan ke halaman login
        }

        $model = new TempatFasilitasumumModel();
        $data['tempatFasilitasumum'] = $model->findAll(); // Ambil semua data tempat fasilitasumum

        $model = new TitikPerbatasan();
        $data['titikPerbatasan'] = $model->findAll();

        return view('admin/data_fasilitasumum', $data);
    }

    public function simpanTempatFasilitasumum()
    {
        $model = new TempatFasilitasumumModel();

        $id = $this->request->getPost('umum_id'); // Ambil ID fasilitas umum dari form
        $nama_fasilitasumum = $this->request->getPost('nama_fasilitasumum');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $kelurahan = $this->request->getPost('kelurahan');
        $gambar = $this->request->getFile('gambar');

        // Data untuk disimpan
        $data = [
            'nama_fu' => $nama_fasilitasumum,
            'latitude_fu' => $latitude,
            'longitude_fu' => $longitude,
            'kelurahan_fu' => $kelurahan
        ];

        // Pengecekan ekstensi file gambar
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $gambarExtension = $gambar->getClientExtension();

            if (in_array($gambarExtension, $allowedExtensions)) {
                $gambarName = $gambar->getRandomName();
                $gambar->move(ROOTPATH . 'public/uploads/tempat_fasilitasumum', $gambarName);
                $data['gambar_fu'] = $gambarName;
            } else {
                session()->setFlashdata('error', 'Ekstensi file gambar tidak diizinkan.');
                return redirect()->to(base_url('admin/data_fasilitasumum'));
            }
        }

        if (!empty($id)) {
            // Jika ID tidak kosong, perbarui data yang sudah ada
            $model->update($id, $data);
        } else {
            // Jika ID kosong, simpan data baru
            $model->save($data);
        }

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->to(base_url('admin/data_fasilitasumum'));
    }

    public function edit_fasilitasumum($id)
    {
        $model = new TempatFasilitasumumModel();
        $data['umum'] = $model->find($id);

        return view('admin/edit_fasilitasumum', $data);
    }

    public function hapus_fasilitasumum($id)
    {
        $model = new TempatFasilitasumumModel();
        $model->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to(base_url('admin/data_fasilitasumum'));
    }
}
