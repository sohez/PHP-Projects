<?php
class AESUtil {
	public static function encryptBase64($plaintext, $key) {
		$data = AESUtil::encrypt($plaintext, $key);
		$data = base64_encode($data);
		return $data; 
	}
	public static function encryptHexStr($plaintext, $key) {
		$data = AESUtil::encrypt($plaintext, $key);
		$data = bin2hex($data);
		return $data; 
	}
 
	public static function decryptBase64($ciphertext, $key) {
		$ciphertext = base64_decode($ciphertext);
		$plaintext = AESUtil::decrypt($ciphertext, $key);	
		return $plaintext; 
	}
	public static function decryptHexStr($ciphertext, $key) {
		$ciphertext = hex2bin($ciphertext);
		$plaintext = AESUtil::decrypt($ciphertext, $key);	
		return $plaintext; 
	}
	
	private static function encrypt($plaintext, $key) {
		return openssl_encrypt($plaintext, "aes-128-ecb", $key, OPENSSL_RAW_DATA); 
	}
	
	private static function decrypt($ciphertext, $key) {
		return openssl_decrypt($ciphertext, "aes-128-ecb", $key, OPENSSL_RAW_DATA); 
	}	
}
?>