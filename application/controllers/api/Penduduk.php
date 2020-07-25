<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';



class Penduduk extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Penduduk_model', 'penduduk');
    }


    function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $penduduk = $this->penduduk->getPenduduk();
        } else {
            $penduduk = $this->penduduk->getPenduduk($id);
        }

        if ($penduduk) {
            $this->response([
                'status' => true,
                'data' => $penduduk
            ], REST_Controller::HTTP_OK);
        } else {
            // jika id kosong
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            // jika id kosong
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->penduduk->deletePenduduk($id)) {
                // jika id ok
                $this->response([
                    'status' => true,
                    $message = 'message' => 'deleted',
                    'id' => $id
                ], $message, REST_Controller::HTTP_NO_CONTENT);
            } else {
                // jika id tidak ada
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }


    public function index_post()
    {

        $data = [
            'id_nik' => $this->post('id_nik'),
            'id_kk' => $this->post('id_kk'),
            'nama' => $this->post('nama'),
            'tempat_lahir' => $this->post('tempat_lahir'),
            'tanggal_lahir' => $this->post('tanggal_lahir'),
            'jk' => $this->post('jk'),
            'status' => $this->post('status'),
            'alamat' => $this->post('alamat'),
            'pekerjaan' => $this->post('pekerjaan'),
            'kewarganegaraan' => $this->post('kewarganegaraan'),
            'agama' => $this->post('agama')
        ];

        if ($this->penduduk->createPenduduk($data) > 0) {
            // jika data input valid
            $this->response([
                'status' => true,
                'message' => 'new data created!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                // gagal
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'id_nik' => $this->put('id_nik'),
            'id_kk' => $this->put('id_kk'),
            'nama' => $this->put('nama'),
            'tempat_lahir' => $this->put('tempat_lahir'),
            'tanggal_lahir' => $this->put('tanggal_lahir'),
            'jk' => $this->put('jk'),
            'status' => $this->put('status'),
            'alamat' => $this->put('alamat'),
            'pekerjaan' => $this->put('pekerjaan'),
            'kewarganegaraan' => $this->put('kewarganegaraan'),
            'agama' => $this->put('agama')
        ];

        if ($this->penduduk->updatePenduduk($data, $id)) {
            $this->response([
                'status' => true,
                $message = 'message' => 'data updated'
            ], $message, REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
