<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_friend=$_REQUEST["id_friend"];
    $name_user=$_REQUEST["name_user"];
    $sname_user=$_REQUEST["sname_user"];
    $pic_user=$_REQUEST["pic_user"];
    $type_ques=$_REQUEST["type_ques"];
    $sql2="select * from tb_chat_f where id_friend='$id_friend' order by id_chat";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<div class="bg"><br><br>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center>
                    <h2>กำลังสนทนากับ : <?php echo "$name_user $sname_user"; ?></h2>
                </center>
            </div>
            <div class="card-body">
                <?php
                    if($num2==0){
                        echo "<br><br><br><br><center><h2><b class='text-success'>เริ่มสนทนากับเพื่อนใหม่</b></h2></center><br><br><br><br>";
                    }else{
                ?>
                <?php
                    $i=1;
                    while($read2=mysqli_fetch_assoc($result2)){
                        $id_chat=$read2["id_chat"];
                        $id_user=$read2["id_user"];
                        $day_chat=$read2["day_chat"];
                        $day_chat=displaydate($day_chat);
                        $time_chat=$read2["time_chat"];
                        $detail_chat=$read2["detail_chat"];
                        if($id_user!=$_SESSION["valid_user"]){
                            $sql3="select * from tb_user where id_user='$id_user'";
                            $result3=mysqli_query($conn,$sql3);
                            $read3=mysqli_fetch_assoc($result3);
                            $name_user=$read3["name_user"];
                            $sname_user=$read3["sname_user"];
                            $pic_user=$read3["pic_user"];
                            if($pic_user==""){
                                $pic_user="user.jpg";
                            }
                        }
                ?>
                <?php if($id_user==$_SESSION["valid_user"]){ ?>
                    <div class="d-flex md-3 justify-content-end">
                        <div class="rounded-3 px-3 py-2 border" style="background:#e2fff3">
                            <strong><?php echo "$_SESSION[name_user] $_SESSION[sname_user]"; ?></strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                        </div>&nbsp;&nbsp;&nbsp;
                        <?php echo "<img src='admin/user/$_SESSION[pic_user]' class='rounded-pill' width='50' height='50'>"; ?>
                    </div><br>
                <?php }else if($id_user!=$_SESSION["valid_user"]){ ?>
                    <div class="d-flex md-3">
                        <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                        <div class="rounded-3 px-3 py-2 border" style="background:#ffe2ff">
                            <strong><?php echo "$name_user $sname_user"; ?></strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                        </div>
                    </div><br>
                <?php } ?>
                <?php   
                    $i++;
                    }
                ?>
                <?php } ?>
                <form action="friend_chat2.php" name="form1" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="detail_chat" id="detail_chat" placeholder="ส่งข้อความ...." required>
                        <button class="btn btn-lg btn-success" type="submit">ส่ง
                            <input type="hidden" name="id_friend" id="id_friend" value="<?php echo "$id_friend"; ?>">
                            <input type="hidden" name="name_user" id="name_user" value="<?php echo "$name_user"; ?>">
                            <input type="hidden" name="sname_user" id="sname_user" value="<?php echo "$sname_user"; ?>">
                            <input type="hidden" name="pic_user" id="pic_user" value="<?php echo "$pic_user"; ?>">
                            <input type="hidden" name="type_ques" id="type_ques" value="<?php echo "$type_ques"; ?>">
                        </button>
                    </div>
                </form>
            </div>
        </div><br>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>