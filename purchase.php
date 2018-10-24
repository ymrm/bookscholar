<html>
<head>
<title>購入情報一覧</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
<br/>
<br/>
<div class="container">
<h1>購入情報一覧</h1>
<br/>
<table border="1">
<?php
$conn = mysqli_connect("localhost", "s1511514", "k@n@k0","s1511514");
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM purchase";
$res = mysqli_query($conn, $sql);
print("<tr>");
for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
    print( "<td>".mysqli_fetch_field_direct( $res, $i)->name."</td>" );
}
print("</tr>");
while($row = mysqli_fetch_array($res)){
    print("<tr>");
    for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
        print( "<td>".$row[$i]."</td>" );
    }
    print("</tr>");
}
?>
</table>
</div>
</body>
</html>
