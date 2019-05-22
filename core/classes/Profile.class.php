<?php
	class Profile {

		function __construct () {
			DB::init();

		}

		public static function getProfile ($row) {
			$uid = $_GET['user'];
			if (isset($uid)) {
				$stmt = DB::prepare("SELECT * FROM users WHERE uid = :uid ");
				$stmt->bindParam(":uid", $uid);
				$stmt->execute();

				$data = $stmt->fetch(PDO::FETCH_LAZY);

				return $data[$row];
			}
		}

		/*
		* $row = указывает на то, что именно нужно вытащить, например "name" - название группы
		*/
		public function getProfileGroup ($row) {
			$stmt = DB::prepare("SELECT * FROM groups WHERE level = :level");
			$stmt->bindParam(":level", Profile::getProfile('group'));
			$stmt->execute();

			$data = $stmt->fetch(PDO::FETCH_LAZY);

			return $data[$row];
		}

		public static function getRegProfile() {
			$uid = $_GET['user'];
			$stmt = DB::prepare("SELECT reg_date FROM users WHERE uid = :uid");
			$stmt->bindParam(":uid", $uid);
			$stmt->execute();

			$data = $stmt->fetch(PDO::FETCH_LAZY);
			$data = $data['reg_date'];

			$reg_date = new DateTime($data);


			$time = strtotime($data);
			$times = date("Y.m.d в H:i", $time);
			$diff = User::getIntervalDate($time);

			return $times." ({$diff})";
		}

	}

?>