<?php
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);

	require ROOT.'/core/core.php';
	require ROOT.'/core/classes/DB.class.php';
	require ROOT.'/core/classes/User.class.php';

	if (isset($_GET['type']) && $_GET['type'] == "all") {
		DB::init();
		$stmt = DB::fetchAll('SELECT * FROM shop ORDER BY block_id ASC');

		echo json_encode($stmt);
	} else if (isset($_GET['type']) && $_GET['type'] == "buy") {

		if (User::checkSession() && isset($_GET['block_id'])) {
			$block_id = intval($_GET['block_id']);
			// INSERT INTO `shopcart` (`player`,`item`,`amount`) VALUES ('limito', '35:14', 32);
			$balance = User::getData('balance');

			$getBlock = DB::prepare('SELECT * FROM shop WHERE id = :block_id');
			$getBlock->bindParam(":block_id", $block_id);
			$getBlock->execute();

			$dataBlock = $getBlock->fetch(PDO::FETCH_LAZY);

			if ($dataBlock['price'] <= $balance) {
				$newBalance = intval($balance - $dataBlock['price']);
				$setBalance = DB::prepare('UPDATE users SET balance = :balance WHERE uid = :uid');
				$setBalance->bindParam(":uid", $_SESSION['uid']);
				$setBalance->bindParam(":balance", $newBalance);
				$setBalance->execute();

				if ($setBalance) {
					$login = User::getData("login");
					$addToCart = DB::prepare('INSERT INTO shopcart SET player = :login, item = :item, amount = :count');
					$addToCart->bindParam(":login", $login);
					$addToCart->bindParam(":item", $dataBlock['block_id']);
					$addToCart->bindParam(":count", $dataBlock['count']);
					$addToCart->execute();

					if ($addToCart) {
						exit(Core::getJsMessage(true, "Вы купили <b>".$dataBlock['name']." ".$dataBlock['count']." шт.</b> за <b>".$dataBlock['price']." руб.</b>"));
					} else {
						exit(Core::getJsMessage(false, "Ошибка, попробуйте через несколько секунд"));
					}
				} else {
					exit(Core::getJsMessage(false, "Ошибка, попробуйте через несколько секунд"));
				}
			} else {
				exit(Core::getJsMessage(false, "Ошибка, на Вашем счету недостаточно средств"));
			}
		} else {
			exit(Core::getJsMessage(false, "Пожалуйста, выберите предмет для покупки"));
		}

	}
?>