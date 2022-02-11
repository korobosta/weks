
<script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_students.php',
          type: 'POST',
          data: 'id='+uid,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script>
   <?php
  include 'newstudent.php'; 
  ?>

          <h1 class="page-header">STUDENTS <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
      <i class="glyphicon glyphicon-plus"></i> New Entry</button></h1>
      <?php if (isset($_SESSION['error'])){

        ?>
        <b style="color:red; padding: 10px"> <?php echo $_SESSION['error'];  ?></b><br>

      <?php 
      unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])){
        ?>
        <b style="color:green; padding: 10px"> <?php echo $_SESSION['success'];  ?></b><br>

        <?php 
        unset($_SESSION['success']);
      }
      ?>
  
 

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Student</h4>
        </div>
        <div class="modal-body">

 

        
 <form class="form-horizontal" method="post">
<fieldset>
<div class="container">

<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Student's Personal Details </b></h4>
</div>
<br>
<br>
<div class="col-md-4">
<br>
<div class="form-group">
  <label class="col-xs-4 control-label" for="lrn">Reg No.</label>  
  <div class="col-xs-6">
  <input id="lrn" name="registration_number" type="text" placeholder="Enter Reg " maxlength="12" class="form-control input-xs" required="">
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-xs-4 control-label" for="name">Name</label>
  <div class="col-xs-8">
    <div class="input-group">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="lname" placeholder="Lastname"  type="text" required="">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="fname" placeholder="Firstname"  type="text" required="">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="mname" placeholder="Middlename"  type="text" required="">

    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-xs-4 control-label" for="gender">Gender</label>
  <div class="col-xs-4">
    <select id="gender" name="gender" class="form-control input-xs">
      <option value="MALE">Male</option>
      <option value="FEMALE">Female</option>
    </select>
  </div>
</div>

<!-- <div class="form-group">
  <label class="col-xs-4 control-label" for="address">Birth Place</label>
  <div class="col-xs-8">
    <div class="input-group">
      <input id="address" class="form-control"
      style="text-transform: capitalize;" name="bp" placeholder="Birth Place"  type="text" required="">    </div>
  </div>
</div> -->
</div>


<div class="col-md-4">
<br>
<br>
<br>

<div class="form-group">
  <label class="col-xs-5 control-label" for="dob">Date of Birth</label>  
  <div class="col-xs-7">
  <input id="dob" name="dob" type="date" placeholder="YYYY-MM-DD" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-xs-5 control-label" for="pob">ADDRESS</label>  
  <div class="col-xs-7">
  <input id="pob" name="address" type="text" style="text-transform: capitalize;" placeholder="Enter Student Address" class="form-control input-xs" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-xs-5 control-label" for="pob">EMAIL(Username)</label>  
  <div class="col-xs-7">
  <input id="pob" name="email" type="email" style="text-transform: capitalize;" placeholder="Enter Student Email" class="form-control input-xs" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-xs-5 control-label" for="pob">PASSWORD</label>  
  <div class="col-xs-7">
  <input id="pob" name="password" type="password" style="text-transform: capitalize;" placeholder="Enter Student Password" class="form-control input-xs" required="">
  </div>
</div>


<div class="form-group">
  <label class="col-xs-5 control-label" for="pg">Parent/Guardian</label>
  <div class="col-xs-7">
    <div class="input-group">
      <input id="pg" name="pg_name" class="form-control" style="text-transform: capitalize;" placeholder="Enter Full Name" type="text" required="">
      <input id="pg" name="pg_address" class="form-control" style="text-transform: capitalize;" placeholder="Enter Address" type="text" required="">
      <input id="pg" name="pg_phone" class="form-control" style="text-transform: capitalize;" placeholder="Enter phone" type="text" required="">

    </div>
  </div>
</div>
</div>
<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>High School Details </b></h4>
</div>
<br>
<br>
<div class="col-md-12">
<br>
<div class="form-group">
  <label class="col-xs-2 control-label" for="icc">High School Attended</label> 
  <br>
  <div class="col-xs-6">
  <input id="icc" name="hs_name" type="text"
  style="text-transform: capitalize;"
   placeholder="Enter School " class="form-control input-xs" required="">
  </div>
</div>
  

  <div class="form-group">
  <label class="col-xs-2 control-label" for="tn">Year of Completing High School</label> 
  <br>
  <div class="col-xs-6">
  <input id="tn" name="" type="hs_year_completed" style="width:100px;text-align:right"
   class="form-control input-xs" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-xs-2 control-label" for="ave">KCSE GADE</label> 
  <div class="col-xs-6">
  <input id="ave" name="hs_grade" type="text" style="width:100px;text-align:right"
   class="form-control input-xs" required="">

  </div>
</div>
</div>
<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Program Enrolled </b></h4>
</div>
<br><br>
<div class="form-group">
  <label class="col-xs-4 control-label" for="Prog">Course</label>
  <div class="col-xs-4">
    <select id="prog" name="program" class="form-control input-xs" required="">
    <option></option>
    <?php
    include 'db.php';
    $sql = mysqli_query($conn,"SELECT * from program Order by PROGRAM ASC");
    while($row=mysqli_fetch_assoc($sql)){
    ?>
      <option value="<?php echo $row['PROGRAM_ID'] ?>"><?php echo $row['PROGRAM'] ?></option>
      <?php
    }
    mysqli_close($conn);
      ?>
    </select>
  </div>
</div>


</div>
</fieldset>





        </div>
        <div class="modal-footer">
        <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
      <input type="submit" class="btn btn-success " name="submitb" value="Submit Form">
      
        </form>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>



       <div class="col-md-12">
          
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Students List</h3>

        </div> 
        <div class="panel-body"> 
  <table id="students" class="table table-bordered table-condensed">
    <thead>
      <tr id="heads">
        <th style="width:10%;text-align:center">REG NO.</th>
        <th style="width:30%;text-align:center">Name</th>
        <th style="width:20%;text-align:center">Course</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM students JOIN program ON students.PROGRAM=program.PROGRAM_ID JOIN user ON students.USER=user.USER_ID order by user.LASTNAME ");
    
    while($row = mysqli_fetch_array($sql)) {
    ?>
      <tr>


        <td><?php echo $row['REGISTRATION_NUMBER'] ?></td>
        <td><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME']. ' ' . $row['MIDDLE_NAME'] ?></td>
        
        <td style="text-align:center"><?php echo $row['PROGRAM'] ?> </td>
        
     
      <td style="text-align:center"> 
     <a class="btn btn-info" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['STUDENT_ID'] ?>" id="getUser">View Profile</a>
     </td>
       </tr>

      <?php
    }
    mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>
</div> 
</div>

       <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                     <h4 class="modal-title">
                     <i class=""></i> PROFILE
                     </h4> 
                  </div> 
                       <div id="content">
                      
                     </div>
                  
                                 
              </div> 
            </div>
          </div>  



<script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script>
