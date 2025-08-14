<?php
    $sql="select * from tb_user where id_user!='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
?>
<div class="card" style="border-radius:20px">
    <div class="card-header">
        <h4><b>แนะนำเพื่อน</b></h4>
    </div>
    <div class="card-body">
        <table class="w-100">
            <?php
                $i=1;
                while($read=mysqli_fetch_assoc($result)){
                    $friend_new[$i]=$read["id_user"];   
                    $i++;
                }
                if($friend!=""){
                    $total=array_diff($friend_new,$friend);
                }else{
                    $total=($friend_new);
                }
                foreach($total as $el){
                    $sql1="select * from tb_user where id_user='$el'";
                    $result1=mysqli_query($conn,$sql1);
                    $read1=mysqli_fetch_assoc($result1);
                    $id_user2=$read1["id_user"];
                    $name_user=$read1["name_user"];
                    $sname_user=$read1["sname_user"];
                    $pic_user=$read1["pic_user"];
                    if($pic_user==""){
                        $pic_user="user.jpg";
                    }
            ?>
            <tr>
                <th>
                    <div class="d-flex md-3">
                        <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                        <div class="py-2">
                            <strong><?php echo "$name_user $sname_user"; ?></strong>
                        </div>
                    </div>
                </th>
                <td align="right"><?php echo "<a href='friend_add2.php?id_user2=$id_user2&type_ques=$type_ques' class='btn btn-outline-success'>+</a>"; ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>