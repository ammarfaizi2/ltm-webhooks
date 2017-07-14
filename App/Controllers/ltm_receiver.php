<?php

namespace App\Controllers;

use System\Controller;


class ltm_receiver extends Controller
{
	/**
	 * Constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->auth = [
			"Host" => "127.0.0.1",
			"Auth" => "Bearer 9f72ad0976afea10f58ee647b89533406f6140b4f0312c14e9ccbe06486aca0af23e5506",
			"ServerSignature" => "1b8553b5465ca7bab4a5bcf57aa42c4f2b1281aa"
		];
	}

	public function index()
	{
		if (!$this->authCheck()) {
			http_response_code(403);
			die();
		}
		die("OK");
	}

	private function authCheck()
	{
		return 
			isset($_SERVER['REMOTE_ADDR']) &&
			isset($_SERVER['HTTP_AUTHORIZATION']) && 
			isset($_SERVER['HTTP_X_SERVER_SIGNATURE']) &&
			$_SERVER['HTTP_AUTHORIZATION'] === $this->auth['Auth'] && 
			sha1(base64_decode($_SERVER['HTTP_X_SERVER_SIGNATURE'])) === $this->auth['ServerSignature'] &&
			$_SERVER['REMOTE_ADDR'] === $this->auth['Host']
		;
	}
}