<?php
include 'global_variable.php';
$link = @mysqli_connect($host, $username, $password, $database)
    or die;

$orderDisplay = array();
$sql = "SELECT * FROM monitor_order";
$rs = mysqli_query($link, $sql);
while($data = mysqli_fetch_array($rs)){
    $orderDisplay[(int)$data["ID"]] = $data["supplierID"];
}
echo json_encode($orderDisplay);

mysqli_close($link);
?>