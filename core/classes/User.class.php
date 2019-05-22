<?php

	session_start();
	DB::init();

	class User {

		public static function checkSession () {
			if (!empty($_SESSION['uid'])) {
				return true;
			} else {
				return false;
			}
		}

		public static function setSession ($uid) {
			$_SESSION['uid'] = $uid;
		}

		public static function clearSession () {
			unset($_SESSION['uid']);
			header("Location: /");
		}

		public static function getData ($row) {
			$stmt = DB::prepare("SELECT * FROM users WHERE uid = :uid");
			$stmt->bindParam(":uid", $_SESSION['uid']);
			$stmt->execute();

			$data = $stmt->fetch(PDO::FETCH_LAZY);

			return $data[$row];
		}

		/*
		* $row = указывает на то, что именно нужно вытащить, например "name" - название группы
		*/
		public static function getGroup ($row) {
			$stmt = DB::prepare("SELECT * FROM groups WHERE level = :level");
			$group = User::getData('group');
			$stmt->bindParam(":level", $group);
			$stmt->execute();

			$data = $stmt->fetch(PDO::FETCH_LAZY);

			return $data[$row];
		}

		public static function getRegDate() {
			$stmt = DB::prepare("SELECT reg_date FROM users WHERE uid = :uid");
			$stmt->bindParam(":uid", $_SESSION['uid']);
			$stmt->execute();

			$data = $stmt->fetch(PDO::FETCH_LAZY);
			$data = $data['reg_date'];

			$reg_date = new DateTime($data);


			$time = strtotime($data);
			$times = date("Y.m.d в H:i", $time);
			$diff = self::getIntervalDate($time);

			return $times." ({$diff})";
		}

		public static function getIntervalDate ($date) {
			$now = time();
			$datediff = $now - $date;
			$days = floor($datediff / (60 * 60 * 24));
			$hours = floor($datediff/3600);
			$minutes = floor(($datediff % 3600)/60);
			$str = "";

			if ($days > 0) {
				$str = "{$days} дней назад";
			} else if ($hours > 0) {
				$str = "{$hours} часа назад";
			} else if ($minutes > 0) {
				$str = "{$minutes} минут назад";
			} else {
				$str = "только что";
			}

			return $str;
		}	
	}

?>