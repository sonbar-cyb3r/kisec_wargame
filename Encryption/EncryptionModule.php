<?php
	$EncryptionKeyArr = parse_ini_file("../ConfigureFile/EncryptionKey.ini");
	$iv = $EncryptionKeyArr["InitializationVector"];
	$EncryptionKey = $EncryptionKeyArr["EncryptionKey"];
	$EncryptionKey= $EncryptionKey.date('YmdH');
	function encrypt($string) {
		$enc = "";
		global $iv;
		global $EncryptionKey;
		$enc=mcrypt_cbc (MCRYPT_TripleDES, $EncryptionKey, $string, MCRYPT_ENCRYPT, $iv);
		return base64_encode($enc);
	}

	function decrypt($string) {
		$dec = "";
		$string = trim(base64_decode($string));
		global $iv;
		global $EncryptionKey;
		$dec = mcrypt_cbc (MCRYPT_TripleDES, $EncryptionKey, $string, MCRYPT_DECRYPT, $iv);
		return trim($dec);
	}

	function PaymentCostEncryption($string) {
		$enc = "";
		$iv = "hadongha";
		$EncryptionKey = "hackerfactory!0909!12345";
		$enc=mcrypt_cbc (MCRYPT_TripleDES, $EncryptionKey, $string, MCRYPT_ENCRYPT, $iv);
		return base64_encode($enc);
	}	
	
	function PaymentCostDecryption($string) {
		$dec = "";
		$string = trim(base64_decode($string));
		$iv = "hadongha";
		$EncryptionKey = "hackerfactory!0909!12345";
		$dec = mcrypt_cbc (MCRYPT_TripleDES, $EncryptionKey, $string, MCRYPT_DECRYPT, $iv);
		return trim($dec);
	}
	
	// 회원 별 발급키 차별화 로직 추가!
	function AuthenticationKeyCreate($grade, $stage, $memerid) {
		$AuthenticationKeyArr = parse_ini_file("../ConfigureFile/AuthenticationKey.ini",true);
		
		if ($grade == "1") {
			$GradeIdx = "Elementary";
		} else if ($grade == "2") {
			$GradeIdx = "Intermediate";
		} else if ($grade == "3") {
			$GradeIdx = "Advanced";
		}
		
		// 키 값 추출
		$AuthenticationKey = $AuthenticationKeyArr[$GradeIdx][$stage."_KEY"];
		// 최종 키 값 조합 : 키 값 + 회원 아이디
		$FinalKey = $AuthenticationKey.$memerid;
		
		$enc = "";
		global $iv;
		global $EncryptionKey;
		$enc=mcrypt_cbc (MCRYPT_TripleDES, $EncryptionKey, $FinalKey, MCRYPT_ENCRYPT, $iv);
		return trim(base64_encode($enc));		
	}
	
	function AuthenticationKeyDecrypt($string) {
		$dec = "";
		$string = trim(base64_decode($string));
		global $iv;
		global $EncryptionKey;
		$dec = mcrypt_cbc (MCRYPT_TripleDES, $EncryptionKey, $string, MCRYPT_DECRYPT, $iv);
		return trim($dec);
	}

?>
