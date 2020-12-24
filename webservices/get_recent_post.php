<?php
require_once('../db_login.php');

$queryResult = $db->query("SELECT post.idpost,post.judul,post.isi_post, post.tgl_insert, penulis.nama as namapenulis, komentar.isi as komentar FROM post JOIN penulis ON post.idpenulis=penulis.idpenulis JOIN komentar ON post.idpost=komentar.idkomentar ORDER BY idpost DESC LIMIT 6");
$result = array();

while ($row = mysqli_fetch_object($queryResult)) {
    $F["id"] = $row->idpost;
    $F["judul"] = $row->judul;
    $F["penulis"] = $row->namapenulis;
    $F["isi"] = $row->isi_post;
    $F["komentar"] = $row->komentar;
    $F["tgl"] = $row->tgl_insert;

    array_push($result, $F);
}

echo json_encode($result);
mysqli_close($db);
