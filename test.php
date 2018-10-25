<html>
<head>
<title>aaaa</title>
</head>
<body>
<p>cccc</p>
<?php
$db=new SQLite3('./database.db');
$sql_result=$db->query("SELECT * FROM title");
$data=$sql_result->fetchArray();
print $data["book_id"]." : ".$data["title"];
$db->close();
?>
</body>
</html>
