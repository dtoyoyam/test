<?php

function make_test_array($id){
	$test_array = array(
	'id'        => $id,
	'title'     => 'test$id',
	'url'       => 'http.yahoo.co.jp',
	'status'    => 'open',
	'starttime' => '20160401000000',
	'endtime'   => '20160431235959' 
	);
	return $test_array;
}

function make_test_list($num){
	$ret_list = array();

	for ($i = 1; $i <= $num; $i++) {
		array_push($ret_list,make_test_array($i));
	}
	return $ret_list;
}

if ( isset($_GET['num']) ) {
	$num = $_GET['num'];
} else {
	$num = 10;
}

echo json_encode(make_test_list($num));

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

#$db_selected = mysql_select_db('list', $link);
$result = mysql_query('SELECT id, title from list.datalist');

while ($row = mysql_fetch_assoc($result)) {
    print($row['id']);
    print($row['title']);
}

mysql_close($link);

?>
