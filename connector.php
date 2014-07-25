<?php
class Connector{
	var $result="";
	var $link=0;
	var $ip="localhost";
	var $user="root";
	var $password="root";
	var $db="mafm";
	
	function connect(){
		//connect mysql
		$this->link=mysql_connect($this->ip,$this->user,$this->password);
		if(!$this->link){
			die("connect failed");
		}
		
		//select database
		$get_db=mysql_select_db($this->db,$this->link);
		if(!$get_db){
			mysql_close($this->link);
			die("database error");
		}
		
		//set characterset
		mysql_query("set names 'utf8'");
	}
	
	function disconnect(){
		mysql_close($this->link);
	}
	
	function query($str){
		$this->result=mysql_query($str,$this->link);
	}
}
?>