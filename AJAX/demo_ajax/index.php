<?php
    include_once "db.php";
    $db = new db();
    $connection = $db->connection;
    
    $sql_getprovince = "SELECT * FROM devvn_tinhthanhpho";
    $stmt = $connection -> prepare($sql_getprovince);
    $stmt -> execute();
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    $provinces = $stmt -> fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Tỉnh thành Việt Nam</h1>
        <select name="tinh" id="tinh">
            <option value="0">Chọn tỉnh tp</option>
            <?php
                foreach($provinces as $province){
                    ?>
                    <option value="<?php echo $province["matp"];?>"><?php echo $province["name"];?></option>
                    <?php
                }
            ?>
        </select>

        <select name="quan" id="quan">
            <option value="0">Chọn quận huyện</option> 
        </select>

        <select name="xa" id="xa">
            <option value="0">Chọn xã phường</option> 
        </select>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script>
        $(document).ready(function(){
            $('#tinh').on("change",function(){
                var matp = $(this).val();
            
                $.ajax({
                    url: "http://localhost/Learn_MVC/demo_ajax/ajax_quanhuyen.php",

                    data: {matp:matp},

                    method: "POST",
        
                    success: function(data1){
                        $('#quan').html(data1);
                    }

                });
            });
        });

        $(document).ready(function(){
            $('#quan').on("change",function(){
                var maqh = $(this).val();
                alert(maqh);
                $.ajax({
                    url: "http://localhost/Learn_MVC/demo_ajax/ajax_phuongxa.php",

                    data: {maqh:maqh},

                    method: "POST",
        
                    success: function(data2){
                        $('#xa').html(data2);
                    }

                });
            });
        });

  </script>
</body>
</html>