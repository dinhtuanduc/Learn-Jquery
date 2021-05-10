<?php
include_once "db.php";
if(isset($_POST["maqh"])){

    $maqh = $_POST["maqh"];
    $db = new db();
    $connection = $db->connection;

    $sql_xaphuong = "SELECT * FROM devvn_xaphuongthitran WHERE maqh = $maqh";

    $stmt = $connection->prepare($sql_xaphuong);

    $stmt ->execute();

    $stmt-> setFetchMode(PDO::FETCH_ASSOC);

    $xaphuong = $stmt -> fetchAll();

    $getxaphuong = "<option value='0'>Chọn xã phường</option>";

    foreach($xaphuong as $xa){
        $getxaphuong .= '<option value="'.$xa["xaid"].'">'.$xa["name"].'</option>';
    }
    echo $getxaphuong;
}
    