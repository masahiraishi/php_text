<?php

	if(! ($dbconn=mysql_connect("localhost","root","0000")) ){
		echo "MYSQLへの接続に失敗しました。";
		exit;
	}else{
		$db_selected=mysql_select_db('hiraishi',$dbconn);
		if($db_selected){
			mysql_query("set names utf8");
		}

	}