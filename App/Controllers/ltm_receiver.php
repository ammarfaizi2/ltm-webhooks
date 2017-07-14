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
	}

	public function index()
	{

	}

	private function parseHeader()
	{
		$header = getallheaders();
	}

	public function ltm_receiver()
	{

	}
}