<?php session_start(); 
$sub_query=" WHERE PROGRAM.PROGRAM != '' ";

if(isset($_POST['no_of_years'])){
  $no_of_years=$_POST['no_of_years'];
  if($no_of_years != ''){
    $sub_query=$sub_query.' AND PROGRAM.no_of_years='.$no_of_years;
  }
}

if(isset($_POST['category'])){
  $category=$_POST['category'];
  if($category != ''){
    $sub_query=$sub_query." AND PROGRAM.PROGRAM LIKE '".$category."%'";
  }
}


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

          <h1 class="page-header">Courses Report      <button type="text" class="btn btn-info" onclick="printContent('stud')" >
    <i class="glyphicon glyphicon-print"></i>PRINT</button>
</h1>

<div class="col-md-6" id="">
  <div style="background-color:rgba(208, 212, 209, 0.23);padding-left:30px">
    <div class="row main">
      <div class="main-login main-center">
        <h3 id="head">Filter</h3>
        <form class="" method="post">
          <div class="form-group">
            <label for="category" class="cols-sm-2 control-label">Category</label>
            <div class="cols-sm-4">
              <div class="input-group">
                <select name="category" class="form-control">
                  <option value="">Select Category</option>
                  <option>PHD</option>
                  <option>Master</option>
                  <option>Bachelor</option>
                  <option>Diploma</option>
                  <option>Certificate</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="no_of_years" class="cols-sm-2 control-label">Number of Years</label>
            <div class="cols-sm-4">
              <div class="input-group">
                <select name="no_of_years" class="form-control">
                  <option value="">Select Number of Years</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group ">
            <button type="submit" name="verify" class="btn btn-info" id="btn_add">Filter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

            
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
		<p style="padding:5px; font-weight: bold; color:green" >Courses Report</p>
		</td>
	</tr>
</table>
  <table id="students" class="table table-bordered" >
    <thead>
      <tr id="heads">
        <td style="width:20%">Course Name</th>
        <td style="width:20%">Description</th>
        <td style="width:10%">No of Years</th>


      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    
    $sql=  mysqli_query($conn, "SELECT * FROM program $sub_query");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)) {
       // $sql2=  mysqli_query($conn, "SELECT * FROM student_info left join program on student_info.PROGRAM=program.PROGRAM_ID WHERE STUDENT_ID = '".$row['STUDENT_ID']."' ");
       //   while($row2 = mysqli_fetch_assoc($sql2)) {


    ?>
      <tr>

        <td><?php echo $row['PROGRAM'] ?></td>
        <td><?php echo $row['DESCRIPTION'] ?></td>
        <td><?php echo $row['no_of_years'] ?></td>
      <?php
    // }
    } mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
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
