<?php
    include("../db_connect.php");
    $product_type = $_REQUEST['product_type'];
    $limit = $_REQUEST['limit'];
    $offset_count = $_REQUEST['offset_count'];
    $data = array();
    $SQL = "SELECT * FROM `product_details` WHERE `product_type`='$product_type' ORDER BY `sr_no` ASC LIMIT $limit OFFSET $offset_count";
    $result = $connection->query($SQL);
    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }
    echo json_encode($data);
    $result->free();
    $connection->close();
?>