<?php


namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArtikelModel;


class Post extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    public function create() 
    { 
        $model = new ArtikelModel(); 
        $data = [ 
            'judul' => $this->request->getVar('judul'), 
            'isi'  => $this->request->getVar('isi'), 
        ]; 
        $model->insert($data); 
        $response = [ 
            'status'   => 201, 
            'error'    => null, 
            'messages' => [ 
                'success' => 'Data artikel berhasil ditambahkan.' 
            ] 
        ]; 
        return $this->respondCreated($response); 
    }
    
    public function show($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->find($id); 
        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Data tidak ditemukan.');
    }

    

    public function update($id = null)
    {
        $model = new ArtikelModel();

        $existingData = $model->find($id);
        if (!$existingData) {
            return $this->failNotFound('Data tidak ditemukan untuk diubah.');
        }
        parse_str($this->request->getBody(), $data);

        $updateData = array_filter($data, function($value) {
            return $value !== null && $value !== '';
        });

        if (empty($updateData)) {
            return $this->fail('Tidak ada data yang dikirim untuk diubah.', 400);
        }

        $model->update($id, $updateData);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data artikel berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }

  
    public function delete($id = null)
    {
        $model = new ArtikelModel();

        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data artikel berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        }
        
        return $this->failNotFound('Data tidak ditemukan.');
    }
}
