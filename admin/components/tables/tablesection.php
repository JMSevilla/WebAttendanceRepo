<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Section Name</th>
        <th scope="col">Created</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php
    require_once "database/Private/connection/core.php";
    $querystring = "select * from tbsection order by id desc";
    if($result = $pdo->query($querystring)) {
        if($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['sectionname']; ?></td>
      <td><?php echo $row['created_at']; ?></td>
      <td>
          <button class="btn btn-danger" style="width: 100%;">Revoke</button>
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