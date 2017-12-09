<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->library('email');

		$test_config['protocol'] = 'smtp';
		//$test_config['smtp_host'] = 'ssl://email-smtp.us-east-1.amazonaws.com';
		//$test_config['smtp_port'] = '465';
		//$test_config['smtp_user'] = 'XXXXXXXXXXXXXXXXXXX';
		//$test_config['smtp_pass'] = 'YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY';
		$test_config['newline']      = "\r\n"; 

		$test_config['smtp_host'] = 'tls://email-smtp.us-west-2.amazonaws.com';
		$test_config['smtp_user'] = 'AKIAILCMT74ZPV3NZVHQ';
		$test_config['smtp_pass'] = 'AlohPvEFC54vdSTf4kY9+efbNdZESi/84SfRl0v5KVdy';
		$test_config['smtp_port'] = '587';
		$test_config['mailtype'] = 'html';

		$this->email->initialize($test_config);

		$this->email->from('support.mcbill@mcpayment.co.id', 'From at Test.com');
		$this->email->to('hendro3@gmail.com');

		$this->email->subject('Email Test');

		$htmlContent = '<h1>Mengirim email HTML dengan Codeigniter</h1>';
		$htmlContent .= '<div>Contoh pengiriman email yang memiliki tag HTML dengan menggunakan Codeigniter</div>';
		$this->email->message($htmlContent);

		$this->email->send();

		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */