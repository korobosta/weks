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

          <h1 class="page-header">Unit Performance      <button type="text" class="btn btn-info" onclick="printContent('stud')" >
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
        <img style="margin-left: 40%;" src="asset/images/logo.png"><br><br>
       <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

       <table>
	<tr>
		<td style="width:20%;">
		
		</td>
		<td style="width:400px;font-size:12px;line-height:1mm;text-align:center" >
		<p><b>WEKS COLLEGE</b></p>
		<p style="padding:5px; font-weight: bold; color:green" >Performance for Units</p>
		</td>
	</tr>
</table>
<?php
include 'db.php';
$user_id=$_SESSION['ID'];
$query=$conn->query("SELECT * from subjects");
while($row1=mysqli_fetch_array($query)){


?>
<h3> <?php echo $row1['SUBJECT'] ?></h3>
  <table id="students" class="table table-bordered" >
    <thead>
      <tr id="heads">
        <td style="width:20%">Student</th>
        <td style="width:20%">Unit</th>
        <td style="width:10%">Marks/Grade</th>
        <td style="width:10%">Academic Year</th>
        <td style="width:10%">Semester</th>
        <td style="width:10%">Study Year</th>


      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $subject_id=$row1['SUBJECT_ID'];
    
    $sql=  mysqli_query($conn, "SELECT * FROM registered_units left join grade on registered_units.semester=grade.grade_id JOIN school_year ON registered_units.school_year=school_year.SY_ID JOIN subjects ON registered_units.unit=subjects.SUBJECT_ID JOIN students ON registered_units.student=students.STUDENT_ID join user on students.USER=user.USER_ID WHERE registered_units.unit='$subject_id'");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)) {
       // $sql2=  mysqli_query($conn, "SELECT * FROM student_info left join program on student_info.PROGRAM=program.PROGRAM_ID WHERE STUDENT_ID = '".$row['STUDENT_ID']."' ");
       //   while($row2 = mysqli_fetch_assoc($sql2)) {


    ?>
      <tr>

        <td><?php echo $row['LASTNAME'] . ' ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        <td><?php echo $row['SUBJECT'] ?></td>
        <td><?php echo $row['marks'] ?>  <?php echo calculate_grade($row['marks']);  ?></td>
        <td><?php echo $row['school_year'] ?></td>
        <td><?php echo $row['grade'] ?></td>
        <td><?php echo $row['study_year'] ?></td>
      </tr>
      <?php
    // }
    } mysqli_close($conn);
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
