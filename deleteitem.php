<?php

session_start();

include 'db.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $getImg=$conn->prepare("select image from menu_item where id=?");
    $getImg=bind_param('i',$id);
    $getImg->execute();
    $row=$getImg->get_result()->fetch-assoc();

    if ($row) {
        $image_name=$row['image'];

        $file_path="upload/$image_name";

        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    $sql=$conn->prepare('delete from menu_item where id=?');
    $sql->bind_param('i',$id);
    $sql->execute();
    header("Location:view.php");
}


?>