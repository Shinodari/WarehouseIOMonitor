<?php
include 'lib/global_variable.php';
$link = @mysqli_connect($host, $username, $password, $database)
    or die("Can't connect the database!/Please contact the admin.");

$orderDisplayList = array();
$sql = "SELECT * FROM monitor_order";
$rs = mysqli_query($link, $sql);
while($data = mysqli_fetch_array($rs)){
    $orderDisplayList[(int)$data["ID"]] = $data["supplierID"];
}
mysqli_close($link);
?>
<!DOCTYPE html>
<head>
    <title>Warehouse IO Monitor</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script>
        const orderDisplayList =[];
        orderDisplayList[0] = "0";
        <?php
            for($i = 1; $i <= count($orderDisplayList); $i++){
                echo "\t\torderDisplayList[{$i}] = \"{$orderDisplayList[$i]}\";\n";
            }
        ?>
        $(function(){
            $.ajax({
                url:'lib/getorderdisplay.php',
                type:'post',
                dataType:'json',
                success:callbackOrderDisplay,
                timeout:'10000',
                error:function(xhr, errorStatus){
                    alert('Get order Display is ' + errorStatus + '! \nPlease contact Admin');
                }
            });

            //$('.suplierName').text(orderDisplayList.1);
        });

        function callbackOrderDisplay(result){
            orderDisplayList = result;
        }
    </script>
</head>
<body>
    <header>
        <div class="suplierName"></div>
    </header>
    <section>
        <div>Section<br>Test<br></div>
    </section>
    <footer>
        <img src="picture/footer.png">
    </footer>
</body>
</html>