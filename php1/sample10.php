<form action="" method="get">
	<dl>
		<dt>商品</dt>
		<dd>
<?php
		$item = array('a-1'=>'ガム','b-1'=>'チョコレート','c-3'=>'クッキー');
		foreach ($item as $itemKey =>$itemValue){
			print ('<input type = " checkbox" id ="'.$itemKey.'" value ="'.$itemKey.'">
				<label for="'.$itemKey.'">'.$itemKey.'</label>');
		}
?>
		</dd>
	</dl>
</form>