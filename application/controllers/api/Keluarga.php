<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class Keluarga extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keluarga_model', 'keluarga');
    }


    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {

            $keluarga = $this->keluarga->getKeluarga();
        } else {
            $keluarga = $this->keluarga->getKeluarga($id);
        }

        if ($keluarga) {
            $this->response([
                'status' => true,
                'data' => $keluarga
            ], REST_Controller::HTTP_OK);
        } else {
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
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->keluarga->deleteKeluarga($id) > 0) {
                $this->response([
                    'status' => true,
                    $message = 'message' => 'deleted',
                    'id' => $id
                ], $message, REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->keluarga->createKeluarga($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new keluarga created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed created keluarga'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {

        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->keluarga->updateKeluarga($data, $id) > 0) {
            $this->response([
                'status' => true,
                $message = 'message' => 'new keluarga updated'
            ], $message, REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed update keluarga'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
