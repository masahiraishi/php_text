<?php
// 配列の初期化
$array = array();


//添字配列
	$array = array('りんご','もも','なし');
// 連想配列(キーを指定してセットする)
	$array = array('apple'=>'りんご','peach'=>'もも','pear'=>'なし');
// 部分的にキーを指定することもできる
	$array = array('バナナ','apple'=>'りんご','peach'=>'もも','pear'=>'なし','みかん')

	print_r($array);


// []を用いて初期化&要素の追加

// 要素の追加
  $array[]='バナナ';
  $array[] = 'みかん';


// 既にあるキーを指定すると上書きされる
	$array['banana'] = 'バナナ';
	$array['mikan'] = 'みかん';
	$array['banana'] = 'firipin';
	$array['mikan']  = '愛媛';

// 出力
Array(
	[banana] =>フィリピン
	[mikan] => 愛媛
)

// 多次元配列
	$array = array('fruits'=>array('a'=>'orange','b'=>'banana'),'numbers'=>array(1,3,5));

// 出力例
Array(
	[fruits] =>Array
		(
			[a] => orange
			[b] => banana
			)
		[numbers] => Array
			(
				[0] => 1
				[1] => 3
				[2] => 5
			)
)

// 要素を一つず代入
	$array['tamura']['height'] = 170;
	$array['tamura']['blood'] = 'A';
	$array['tamura']['hobbies'] = array('soccer','tennis','mathmatics');
	$array['tanaka']['height'] = 165;
	$array['tanaka']['blood'] = 'AB';
	$array['tanaka']['hobbies']= array('piano','golf');

// 出力
Array(
	[tamura] => Array
		(
			[height] =>170
			[blood] => A
			[hobbies] =>Array(

				[0] => soccer
				[1] => tennis
				[2] =>mathematics
			)
		)

	[tanaka] => Array(
			[height] => 165
			[blood] => AB
			[hobbies] => Array
				(
					[0] => piano
					[1] => golf
				)
		)
)

// 配列の要素確認
	count($array);

// foreach関数
	
	$users[] = array('name' => 'tamura', 'age' => '25');
	$users[] = array('name' =>'suzuki', 'age'=> '23');
	$users[] = array('name' => 'maki','age' => '29');

	foreach($users as $user)
		echo $user['nmae'] .'さんは'.$user['age'] ."歳です。\n";


// 出力
tamuraさんは25歳です。
suzukiさんは23歳です。
makiさんは29歳です。
