<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/nem-lib/nem-php.php';
require_once APPPATH.'controllers/pengelola/C_pengelola.php';

class Nem_test extends CI_Controller
{
	public function config()
	{
		$config = [
			'net' => 'testnet',
			'nis_address' => 'http://localhost:7890',
			'private' => 'b0d702aa81007286bf72e3d2416e248e4034a1f3d7681c8cc035cf8b467c8c0c',
			'public' => '1fb28e2f003bb1eee8c60eef5f0f766b6f488c3467e4140e4e904201b1a3b9f4',
			'security_check' => true //leave it true if you are not sure];
		];
		return new NemPhp($config);
	}
}
?>
