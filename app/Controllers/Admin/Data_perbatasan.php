<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Perbatasan as PerbatasanModel;

class Data_perbatasan extends BaseController
{    public function TampilData()
    {
        if (!session()->has('email_admin')) {
            return redirect()->to(base_url('admin/login')); // Jika belum login, arahkan ke halaman login
        }

        $model = new PerbatasanModel();
        $data['perbatasan'] = $model->findAll();

        return view('admin/data_perbatasan', $data);
    }

    public function index()
    {
        if (!session()->has('email_admin')) {
            return redirect()->to(base_url('admin/login')); // Jika belum login, arahkan ke halaman login
        }

        $model = new PerbatasanModel();
        $data['perbatasan'] = $model->findAll(); // Ambil semua data perbatasan

        return view('admin/data_perbatasan', $data);
    }

    public function simpanPerbatasan()
    {
        $model = new PerbatasanModel();

        $id = $this->request->getPost('perbatasan_id'); // Ambil ID tempat ibadah dari form
        $nama_perbatasan = $this->request->getPost('nama_perbatasan');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        // Debugging: Tampilkan data POST yang diterima
        error_log("Received POST data: " . json_encode($this->request->getPost()));

        if (!empty($id)) {
            // Debugging: Tampilkan pesan bahwa update dipanggil
            error_log("Updating ID: " . $id);

            // Jika ID tidak kosong, berarti sedang dalam mode edit
            // Perbarui data yang sudah ada
            $updateResult = $model->update($id, [
                'nama_tp' => $nama_perbatasan,
                'latitude_tp' => $latitude,
                'longitude_tp' => $longitude,
            ]);

            // Debugging: Tampilkan hasil update
            error_log("Update result: " . json_encode($updateResult));
        } else {
            // Debugging: Tampilkan pesan bahwa save dipanggil
            error_log("Adding new record");

            // Jika ID kosong, berarti sedang menambah data baru
            // Simpan data baru
            $saveResult = $model->save([
                'nama_tp' => $nama_perbatasan,
                'latitude_tp' => $latitude,
                'longitude_tp' => $longitude,
            ]);

            // Debugging: Tampilkan hasil save
            error_log("Save result: " . json_encode($saveResult));
        }

        // Tambahkan pesan flash "Data berhasil disimpan"
        session()->setFlashdata('success', 'Data berhasil disimpan.');

        return redirect()->to(base_url('admin/data_perbatasan'));
    }

    public function edit_perbatasan($id)
    {
        $model = new PerbatasanModel();
        $data['batas'] = $model->find($id);

        return view('admin/edit_perbatasan', $data);
    }

    public function hapus_perbatasan($id)
    {
        $model = new PerbatasanModel();
        $model->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to(base_url('admin/data_perbatasan'));
    }
}
