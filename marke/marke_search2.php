<!DOCTYPE html>
<html>
<link rel="stylesheet" href="marke.css">
	<head>
		<meta charset="utf8">
		<title>マーケ検索</title>
	</head>
	<body>
		<form method="POST" action="marke_search2.php">
			<table border="1">
				<tr>
					<td class="blue">名前</td>
					<td><input type="text" name="name" size=50></td>
				</tr>
				<tr>
					<td class="blue">会社名</td>
					<td><input type="text" name="company_name" size=50></td>
				</tr>
				<tr>
					<td class="blue">メールアドレス</td>
					<td><input type="text" name="email" size=70></td>
				</tr>
			</table>
				<p colspan="2">
					<input type="submit" value="検索">
				</p>
				<p colsapn="2">
					<a href="insert3.php">追加</a>
						<a href="">  削除</a>
				</p>

		</form>

<?php

	include	'sql.php';


	// 検索条件
	$where="";
	$sql="SELECT * FROM dl_user";

	if(!empty($_POST['name'])){
		$where ="name LIKE '%".$_POST['name']."%'";
	}


	if(!empty($_POST['company_name'])){
		if (empty($where)){
			$where ="company_name LIKE'%".$_POST['company_name']."%'";
		}else{
			$where .= "AND company_name LIKE '%".$_POST['company_name']."%'";
		}
	}

	if(!empty($_POST['email'])){
		if (empty($where)){
			$where ="email LIKE '%".$_POST['email']."%'";
		}else{
			$where .="AND email LIKE '%".$_POST['email']."%'";
		}
	}



	if(!empty($where)){
		$sql.=" WHERE ".$where;
	}

	$sql .= " ORDER BY name ASC";
	echo $sql;

	$result_usr=mysql_query($sql,$dbconn);


	echo "<table border=\"1\">";
	echo "<tr>";
	echo "<th class=blue></th><th class=blue>名前</th><th class=blue>会社名</th><th class=blue>メールアドレス</th>";
	echo"</tr>";
		while($arr_usr=mysql_fetch_assoc($result_usr)){
			echo "<tr>
					<td>$arr_usr[user_id]</td>
					<td>$arr_usr[name]</td><
					td>$arr_usr[company_name]</td>
					<td>$arr_usr[email]</td>
					<td>
						<a href=\"delete.php?user_id=". $arr_ussr[user_id] . "\">削除</a>
					</td>
				</tr>";
			}
	echo "</table>";

	?>
	</body>
</html>