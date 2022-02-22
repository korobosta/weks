<?php
$prog = $_POST['prog'];
 ?>
 <div class="col-md-6">
   <table class="table table-bordered">
  <thead>
    <tr>
      <th class="col-md-4">Units for <?php echo $prog ?></th>
    </tr> 
    <tbody>
    <?php 
    include 'db.php';
    $query = mysqli_query($conn,"SELECT * FROM subjects LEFT JOIN program ON subjects.FOR=program.PROGRAM_ID Where program.PROGRAM= '$prog'");

    $count = mysqli_num_rows($query);
    if($count > 0){
      while($row = mysqli_fetch_assoc($query)){


    ?>
      <tr>
        <td><?php echo $row['SUBJECT'] ?></td>
      </tr>
      <?php }}else{
      ?>
      <tr>
        <td> NO RESULT!</td>
      </tr>
      <?php } ?>
    </tbody>
  </thead>
</table>
 </div>
