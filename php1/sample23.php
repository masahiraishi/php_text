<?php
$file = $_FILES['my_img'];

print('ファイル名(name):'.$file['name'].'<br>');
print('アップロードしたファイル(tmp_name):'.$file[tmp_name].'<br>');
print('')
