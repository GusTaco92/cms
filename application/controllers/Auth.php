<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_auth');
		$this->load->model('google_login_model');
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{
		include_once APPPATH . "libraries/vendor/autoload.php";

		$google_client = new Google_Client();
		$google_client->setClientId('338345927919-chd4jrcr1g2ajb0kc63ri434pm90k960.apps.googleusercontent.com'); //Define your ClientID
		$google_client->setClientSecret('g6uSO_WbSLMgpNGuTtOCYgdC'); //Define your Client Secret Key
		// $google_client->setRedirectUri('http://localhost/auth/login'); //Define your Redirect Uri
		$google_client->setRedirectUri('http://cms.colegiomexicodelsureste.edu.mx/auth/login'); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');
		$google_client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
		if(isset($_GET["code"]))
		{
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if(!isset($token["error"]))
			{
				$google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token', $token['access_token']);
				$google_service = new Google_Service_Oauth2($google_client);
				$data = $google_service->userinfo->get();
				$current_datetime = date('Y-m-d H:i:s');
				$cuentaUsuData=$this->google_login_model->Is_already_register($data['id'],$data['email']);
				$infoUsu=$cuentaUsuData->result();
				if($cuentaUsuData->num_rows() > 0)
				{
					//update data
					$user_data = array(
					'id' => $infoUsu[0]->id,
					'login_oauth_uid' => $data['id'],
					'firstname' => $data['given_name'],
					'lastname'  => $data['family_name'],
					'email' => $data['email'],
					'profile_picture'=> $data['picture'],
					'update' => $current_datetime
					);
					$this->google_login_model->Update_user_data($user_data, $infoUsu[0]->id);
					$this->session->set_userdata($user_data);
				}
				else
				{
					$this->data['errors'] = 'Correo no existe';
					$this->session->unset_userdata('access_token');
				// 	//insert data
				// 	$user_data = array(
				// 	'login_oauth_uid' => $data['id'],
				// 	'firstname'  => $data['given_name'],
				// 	'lastname'   => $data['family_name'],
				// 	'email'  => $data['email'],
				// 	'profile_picture' => $data['picture'],
				// 	'create'  => $current_datetime
				// 	);
				// 	$this->google_login_model->Insert_user_data($user_data);
				}
			}
		}
		if(!$this->session->userdata('access_token'))
		{
			// $data['login_button'] = $google_client->createAuthUrl();
			// $this->load->view('login.php', $data);
			$this->logged_in();
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE) {
				// true case
				$email_exists = $this->model_auth->check_email($this->input->post('email'));

				if($email_exists == TRUE) {
					$login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

					if($login){
						$logged_in_sess = array(
							'id' => $login['id'],
							'username'  => $login['username'],
							'email'     => $login['email'],
							'profile_picture'=> $login['profile_picture'],
							'logged_in' => TRUE,
							'seccion' => $login['seccion']
						);

						$this->session->set_userdata($logged_in_sess);
						redirect('dashboard', 'refresh');
					}
					else {
						$this->data['errors'] = 'Usuario incorrecto/contraseña incorrecta';
						$this->data['login_button']=$google_client->createAuthUrl();
						$this->load->view('login', $this->data);
					}
				}
				else {
					$this->data['errors'] = 'Correo no existe';
					$this->data['login_button']=$google_client->createAuthUrl();
					$this->load->view('login', $this->data);
				}	
			}else {
				// false case
				$this->data['login_button']=$google_client->createAuthUrl();
				$this->load->view('login', $this->data);
			}


		}
		else
		{
			$this->session->set_userdata('logged_in', TRUE);
			redirect('dashboard', 'refresh');
		}
	}

	public function login2()
	{
		include_once APPPATH . "libraries/vendor/autoload.php";

		$google_client = new Google_Client();
		$google_client->setClientId('338345927919-chd4jrcr1g2ajb0kc63ri434pm90k960.apps.googleusercontent.com'); //Define your ClientID
		$google_client->setClientSecret('g6uSO_WbSLMgpNGuTtOCYgdC'); //Define your Client Secret Key
		$google_client->setRedirectUri('http://localhost/auth/login'); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');
		// $google_client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
		if(isset($_GET["code"]))
		{
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

			if(!isset($token["error"]))
			{
				$google_client->setAccessToken($token['access_token']);

				$this->session->set_userdata('access_token', $token['access_token']);

				$google_service = new Google_Service_Oauth2($google_client);

				$data = $google_service->userinfo->get();

				$current_datetime = date('Y-m-d H:i:s');

				if($this->google_login_model->Is_already_register($data['id']))
				{
					//update data
					$user_data = array(
					'firstname' => $data['given_name'],
					'lastname'  => $data['family_name'],
					'email' => $data['email'],
					'profile_picture'=> $data['picture'],
					'update' => $current_datetime,
					);

					$this->google_login_model->Update_user_data($user_data, $data['id']);
				}
				else
				{
					//insert data
					$user_data = array(
					'login_oauth_uid' => $data['id'],
					'firstname'  => $data['given_name'],
					'lastname'   => $data['family_name'],
					'email'  => $data['email'],
					'profile_picture' => $data['picture'],
					'create'  => $current_datetime
					);

					$this->google_login_model->Insert_user_data($user_data);
				}
				$this->session->set_userdata('user_data', $user_data);
			}
		}
		$login_button = '';
		if(!$this->session->userdata('access_token'))
		{
			$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="http://www.0800flor.net/wp-content/uploads/2017/07/Qu%C3%A9-es-y-para-qu%C3%A9-sirve-el-nuevo-bot%C3%B3n-de-Google.png" /></a>';
			$data['login_button'] = $login_button;
			$this->load->view('loginG.php', $data);
		}
		else
		{
			$this->load->view('loginG.php', $data);
		}
	}
	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}

}
