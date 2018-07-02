<form action = "sample19.php" method ="post">
	<dl>
		<dt>送信先(To)</dt>
		<dd>
			<input name ="email" type ="text" id ="email" size ="50" maxlength="255">
		</dd>
		<dt>サブジェクト</dt>
		<dd>
			<input name = "subject" type = "text" id = "subject" size ="50" maxlength="255">
		</dd>
		<dt>内容</dt>
		<dd>
			<textarea name = "message" id = "message" cols ="50" rows = "10"></textarea>
		</dd>
	</dl>
	<input type ="submit" value ="送信する">
</form>