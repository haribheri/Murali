<?php

	//$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=postgres password=1234") or die("pg_not connect");//home

	$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office


	$postData = json_decode(file_get_contents('php://input'), true);

	$name=$postData["p_name"];
	//$name='a';


//patient_details(pat_name text,disease text,joining_date timestamp, last_visit timestamp, pat_pics text, pat_video text, pat_mobile text,  pat_address text);

	$sql1= "select * from (select pat_name,disease,last_visit,pat_mobile,pat_address,pat_video,pat_pics,row_number() over() rn from patient_details where pat_name like '%$name%')a";

	$res = pg_query($dbh, $sql1);

	if(!$res)
	{
		echo pg_last_error($dbh);
	}
	$result=pg_fetch_all($res);

	print json_encode($result);

	pg_close($dbh);
?>
