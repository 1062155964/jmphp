<?php
 	require("../../conn.php");
	header("Access-Control-Allow-Origin: *"); // 允许任意域名发起的跨域请求
 	$sqldata='';
 	$sql="SELECT * from `workshop_k` where isfinish = '2'";
 	$result = $conn->query($sql);
 	while ($row = $result->fetch_assoc()) {
		$sqldata=$sqldata.'{
			"Serial":"'.$row["route"].'",
			"name":"'.$row["name"].'",
			"Group":"'.$row["station"].'",
			"time":"'.$row["schedule_date"].'",
			"finished":"'.$row["otime"].'",
			"Remarks":"'.$row["station"].'"
		},';
	}
 	$jsonresult = 'true';
	$otherdate = '{"success":"'.$jsonresult.'"
		      }';
	$json = '['.$sqldata.$otherdate.']';
	echo $json;
?>