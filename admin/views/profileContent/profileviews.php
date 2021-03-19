<div class="container">
    <?php
    require_once "database/Private/connection/core.php";
    $querystring = "select * from `users` where id=:id";
    if($stmt = $pdo->prepare($querystring)){
        $stmt->bindParam(":id", $pid, PDO::PARAM_STR);
        $pid = $_SESSION['id'];
        $stmt->execute();
        if($stmt->rowCount() > 0){
            if($row = $stmt->fetch()){

    ?>
    <div class="card">
        <div class="card-body">
            <center>
                <img src="profileImage/<?php echo $row['image']; ?>" id="preview" alt="Avatar" style="width: 20%; border-radius: 50%; height: auto; margin-bottom: 30px;" />
            </center>
            <label for="formFileLg" class="form-label">Upload your profile picture</label>
            <input  class="btn btn-primary" id="file" type="file" onchange="previewFile(this)"/>

           <div style="margin-top: 20px;">
               <div class="row">
                   <div class="col-sm">
                       <div class="form-outline">
                           <label>Firstname</label>
                           <input type="text" id="pfirstname" class="form-control" placeholder="<?php echo $row['firstname'] ?>" />

                       </div>
                       <div class="form-outline">
                           <label>Email</label>
                           <input type="text" id="form1" class="form-control" value="<?php echo $row['email']; ?>" disabled/>

                       </div>
                   </div>
                   <div class="col-sm">
                       <div class="form-outline">
                           <label>Lastname</label>
                           <input type="text" id="plastname" class="form-control" placeholder="<?php echo $row['lastname'] ?>" />

                       </div>
                       <div class="form-outline">
                           <label>Username</label>
                           <input type="text" id="form1" class="form-control" value="<?php echo $row['username']; ?>" disabled/>

                       </div>
                   </div>
                <button class="btn btn-outline-primary" style="margin-top: 10px;" onclick="onsaveprofileadmin()">Save</button>
               </div>
           </div>

        </div>
    </div>
    <?php

            }
            unset($stmt);
        }
    }
    unset($pdo);
    ?>
</div>