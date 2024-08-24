<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_TempatIbadah as TempatIbadahModel;
use App\Models\M_Perbatasan as TitikPerbatasan;

class Data_tempat extends BaseController
{
    public function TampilData()
    {
        if (!session()->has('email_admin')) {
            return redirect()->to(base_url('admin/login'));
        }

        $model = new TempatIbadahModel();
        $data['tempatIbadah'] = $model->findAll();

        return view('admin/data_tempat', $data);
    }

    public function index()
    {
        if (!session()->has('email_admin')) {
            return redirect()->to(base_url('admin/login'));
        }

        $model = new TempatIbadahModel();
        $data['tempatIbadah'] = $model->findAll();

        // Ambil tipe tempat ibadah yang unik dan kirimkan ke view
        $data['types'] = $model->getUniqueTypes();

        $model = new TitikPerbatasan();
        $data['titikPerbatasan'] = $model->findAll();

        return view('admin/data_tempat', $data);
    }


    public function simpanTempatIbadah()
    {
        $model = new TempatIbadahModel();

        $id = $this->request->getPost('tempat_id');
        $nama_tempat = $this->request->getPost('nama_tempat');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $kelurahan = $this->request->getPost('kelurahan');
        $type = $this->request->getPost('type'); // Ambil nilai tipe
        $gambar = $this->request->getFile('gambar');

        // Data untuk disimpan
        $data = [
            'nama_ti' => $nama_tempat,
            'latitude_ti' => $latitude,
            'longitude_ti' => $longitude,
            'kelurahan_ti' => $kelurahan,
            'type' => $type // Simpan tipe
        ];

        // Pengecekan ekstensi file gambar
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $gambarExtension = $gambar->getClientExtension();

            if (in_array($gambarExtension, $allowedExtensions)) {
                $gambarName = $gambar->getRandomName();
                $gambar->move(ROOTPATH . 'public/uploads/tempat_ibadah', $gambarName);
                $data['gambar_ti'] = $gambarName;
            } else {
                session()->setFlashdata('error', 'Ekstensi file gambar tidak diizinkan.');
                return redirect()->to(base_url('admin/data_tempat'));
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
        return redirect()->to(base_url('admin/data_tempat'));
    }

    public function edit_tempat($id)
    {
        $model = new TempatIbadahModel();
        $data['tempat'] = $model->find($id);

        // Ambil tipe tempat ibadah yang unik
        $data['types'] = $model->getUniqueTypes();

        return view('admin/edit_tempat', $data);
    }


    public function hapus_tempat($id)
    {
        $model = new TempatIbadahModel();
        $model->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to(base_url('admin/data_tempat'));
    }
}
