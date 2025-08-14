<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    $name=$_POST["name"];
    if($name==""){
        $sql="select * from tb_user where id_user and id_pack='$_SESSION[id_pack]' and status_pack='y' order by id_user desc";
    }else{
        $sql="select * from tb_user where id_user and id_pack='$_SESSION[id_pack]' and status_pack='y' and name_user like '%$name%' order by id_user desc";
    }
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12"><br>
        <div class="container"><br>
            <center><h2><b>ข้อมูลผู้ป่วย</b></h2></center><br>
            <form action="index.php" name="form1" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="ค้นหา">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form><br>
            <?php 
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ข้อมูล $num รายการ</font></b></h2></center>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อายุ</th>
                    <th>สถานะ</th>
                    <th>ข้อมูล</th>
                    <th>ประวัติ</th>
                </tr>
                <?php 
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_user=$read["id_user"];
                        $id_pack=$read["id_pack"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $born=$read["born"];
                        $born=getage($born);
                        $status_mem=$read["status_mem"];
                        if($status_mem==7){
                            $show="<font color='red'><b>พบแพทย์</b></font>";
                        }else if($status_mem==6){
                            $show="<font color='orange'><b>อัตราความดันสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        }else if($status_mem==5){
                            $show="<font color='orange'><b>อัตราความดันสูง <br>อัตราการเต้นของหัวใจปกติ</b></font>";
                        }else if($status_mem==4){
                            $show="<font color='orange'><b>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        }else if($status_mem==3){
                            $show="<font color='orange'><b>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจปกติ</b></font>";
                        }else if($status_mem==2){
                            $show="<font color='orange'><b>อัตราความดันปกติ <br>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        }else {
                            $show="<font color='green'><b>สุขภาพร่างกายปกติ</b></font>";
                        }
                        $pic_user=$read["pic_user"];
                        if($pic_user==""){
                            $pic_user="user.jpg";
                        }
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];

                        $sql2="select * from tb_his where id_user='$id_user' and status_his='n'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                        $sql3="select * from tb_chat where id_user='$id_user' and status_chat='n'";
                        $result3=mysqli_query($conn,$sql3);
                        $num3=mysqli_num_rows($result3);
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='../admin/user/$pic_user' class='rounded-pill' width='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo "$born";?> ปี</td>
                    <td><?php echo "$show";?></td>
                    <td><?php echo "<a class='btn btn_edit btn-success' id_user='$id_user'>ข้อมูล</a>";?></td>
                    <td>
                        <?php echo "<a class='btn btn-primary' href='health.php?id_user=$id_user&name_user=$name_user&sname_user=$sname_user'>ประวัติ</a>";?>
                        <?php if($num2>0){?>
                            <div class="spinner-grow bg-danger"></div>
                        <?php }if($num3>0){?>
                            <div class="spinner-grow bg-success"></div>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>
<script>
    $(function(){
        $(".btn_edit").on('click',function(){
            $.ajax({
                url:"user_edit.php",
                data:"id_user="+$(this).attr("id_user"),
                type:"POST",
                success:function(result){
                    $("#adm").html('');
                    $("#adm").html(result);
                    $("#am").modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                },
            });
        });
    });
</script>
<div class="modal fade" id="am" role="dialog">
    <div class="modal-dialog modal-xl" role="document" id="adm"></div>
</div>