<html>
<head><title>addressinput.php</title></head>
<body>

<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1511514", "k@n@k0","s1511514")){
    die("データベース接続エラー.<br />");
}
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");

$condition = "";

if(isset($_POST["person_id"]) && ($_POST["person_id"] != "")){
    $person_id = mysqli_escape_string($conn, $_POST["person_id"]);
    $person_id = str_replace("%", "\%", $person_id);
    $condition = "WHERE person_id = ".$person_id."";
}

if(isset($_POST["year"]) && ($_POST["year"] != "")){
    $year= mysqli_escape_string($conn, $_POST["year"]);
    $year = str_replace("%", "\%", $year);
    $condition = "WHERE year = ".$year."";
}

$sql = "SELECT SUM(price*count) FROM purchase ".$condition.
$res = mysqli_query($conn, $sql);
print("<table border=\"1\">");
print("<tr><td>合計金額</td><td>もの</td></tr>");
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["year"]."</td>");

    print("<td><a href= \"update_form.php?bid=".$row["bid"]."\"></a>更新</td>");
    print("<td><a href= \"library_delete.php?bid=".$row["bid"]."\">削除</a></td>");
    print("</tr>");
}
print("</table>");
mysqli_free_result($res);
print($sql)
?>
<?php
$person_id = $_GET['person_id'];
$year = $_GET['year'];
$month = $_GET['month'];
print ("次のデータを受け取りました<br />");
print ("あなたのid：".$person_id."<br />");
print ("買い物した年：".$year."<br />");
print ("買い物した月：".$month."<br />");

?>


</body>
</html>
