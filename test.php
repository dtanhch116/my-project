<?php
    include "models/libraryPDO.php";
    if(isset($_POST['btn'])){
        $query = "SELECT don_gia, giam_gia FROM san_pham";
        $data = pdo_query_all($query);

        for ($i=0; $i < sizeof($data); $i++) { 
            $sql = "UPDATE `san_pham` SET `don_gia`='4266000',`giam_gia`='3316000'";
            pdo_execute($sql);
            
        }
        
        print_r($data);
        
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <button type="submit" name="btn">click</button>
    </form>
</body>
</html>