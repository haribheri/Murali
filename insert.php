<?php

$postData = json_decode(file_get_contents('php://input'), true);

	$name=$postData["p_name"];
	$desease=$postData["disaese"];
	$pat_pics=$postData["fileToUpload"];
	$pat_video=$postData["videoToUpload"];
	$mobile=$postData["p_mobile"];
	$address=$postData["p_address"];

	$prescription=$postData["prescription"];
	$user_data=$postData["userData"];



/*	$name=$_REQUEST["p_name"];
	$desease=$_REQUEST["disaese"];
	$pat_pics=$_REQUEST["fileToUpload"];
	$pat_video=$_REQUEST["videoToUpload"];
	$mobile=$_REQUEST["p_mobile"];
	$address=$_REQUEST["p_address"];

	$prescription=$_REQUEST["prescription"];
	$user_data=$_REQUEST["userData"];
*/

//	$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=postgres password=1234") or die("pg_not connect");//home

$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office


//print "name is ".$name." found \n"; 
	if (isset($postData['p_name']) && $postData['p_name'] !='')
	{
		$name="'".$postData['p_name']."'";
	}
	else
	{
		$name='null';
	}


	if (isset($postData['disaese']) && $postData['disaese'] !='')
	{
		$desease="'".$postData['disaese']."'";
	}
	else
	{
		$desease='null';
	}
	if (isset($postData['fileToUpload']) && $postData['fileToUpload'] !='')
	{
		$pat_pics="'".$postData['fileToUpload']."'";
	}
	else
	{
		$pat_pics='null';
	}

	if (isset($postData['videoToUpload']) && $postData['videoToUpload'] !='')
	{
		$pat_video="'".$postData['videoToUpload']."'";
	}
	else
	{
		$pat_video='null';
	}

	if (isset($postData['p_mobile']) && $postData['p_mobile'] !='')
	{
		$mobile="'".$postData['p_mobile']."'";
	}
	else
	{
		$mobile='null';
	}
	if (isset($postData['p_address']) && $postData['p_address'] !='')
	{
		$address="'".$postData['p_address']."'";
	}
	else
	{
		$address='null';
	}
	if (isset($postData['prescription']) && $postData['prescription'] !='')
	{
		$prescription="'".$postData['prescription']."'";
	}
	else
	{
		$prescription='null';
	}
	if (isset($postData['userData']) && $postData['userData'] !='')
	{
		$user_data="'".$postData['userData']."'";
	}
	else
	{
		$user_data='null';
	}

//(pat_name text,disease text,joining_date timestamp, last_visit timestamp, pat_pics text, pat_video text, pat_mobile text,  pat_address text);

	$sql="insert into patient_details(pat_name,disease,pat_pics,pat_video,pat_mobile,pat_address)
		 values ($name,$desease,$pat_pics,$pat_video,$mobile,$address)";

	$res = pg_query($dbh, $sql);
        if(!$res)
        {
              echo pg_last_error($dbh);
        }
        else
        {
		echo "Records created successfully\n";
        }
?>

