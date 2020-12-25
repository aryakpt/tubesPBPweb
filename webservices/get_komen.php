<?php
require_once('../db_login.php');

$queryResult = $db->query("SELECT komentar.idkomentar, komentar.isi, post.idpost FROM komentar JOIN post WHERE komentar.idpost=post.idpost");
$result = array();

while ($row = mysqli_fetch_object($queryResult)) {
    $F["idpost"] = $row->idpost;
    $F["idkomentar"] = $row->idkomentar;
    $F["komentar"] = $row->isi;
    array_push($result, $F);
}

echo json_encode($result);
mysqli_close($db);
