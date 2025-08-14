<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and status_meet='n'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-12">
        <div class="container"><br>
            <center><h2><b>รายการนัดพบแพทย์</b></h2></center><br><hr><br>
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
                    <th>วันที่นัด</th>
                    <th>เวลานัด</th>
                    <th>สถานะ</th>
                    <th>ยืนยัน</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_meet=$read["id_meet"];
                        $id_user=$read["id_user"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $day_meet=$read["day_meet"];
                        if($day_meet!=""){
                            $day_meet=displaydate($day_meet);
                        }
                        $time_meet=$read["time_meet"];
                        $status_meet=$read["status_meet"];
                        if($status_meet=="n"){
                            $show="<font color='red'><b>ยังไม่ได้พบแพทย์</b></font>";
                        }
                ?>
                <tr align="center">
                    <td><?php echo "$i";?></td>
                    <td><?php echo "$name_user $sname_user";?></td>
                    <td><?php echo "$day_meet";?></td>
                    <td><?php echo "$time_meet";?></td>
                    <td><?php echo "$show";?></td>
                    <td><?php echo "<a class='btn btn_meet btn-success' id_meet='$id_meet'>ยืนยัน</a>";?></td>
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
        $(".btn_meet").on('click',function(){
            $.ajax({
                url:"meet_detail.php",
                data:"id_meet="+$(this).attr("id_meet"),
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