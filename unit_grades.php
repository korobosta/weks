<?php session_start(); 
$user_id=$_SESSION['ID'];
include 'grade_calculator.php';

?>
     <style type="text/css">
          @media print {  
    @page {
      size:8.5in 14in;
      max-width:8.5in;
    }
    }
    #stud{
      width:8.5in;
      height:14in;
      overflow:hidden;
      margin:auto;
      border:2px solid #000;
      background-color:white;
    }
         </style>

          <h1 class="page-header">Unit Grade Performance      <button type="text" class="btn btn-info" onclick="printContent('stud')" >
    <i class="glyphicon glyphicon-print"></i>PRINT</button>
</h1>

            
          <div class="container">
         
          <div class="row">
            <div class="col-sm-3">
        <div class="input-group">
    </div>
    </div>

    <br> <br>
       <div class="col-md-8" id="stud" style="padding:50px">   
       <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

       <table>
  <tr>
    <td style="width:20%;">
    
    </td>
    <td style="width:800px;font-size:12px;line-height:1mm;text-align:center" >
    <p><b>WEKS COLLEGE</b></p>
    <p style="padding:5px; font-weight: bold; color:green" >Performance for Units</p>
    </td>
  </tr>
</table>
<?php
include 'db.php';
$user_id=$_SESSION['ID'];
$query=$conn->query("SELECT * from subjects WHERE LECTURER='$user_id'");
while($row1=mysqli_fetch_array($query)){


?>
<h3> <?php echo $row1['SUBJECT'] ?></h3>
  <table id="students" class="table table-bordered" >
    <thead>
      <tr id="heads">
        <td style="width:20%">Grade</th>
        <td style="width:20%">Number of Students</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $subject_id=$row1['SUBJECT_ID'];

    $marks=$conn->query("SELECT marks from registered_units where unit='$subject_id'");

    $a=0;
    $b=0;
    $c=0;
    $d=0;
    $e=0;

    while($m=mysqli_fetch_array($marks)){
      $grade=calculate_grade($m['marks']);
      if($grade=="A"){
        $a=$a+1;
      }
      else if($grade=="B"){
        $b=$b+1;
      }
      else if($grade=="C"){
        $c=$c+1;
      }
      else if($grade=="D"){
        $d=$d+1;
      }
      else if($grade=="E"){
        $e=$e+1;
      }

    }

    ?>
      <tr>
        <td>A</td>
        <td><?php echo $a ?></td>
      </tr>
      <tr>
        <td>B</td>
        <td><?php echo $b ?></td>
      </tr>
      <tr>
        <td>C</td>
        <td><?php echo $c ?></td>
      </tr>
      <tr>
        <td>D</td>
        <td><?php echo $d ?></td>
      </tr>
      <tr>
        <td>E</td>
        <td><?php echo $e ?></td>
      </tr>
      <?php
    
     mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
<?php } ?>
</div>
</div>
</div>         
 </div>

    <script>
function Search() {
  var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("Search");
    filter = input.value.toUpperCase();
    table = document.getElementById("students");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
             if (tr[i].id != 'heads'){tr[i].style.display = "none";}
        }
    }
}
</script>
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
