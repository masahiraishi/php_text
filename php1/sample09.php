<select name ="pref" id ="pref">
<?php
	$prefs =array(
		'北海道',
		'青森県',
		'岩手県',
		'秋田県',
		'宮城県'
	);
	foreach($prefs as $pref){
		print('<option value= "'.$pref.'">'.$pref.'</option>' );
	}
	for ($i=0;$i=47;$i++){
		print ('<option value= "'.$prefs[$i].'">'.$pref[$i].'</option> ');
	}

?>
</select>