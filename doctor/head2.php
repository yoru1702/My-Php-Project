<?php
    session_start();
    include "config.inc.php";
    $sql="select distinct(id_pack) from tb_package";
    $result=mysqli_query($conn,$sql);
    if($_SESSION["pic_ad"]==""){
        $_SESSION["pic_ad"]="ad.jpg";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Health</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body id="myContent">
    <nav class="navbar navbar-expand-sm sticky-top shadow-lg">
        <div class="container">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php" class="navbar-brand">
                <img src="img/lg.png" width="250" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                </ul>
                <ul class="nav-navbar">
                    <li class="nav-link dropdown">
                        <a class="nav-link text-light dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            <?php echo "<img src='../admin/admin/$_SESSION[pic_ad]' class='rounded-pill' width='50'>&nbsp;&nbsp;&nbsp;$_SESSION[name_ad] $_SESSION[sname_ad]"; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php" class="dropdown-item" onclick="return confirm('ท่านต้องการออกจากระบบใช่หรือไม่?')">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>