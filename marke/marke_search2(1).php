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
			<div class="button">
				<input type="submit" value="検索">
			</div>
		</form>
		<form method="POST" action="insert3.php">
			<input type="submit" value="追加">
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
	echo "<th class=blue></th><th class=blue>名前</th><th class=blue>会社名</th><th class=blue>メールアドレス</th><th>削除</th><th>更新</th>";
	echo"</tr>";
		while($arr_usr=mysql_fetch_assoc($result_usr)){
?>

			<tr>
				<td><?php echo $arr_usr['user_id']; ?></td>
				<td><?php echo $arr_usr['name']; ?></td>
				<td><?php echo $arr_usr['company_name']; ?></td>
				<td><?php echo $arr_usr['email']; ?></td>
				<td>
					<form action = "delete.php" method="POST">
					<input type = "submit" value="削除する">
					<input type = "hidden" name ="user_id" value = "<?php $arr_usr['user_id']; ?>">
				</td>
				<td>
					<form action = "update.php" method = "POST">
					<input type = "submit" value = "更新">
					<input type = "hidden" name = "user_id" value ="<?php $arr_usr['user_id']; ?>">
				</td>
			</tr>

<?php
			}
	echo "</table>";

	?>
	</body>
</html>