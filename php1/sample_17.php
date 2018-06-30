<?php

	if(isset($_COOKIE['my_id'])){
		$myId = $_COOKIE['my_id'];
	}else{
		$myId = '';
	}
?>

<form action = "sample17.php" method ="post">
	<dl>
		<dt>ID</dt>
		<dd>
			<input type ="text" name ="my_id" id ="my_id" value ="<?php echo $myId; ?>"/>
		</dd>
		<dt>パスワード</dt>
		<dd>
			<input type = "text" name ="password" id = "password">
		</dd>
		<dt>IDの保存</dt>
	</dl>
	<p>
		<input type ="checkbox" name ="save" id ="save" value ="on">
		<lavel for ="save">IDを保存する</lavel>
	</p>
		<input type="submit" value ="送信する">
</form>