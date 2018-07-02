<?php
$name = htmlspecialchars($_REQUEST['my_name'],ENT_QUOTES);

?>

<p>ようこそ<?php print($name) ?>さん</p>
<ul>
	<li>
		<a href = "#"><?php print($name); ?>さんのマイページを見る</a>
	</li>
</ul>

