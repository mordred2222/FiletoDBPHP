<?php
// This file just dump the table content in a fil

$content="";

require "dbcon.php";

mysql_set_charset('utf8');

$CC=$_GET["value to filter"];

	
	$table="enter here the name of your table";
	$listOfFields=array();
	$sql="SHOW FULL FIELDS FROM $table";
	$result=mysql_query($sql);
	while ($myrow=mysql_fetch_array($result)){
	$elmntb=$myrow["Field"];
	array_push($listOfFields,$elmntb);
	$xls.="\"".($elmntb)."\";";
	}
	$xls.="\n";
	
	$sql="SELECT * FROM $table WHERE something='$somevalue' ";
	$result=mysql_query($sql);
	while ($myrow=mysql_fetch_array($result)){
	
	
	foreach ($listOfFields AS $field){
	
	$elmntb=$myrow[$field];;
	$xls.="\"".utf8_decode($elmntb)."\";";
	
	
	}
	
	$xls.="\n";
	
}


		$filename="<Name of the file>-".date("Y-m-d").".csv";
    header("Content-Type: text/csv ; charset=utf-8");
    header("Content-Disposition: attachment; filename=\"$filename\"");
		echo $xls;




?>
