<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_user order by id_user desc limit 0,3";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <h2><b>หน้าหลัก</b></h2><hr>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-warning text-light">
                        <div class="card-body">
                            <center>
                                <h2><b>จำนวนผู้ใช้ <?php $num1=sumperson(1)?></b></h2>
                                <h2><b><?php echo "$num1";?> คน</b></h2>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-danger text-light">
                        <div class="card-body">
                            <center>
                                <h2><b>แอดมิน/แพทย์ <?php $num1=sumperson(2)?></b></h2>
                                <h2><b><?php echo "$num1";?> คน</b></h2>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-success text-light">
                        <div class="card-body">
                            <center>
                                <h2><b>แพ็คเกจ <?php $num1=sumperson(3)?></b></h2>
                                <h2><b><?php echo "$num1";?> แพ็ค</b></h2>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-primary text-light">
                        <div class="card-body">
                            <center>
                                <h2><b>สังคมออนไลน์ <?php $num1=sumperson(4)?></b></h2>
                                <h2><b><?php echo "$num1";?> กระทู้</b></h2>
                            </center>
                        </div>
                    </div>
                </div>
            </div><hr>
            <?php
                if($num==0){
                    echo "<center><h2><b><font color='red'>ไม่พบข้อมูล</font></b></h2></center>";
                }else{
                    echo "<center><h2><b><font color='blue'>ผู้ใช้ $num รายการ</font></b></h2></center>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อายุ</th>
                    <th>สถานะ</th>
                    <th>แพ็คเกจ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
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
                        $pic_user=$read["pic_user"];
                        if($pic_user==""){
                            $pic_user="user.jpg";
                        }
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "<img src='user/$pic_user' class='rounded-pill' width='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo "$born";?> ปี</td>
                    <td><?php echo "$show";?></td>
                    <td><?php echo "$name_pack";?></td>
                    <td><?php echo "<a class='btn btn_edit btn-warning' id_user='$id_user'>แก้ไข</a>";?></td>
                    <td><?php echo "<a class='btn btn-danger' href='user_del.php?id_user=$id_user&pic_user=$pic_user' onclick=\"return confirm('ต้องการลบช้อมู,ใช่หรือไม่')\">ลบ</a>";?></td>
                </tr>
                <?php 
                    $i++;
                    } 
                ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>
<script>
    $(function(){
        $(".btn_add").on('click',function(){
            $.ajax({
                url:"user_add.php",
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