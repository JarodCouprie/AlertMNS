<?php

require_once("../tools/connect.php");

// foreach ($_POST as $key => $value) {
//     echo $key . " : " . $value;
// }
$values = [];
$sql2 = "";
$sql = "INSERT INTO message(";
foreach ($_POST as $field => $value) {
    if ($field != "film_id") {
        $sql .= $field . ",";
        $sql2 .= ":" . $field . ",";
        $values[":" . $field] = htmlspecialchars($value);
    }
}
$sql = rtrim($sql, ",");
$sql2 = rtrim($sql2, ",");
$sql .= ") VALUES (" . $sql2 . ");";

$stmt = $db->prepare($sql);
$stmt->execute($values);
header("Location: ./mns.php");

?>