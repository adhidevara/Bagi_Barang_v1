<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nem extends CI_Model {

	protected $url = "http://hugetestalice.nem.ninja:7890";

	//NEM ENDPOINT
	public function getAddress($address)
	{
		$endpoint = $this->url."/account/get?address=".$address;
		return json_decode(file_get_contents($endpoint));
	}

	public function getFromPublicKey($publicKey)
	{
		$endpoint = $this->url."/account/get/from-public-key?publicKey=".$publicKey;
		return json_decode(file_get_contents($endpoint));
	}

	//type : outgoing, incoming,
	public function getTransfer($address, $type = "all", $hash = "", $id = "")
	{
		$endpoint = $this->url."/account/transfers/".$type."?address=".$address.$hash.$id;
		return json_decode(file_get_contents($endpoint));
	}

	public function getUnconfirmedTransactions($address)
	{
		$endpoint = $this->url."/account/unconfirmedTransactions?address=".$address;
		return json_decode(file_get_contents($endpoint));
	}
}

/* End of file .php */
