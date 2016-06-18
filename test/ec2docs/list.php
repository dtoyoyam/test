<?php

# init
if ( isset($_GET['num']) ) { $getnum = $_GET['num']; } else { $getnum = 10; }
if ( isset($_GET['id'])  ) { $getid = $_GET['id'];  } else { $getid  = ""; }

# link database
$link = mysql_connect('localhost', 'root', '');

# make sql 
$sql="SELECT * from list.datalist ";
if(isset($getid) && $getid != "") {$sql .= " where id = $getid";  }

#  do execute
$result = mysql_query("$sql");

# ret data
#$ret_list = array( 'request' => array('sql'=>$sql));
$ret_list = array();
while($dat=mysql_fetch_assoc($result)){
	array_push($ret_list,$dat);
}
echo json_encode($ret_list);
echo "\n";

# close request
mysql_close($link);

?>
