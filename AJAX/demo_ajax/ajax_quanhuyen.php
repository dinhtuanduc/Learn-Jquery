<?php
include_once "db.php";

if(isset($_POST["matp"])){
    $matp = $_POST["matp"];
    $db = new db();
    $connection = $db->connection;

    $sql_quanhuyen = "SELECT * FROM devvn_quanhuyen WHERE matp = $matp";

    $stmt = $connection->prepare($sql_quanhuyen);

    $stmt ->execute();

    $stmt-> setFetchMode(PDO::FETCH_ASSOC);

    $quanhuyen = $stmt -> fetchAll();

    $getquanhuyen = "<option value='0'>Chọn quận huyện</option>";

    foreach($quanhuyen as $quan){
        $getquanhuyen .= '<option value="'.$quan["maqh"].'">'.$quan["name"].'</option>';
    }
    echo $getquanhuyen;
    
}