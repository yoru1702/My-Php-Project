<?php
    $sql="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $pic_user=$read["pic_user"];
    if($pic_user==""){
        $pic_user="user.jpg";
    }
    $born=$read["born"];
    $born=getage($born);
    $tel=$read["tel"];
    $addr=$read["addr"];
    $status_mem=$read["status_mem"];
    $coin_user=$read["coin_user"];
    if($status_mem==7){
        $show="<b class='text-danger'>พบแพทย์</b>";
    }else if($status_mem==6){
        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
    }else if($status_mem==5){
        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
    }else if($status_mem==4){
        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
    }else if($status_mem==3){
        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
    }else if($status_mem==2){
        $show="<b class='text-warning'>อัตราความดันกปกติ <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
    }else{
        $show="<b class='text-success'>สุขภาพร่างกายปกติ</b>";
    }
    if($coin_user>0){
        $c="<b class='text-success'>$coin_user แต้ม</b>";
    }else{
        $c="<b class='text-danger'>$coin_user แต้ม</b>";
    }
?>
<div class="card" style="border-radius:20px">
    <div class="card-img-top"><?php echo "<img src='admin/user/$pic_user' class='rounded img-fluid w-100'>"; ?></div>
    <div class="card-body">
        <center>
            <h4><b><?php echo "$name_user $sname_user"; ?></b></h4><hr>
            <table>
                <tr>
                    <th>อายุ</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <th>:</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo "$born";?> ปี</td>
                </tr>
                <tr>
                    <th>ที่อยู่ปัจจุบัน</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <th>:</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo "$addr";?></td>
                </tr>
                <tr>
                    <th>เบอร์โทร</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <th>:</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td class="text-success"><?php echo "".substr($tel,0,3)."-".substr($tel,3,7)."";?></td>
                </tr>
                <tr>
                    <th>สถานะ</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <th>:</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo "$show";?></td>
                </tr>
                <tr>
                    <th>แต้มแลกซื้อ</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <th>:</th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo "$c";?></td>
                </tr>
            </table>
        </center>
    </div>
</div>