<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('ApiUser_model', 'apiuser');
    }

    public function post()
    {
        $post = $this->apiuser->getPost();
        if($post->num_rows() > 0)
        {
            echo json_encode(array(
                'result'        => $post->result(),
            ), TRUE);
            $this->output->set_status_header(200);
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Data Kosong'
            ));
            $this->output->set_status_header(422);
        }
    }
}
