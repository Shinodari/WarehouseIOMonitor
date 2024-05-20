<!DOCTYPE html>
<head>
    <title>Warehouse IO Monitor</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script>
        let orderDisplay;
        $(function(){
            $.ajax({
                url:'lib/getorderdisplay.php',
                type:'post',
                dataType:'json',
                success:callbackOrderDisplay,
                timeout:'10000',
                error:function(xhr, testStatus){
                    alert('Get order Display is error! \nPlease contact Admin')
                }
            });
        });

        function callbackOrderDisplay(result){
            orderDisplay = result;
        }
    </script>
</head>
<body>
    <header>
        Test
    </header>
    <section>
        <div></div>
    </section>
    <footer>
        <img src="picture/footer.png">
    </footer>
</body>
</html>