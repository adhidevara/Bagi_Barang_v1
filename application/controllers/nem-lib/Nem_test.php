<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/nem-lib/nem-php.php';

class Nem_test extends CI_Controller
{
	public function config()
	{
		$config = [
			'net' => 'testnet',
			'nis_address' => 'http://localhost:7890',
			'private' => 'b0d702aa81007286bf72e3d2416e248e4034a1f3d7681c8cc035cf8b467c8c0c',
			'public' => '1fb28e2f003bb1eee8c60eef5f0f766b6f488c3467e4140e4e904201b1a3b9f4',
			'security_check' => false //leave it true if you are not sure;
		];

		return new NemPhp($config);
	}

	public function sendNem()
	{
		$nemPhp = $this->config();

		//Prepare transaction
		$nemPhp->prepareTransaction(
			2, //How much XEM to send
			0, //Put higher fee if you want, otherwise leave it zero so minimum fee will be taken off
			'TDXM7K-N34SND-CCTSJI-FACAES-EYZTIL-EE47OW-RMH7', //adress where to send
			null,
			'IKI TES GAWE NIS LOCALHOST (SUKSES)'
		);

		//You can check your future transaction before sending
		print_r($nemPhp->transaction);

		//Or get estimated transaction fee in microXEM (actual amount in XEM will be divided vy 1000000)
		echo $nemPhp->transaction['fee'];

		//And commit transaction to the network (you shoud almost immidiately hear 'dink' sound from you wallet
		$result = $nemPhp->commitTransaction();

//		//See how its gone
		print_r($result);
	}
}
?>
