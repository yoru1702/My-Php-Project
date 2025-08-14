<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<?php
    include "tel.php";
    include "footer.php";
?>
ggggggggggggggggggggggggggggggggggggg
<?php
    include "head.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<?php
    include "tel.php";
    include "footer.php";
?>
ggggggggggggggggggggggggggggggggggggg
<?php
    session_start();
    include "config.inc.php";
?>