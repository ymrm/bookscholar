<html>
<head>
<title>aaaa</title>
</head>
<body>
<?php
$db=new SQLite3('./database.db');
for ($i=0; $i<793;$i++){


$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
$data=$sql_result->fetchArray();
//print $data["book_id"]." : ".$data["title"];
print '<a href="http://google.co.jp">'.$data['title'].'</a>';
print "</br>";
}
$db->close();
?>
</body>
</html>
