<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"> 
	<title>随机人名生成器</title>
</head>
<?php
include "connector.php";
$connector=new Connector;
$connector->connect();

$connector->query("select count(*) from family_name");
list($count_family)=mysql_fetch_row($connector->result);

for($i=0;$i<=9;$i++){
	$Id=rand(1,$count_family);
	$connector->query("select name from family_name where Id=".$Id);
	list($family_name[$i])=mysql_fetch_row($connector->result);
}

$connector->query("select count(*) from first_name");
list($count_first)=mysql_fetch_row($connector->result);

for($i=0;$i<=9;$i++){
	$name_length=rand(1,2);
	$first_name[$i]="";
	for($j=1;$j<=$name_length;$j++){
		$Id=rand(1,$count_first);
		$connector->query("select name from first_name where Id=".$Id);
		list($name_buffer)=mysql_fetch_row($connector->result);
		$first_name[$i].=$name_buffer;
	}
}


$connector->disconnect();
?>
<body>
<h1>本页面随机生成十个人名。刷新可重新生成。</h1>
<?php
for($i=0;$i<=9;$i++){
	echo $family_name[$i].$first_name[$i]."<br/>";
}
?>
</body>
</html>
