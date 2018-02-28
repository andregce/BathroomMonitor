
<?php
	
	require("./config/Db.php");

	$db = new DB();
	set_exception_handler(function ($e) {
	  $code = $e->getCode() ?: 400;
	  header("Content-Type: application/json", NULL, $code);
	  echo json_encode(["error" => $e->getMessage()]);
	  exit;
	});

 	$rows = $db -> select("SELECT flagStatus, lastUpdate FROM andreg_net.flags where flagName = 'HallSensor';");

	$lastUpdate = new DateTime($rows[0]['lastUpdate']);
	$flagStatus = $rows[0]['flagStatus'];

	$diff = strtotime(date("Y-m-d H:i:s")) - strtotime($rows[0]['lastUpdate']);

 	if (($flagStatus == "1")) {
 		if ($diff < 10){
	 		echo "1";
 		} else {

	        $sql = "UPDATE flags SET lastUpdate = '" . date("Y-m-d H:i:s") . "', flagStatus = 0 WHERE id = 1;";
	        $rows = $db -> query($sql);
	        
 		}
 	} else {
 		echo "0";
 	}

?>