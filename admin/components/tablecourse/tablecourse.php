
<table class="table table-hover table-bordered" id="data">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Course name</th>
        <th scope="col">Created</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody id="coursetable">
    <?php
    require_once "database/Private/connection/core.php";
    $queries = "select * from course order by id desc";
    if($result = $pdo->query($queries))
    {
        if($result->rowCount()>0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){


    ?>
    <tr>
        <th scope="row"><?php echo $row['id']; ?></th>
        <td><?php echo $row['course_details']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td>
            <button class="btn btn-outline-primary" onclick="onmodifycourse(<?php echo $row['id']; ?>)">Modify</button>&nbsp;
            <button class="btn btn-outline-danger" onclick="onrevoke(<?php echo $row['id'] ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">Revoke</button>&nbsp;
        </td>
    </tr>
<?php

            }
            unset($result);
        }else {
            echo "<p>No result</p>";
        }
    }
    unset($pdo);
?>
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to revoke this data?</h4>
        <p style="color: red;">Revoking this data will remove this data on your database.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="onproceedrevoke">Proceed</button>
      </div>
    </div>
  </div>
</div>

 