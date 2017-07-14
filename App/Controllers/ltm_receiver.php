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
		http_response_code(200);
		if ($this->insert(json_decode(file_get_contents("php://input"), true))){
			die(json_encode(["status"=>"ok"]));
		} else {
			die(json_encode(["status"=>"error"]));
		}
	}

	private function insert($d)
	{
		$pdo = new \PDO("pgsql:dbname=ltm_chat;host=localhost;port=5432", "postgres", "ltm123");
		$st = $pdo->prepare("INSERT INTO reply_logs (id, actor, text, reply_to_actor, reply_to_text, time) VALUES (:id, :actor, :text, :reply_to_actor, :reply_to_text, :time);");
		$exe = $st->execute($d);
		$st = $pdo = null;
		return $exe;
	}

	private function authCheck()
	{
		return 
			isset($_SERVER['REMOTE_ADDR']) &&
			isset($_SERVER['HTTP_AUTHORIZATION']) && 
			isset($_SERVER['HTTP_X_SERVER_SIGNATURE']) &&
			$_SERVER['HTTP_AUTHORIZATION'] === $this->auth['Auth'] && 
			sha1(base64_decode($_SERVER['HTTP_X_SERVER_SIGNATURE'])) === $this->auth['ServerSignature']
		;
	}
}
