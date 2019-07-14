<?php
    include("../db_connect.php");
    $data = array();
    $SQL = "SELECT DISTINCT `product_type` FROM `product_details` ORDER BY `product_type` ASC";
    $result = $connection->query($SQL);
    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }
    echo json_encode($data);
    $result->free();
    $connection->close();
?>