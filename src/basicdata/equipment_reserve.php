<?php
	require("../../conn.php");
	$ret_data = '';
	$ret_data["success"] = 'success';
	$number = isset($_POST["number"])?$_POST["number"] : '';
	$name = isset($_POST["name"])?$_POST["name"] : '';
	$state = isset($_POST["state"])?$_POST["state"] : '';
	$workcenter = isset($_POST["workcenter"])?$_POST["workcenter"] : '';
	$checkrequest = isset($_POST["checkrequest"])?$_POST["checkrequest"] : '';
	$tallyposition = isset($_POST["tallyposition"])?$_POST["tallyposition"] : '';
	$tallycycle = isset($_POST["tallycycle"])?$_POST["tallycycle"] : '';
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$sql ="UPDATE equipment SET number='$number',name='$name',state='$state',workcenter='$workcenter',checkrequest='$checkrequest',tallyposition='$tallyposition',tallycycle='$tallycycle',add_time=NOW() WHERE id='$id'";
		$res = $conn->query($sql);
	}else {
		$sql = "INSERT INTO equipment (number,name,state,workcenter,checkrequest,tallyposition,tallycycle,add_time) VALUES ('$number','$name','$state','$workcenter','$checkrequest','$tallyposition','$tallycycle',NOW())";
		$res = $conn->query($sql);
	}
	$conn->close();
	$json=json_encode($ret_data);
	echo $json
?>