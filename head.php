<?php
    session_start();
    include "config.inc.php";
    $sql="select distinct(id_pack) from tb_package";
    $result=mysqli_query($conn,$sql);
    if($_SESSION["pic_user"]==""){
        $_SESSION["pic_user"]="user.jpg";
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
    <script>
        function cal_num(){
            var pay=parseInt(document.form1.pay.value);
            var disc=parseInt(document.form1.disc.value);
            var cost=parseInt(document.form1.cost.value);
            var type_cost=document.form1.type_cost.value;
            var discount;
            var total;
            discount=(pay+cost)*disc/100;
            if(type_cost=="1"){
                total=(pay+cost+500)-discount;
            }else{
                total=(pay+cost+0)-discount;
            }
            document.form1.discount.value=discount;
            document.form1.total.value=total;
        }
        function showHideTable(type,num){
            console.log("num: " + num);
            document.getElementById(num).style.display=type;
        }
    </script>
    <script langagua="javascript">
        function resizeText(multiplier){
            multiplyText(50 ,document.getElementById('myContent'));
        }
        function multiplyText(multiplier ,txtobj){
            if(txtobj.style.fontSize == ''){
                txtobj.style.fontSize = "100%";
            }
            if(multiplier == 0){
                txtobj.style.fontSize = "100%";
            }
            else {
                txtobj.style.fontSize = parseFloat(txtobj.style.fontSize) - multiplier + "%";
            }
        }
        function resizeText2(multiplier){
            multiplyText2(50 ,document.getElementById('myContent'));
        }
        function multiplyText2(multiplier ,txtobj){
            if(txtobj.style.fontSize == ''){
                txtobj.style.fontSize = "100%";
            }
            if(multiplier == 0){
                txtobj.style.fontSize = "100%";
            }
            else {
                txtobj.style.fontSize = parseFloat(txtobj.style.fontSize) + multiplier + "%";
            }
        }
    </script>
</head>
<body id="myContent">
    <nav class="navbar navbar-expand-sm sticky-top shadow-lg">
        <div class="container-fluid">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php" class="navbar-brand">
                <img src="img/lg.png" width="250" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link text-light">หน้าแรก</a></li>
                    <li class="nav-item"><a href="news.php" class="nav-link text-light">ข่าวสารสุขภาพ</a></li>
                    <li class="nav-item"><a href="pack.php" class="nav-link text-light">แพ็คเกจสุขภาพ</a></li>
                    <li class="nav-item"><a href="#btn_add" data-bs-toggle="modal" data-bs-target="#btn_add" class="nav-link text-light">โทรฉุกเฉิน</a></li>
                    <li class="nav-item"><a href="us.php" class="nav-link text-light">เกี่ยวกับเรา</a></li>
                </ul>
                <div class="btn-group">
                    <button class="btn btn-light" type="button">เพิ่ม/ลด ขนาดข้อความ</button>
                    <a href="javascript:resizeText(10);" class="btn btn-outline-light bg-warning text-dark">ตัวเล็ก</a>
                    <a href="javascript:resizeText2(10);" class="btn btn-outline-light bg-danger">ตัวใหญ่</a>
                </div>&nbsp;&nbsp;&nbsp;
                <?php if($_SESSION["valid_user"]==""){ ?>
                    <a href="regis.php" class="btn btn-lg btn-outline-light" style="border-radius:30px">สมัครสมาชิก</a>&nbsp;&nbsp;&nbsp;
                    <a href="login.php" class="btn btn-lg btn-light" style="border-radius:30px">เข้าสู่ระบบ</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php }else if($_SESSION["valid_user"]!==""){ ?>
                    <ul class="nav-navbar">
                        <li class="nav-link dropdown">
                            <a class="nav-link text-light dropdown-toggle" role="button" data-bs-toggle="dropdown">
                                <?php echo "<img src='admin/user/$_SESSION[pic_user]' class='rounded-pill' width='50'>&nbsp;&nbsp;&nbsp;$_SESSION[name_user] $_SESSION[sname_user]"; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="user_edit.php" class="dropdown-item">แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href="logout.php" class="dropdown-item" onclick="return confirm('ท่านต้องการออกจากระบบใช่หรือไม่?')">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php } ?>
            </div>
        </div>
    </nav>
</body>