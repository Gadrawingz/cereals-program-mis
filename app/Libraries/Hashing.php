<?php

namespace App\Libraries;

class Hashing {

	public static function make($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public static function checkPassword($entered_pass, $db_pass) {
		if(password_verify($entered_pass, $db_pass)) {
			return true;
		} else {
			return false;
		}
	}
}
?>