<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Year Level</th>
        <th scope="col">Created</th>
        <th scope="col">Operations</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once "database/Private/connection/core.php";
    $yearquery = "select * from `tbyear` order by id desc";
    if($result = $pdo->query($yearquery))
    {
        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
    ?>
    <tr>
        <th scope="row"><?php echo $row['id']; ?></th>
        <td><?php echo $row['yearlevel']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td>
            
            <button class="btn btn-outline-danger" onclick="yearonrevoke(<?php echo $row['id']; ?>)">Revoke</button>
        </td>
    </tr>
    <?php
            }
            unset($result);
        }
    }
    unset($pdo);
    ?>
    </tbody>
</table>