<?php


class encdec extends connection
	{

		private $ciphering = "AES-128-CTR";
		private $iv_length ;
		private $options = 0;
		private $encryption_iv = '1234567891011121';
		private $encryption_key = "andhisnameisjohncena";

		public function encode($text){

				$this->iv_length = openssl_cipher_iv_length($ciphering);
				$encryption = openssl_encrypt($text, $this->ciphering,
            		$this->encryption_key, $this->options, $this->encryption_iv);
	            

	            return $encryption;
		}

		public function decode($hash){
				$this->iv_length = openssl_cipher_iv_length($ciphering);
				$decryption=openssl_decrypt ($hash, $this->ciphering, 
        		$this->encryption_key, $this->options, $this->encryption_iv);
	            

	            return $decryption;
		}
	}

?>