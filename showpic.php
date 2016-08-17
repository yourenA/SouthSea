<?php
session_start();
include('conn.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <?php
    $sql1=mysql_query("select * from db_images");
    $row1=@mysql_fetch_object($sql1);
    ?>
    <div>
        <?php
            do{
        ?>
        <img src="<?php echo $row1->images_path; ?>" alt="">
         <?php }while($row1=mysql_fetch_object($sql1));

        ?>
    </div>

</div>
</body>
</html>