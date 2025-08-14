<?php
    include "head.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_his=$_REQUEST["id_his"];
    $sql="select * from tb_his where id_his='$id_his'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_user=$read["id_user"];
    $sys=$read["sys"];
    $dia=$read["dia"];
    $heart=$read["heart"];
    $day_in=$read["day_in"];
    $day_in=displaydate($day_in);
    $detail=$read["detail"];
    $coin_user=$read["coin_user"];
    $status_mem=$read["status_mem"];
    if($status_mem==7){
        $show="<b class='text-danger'>พบแพทย์</b>";
        $c="<b class='text-danger'>$coin_user แต้ม</b>";
        if($coin_user==0){
            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
        }
    }else if($status_mem==6){
        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
        $c="<b class='text-warning'>$coin_user แต้ม</b>";
        if($coin_user==0){
            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
        }
    }else if($status_mem==5){
        $show="<b class='text-warning'>อัตราความดันสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
        if($coin_user==0){
            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
        }
    }else if($status_mem==4){
        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
        if($coin_user==0){
            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
        }
    }else if($status_mem==3){
        $show="<b class='text-warning'>อัตราความดันเริ่มสูง <br>อัตราการเต้นของหัวใจปกติ</b>";
        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
        if($coin_user==0){
            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
        }
    }else if($status_mem==2){
        $show="<b class='text-warning'>อัตราความดันกปกติ <br>อัตราการเต้นของหัวใจผิดปกติ</b>";
        $c="<b class='text-warning'>+$coin_user แต้ม</b>";
        if($coin_user==0){
            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
        }
    }else{
        $show="<b class='text-success'>สุขภาพร่างกายปกติ</b>";
        $c="<b class='text-success'>+$coin_user แต้ม</b>";
        if($coin_user==0){
            $c="<b class='text-danger'>ไม่ได้รับแต้ม</b>";
        }
    }
    $sql1="select * from tb_admin,tb_user where tb_admin.id_pack=tb_user.id_pack and tb_admin.id_ad";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $name_ad=$read1["name_ad"];
    $sname_ad=$read1["sname_ad"];
    $pic_ad=$read1["pic_ad"];
    if($pic_ad==""){
        $pic_ad="doctor.jpg";
    }
    $sql2="select * from tb_chat where id_his='$id_his' order by id_chat";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<div class="bg"><br><br>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center>
                    <h2>ปรึกษาแพทย์ : <?php echo "$name_ad $sname_ad"; ?></h2>
                    <h4>ประจำวันที่ : <?php echo "$day_in"; ?></h4>

                    <button id="start-camera" class="btn btn-success">เปิดกล้อง</button>
                    <video id="video" width="900" height="500" style="display:none;" autoplay></video>
                    <button id="record-button" class="btn btn-primary mt-1" style="display:none;">บันทึกวิดิโอ</button>

                    <form action="doc_h2.php" id="upload-form" enctype="multipart/form-data" method="post" style="display:none;">
                        <input type="hidden" name="id_his" id="id_his" value="<?php echo "$id_his"; ?>">
                        <input type="file" name="video_chat" id="video-input" style="display:none;">
                        <button type="submit" class="btn btn-warning mt-1">ส่งวิดิโอ</button>
                    </form>

                </center>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <tr class="h5" align="center">
                        <th>ความดันค่าบน</th>
                        <th>ความดันค่าล่าง</th>
                        <th>อัตราการเต้นของหัวใจ</th>
                        <th>อาการเพิ่มเติม</th>
                        <th>แต้มแลกซื้อ</th>
                        <th>สถานะอาการ</th>
                    </tr>
                    <tr align="center">
                        <td><?php echo "$sys"; ?></td>
                        <td><?php echo "$dia"; ?></td>
                        <td><?php echo "$heart"; ?></td>
                        <td><?php echo "$detail"; ?></td>
                        <td><?php echo "$c"; ?></td>
                        <td><?php echo "$show"; if($status_mem==7){ echo "&nbsp;&nbsp;<a href='tel:1669' class='btn btn-danger'>1669</a>"; } ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <?php
                    if($num2==0){
                        echo "<br><br><br><br><center><h2><b class='text-success'>เริ่มปรึกษาแพทย์</b></h2></center><br><br><br><br>";
                    }else{
                ?>
                <?php
                    $i=1;
                    while($read2=mysqli_fetch_assoc($result2)){
                        $id_chat=$read2["id_chat"];
                        $id_his=$read2["id_his"];
                        $id_user=$read2["id_user"];
                        $day_chat=$read2["day_chat"];
                        $day_chat=displaydate($day_chat);
                        $time_chat=$read2["time_chat"];
                        $detail_chat=$read2["detail_chat"];
                        $video_chat=$read2["video_chat"];
                        $type_chat=$read2["type_chat"];
                        if($type_chat==1){
                            $sql3="select * from tb_user where id_user='$_SESSION[valid_user]'";
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
                <?php if($type_chat==1){ ?>
                    <div class="d-flex md-3 justify-content-end">
                        <div class="rounded-3 px-3 py-2 border" style="background:#e2fff3">
                            <strong><?php echo "$name_user $sname_user"; ?></strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                            <?php if($video_chat){?>
                                <h4>Video : <a href="uploads/<?php echo "$video_chat";?>" target="_blank"><?php echo "$video_chat";?></a></h4>
                            <?php } ?>
                           
                        </div>&nbsp;&nbsp;&nbsp;
                        <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>
                    </div><br>
                <?php }else if($type_chat==2){ ?>
                    <div class="d-flex md-3">
                        <?php echo "<img src='admin/admin/$pic_ad' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                        <div class="rounded-3 px-3 py-2 border" style="background:#ffe2ff">
                            <strong><?php echo "$name_ad $sname_ad"; ?></strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                            <?php if($video_chat){?>
                                <h4><b>Video : <a href="doctor/uploads/<?php echo "$video_chat";?>" target="_blank"></a><?php echo "$video_chat";?></b></h4>
                            <?php } ?>
                        </div>
                    </div><br>
                <?php } ?>
                <?php   
                    $i++;
                    }
                ?>
                <?php } ?>
                <form action="doc_h2.php" name="form1" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="detail_chat" id="detail_chat" placeholder="ส่งข้อความ...." required>
                        <button class="btn btn-lg btn-success" type="submit">ส่ง
                            <input type="hidden" name="id_his" id="id_his" value="<?php echo "$id_his"; ?>">
                        </button>
                    </div>
                </form>
            </div>
        </div><br>
        <center>
            <a href="ques_n_doc.php" class="btn btn-lg btn-warning w-100" style="border-radius:30px">แบบประเมินความพึงพอใจต่อการให้บริการของแพทย์</a>
        </center>
    </div><br><br>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>
<script>
    const $ = (s) => document.querySelector(s),
        [camBtn ,recBtn ,video ,vidInput ,upForm] = ["#start-camera" ,"#record-button" ,"#video" ,"#video-input" ,"#upload-form"].map($),
        toggle = (el,show) => (el.style.display = show ? 'block' : 'none');

    let stream = null, recorder = null, blobs = [], recording = false;
        count = +localStorage.getItem('videoCount') || 0;

    camBtn.onclick = async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({video : true , audio : true});
            video.srcObject = stream;
            [video ,recBtn].forEach( el => toggle(el,1));
            toggle(camBtn,0);
            toggle(recBtn,1);
        } catch (e) { alert("เปิดกล้องไม่ได้ :" +e.message); }
    };
    recBtn.onclick = () => {
        if(recording){
            recorder.stop();
        } else {
            blobs = [];
            recorder = new MediaRecorder(stream ,{mimeType : 'video/webm'});
            recorder.ondataavailable = (e) => e.data.size && blobs.push(e.data);
            recorder.onstop = () => {
                const file = new File ([new Blob(blobs ,{type : 'video/webm'})], `video${++count}.webm`);
                const dt = new DataTransfer(); dt.items.add(file); vidInput.files = dt.files;
                localStorage.setItem('videoCount' ,count);
                toggle(recBtn,0);
                toggle(upForm,1);
                alert(`บันทึกสำเร็จ! (ไฟล์: video${count}.webm)`);
            };
            recorder.start();
        }
        recBtn.textContent = recording ? "บันทึกวิดิโอ" : "หยุดบันทึก";
        recording = !recording;
    }
</script>