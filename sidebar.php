<?php 
include 'db.php';

$query = mysqli_query($conn,"SELECT * FROM school_year where status='Yes' ");
$s = mysqli_fetch_assoc($query);
$school_year=$s['school_year'];
?>




 <ul class="nav navbar-nav side-nav">
 <li>
<a href="rms.php?page=home"><i class="fa fa-fw fa-dashboard"></i>Admin Dashboard</a>
</li>
<li>
<a id=demo1 href="javascript:void(0)" data-toggle="collapse" data-target="#masterlistCollapse"><i class="fa fa-fw fa-files-o"></i> Main <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="masterlistCollapse" class="collapse">
    <li>
        <a href="rms.php?page=Students"><i class="fa fa-fw fa-users"></i> Students List</a>
    </li>
    <li class="">
        <a href="rms.php?page=subjects"><i class="fa fa-fw fa-book"></i> Units List</a>
    </li>
    <li class="">
        <a href="rms.php?page=program"><i class="fa fa-fw fa-bars"></i> Course</a>
    </li>
</ul>
</li>
<!-- <li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#recordsCollapse"><i class="fa fa-fw fa-file"></i> Records       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul class="collapse" id="recordsCollapse">
        <li>
            <a href="rms.php?page=records"><i class="fa fa-fw fa-files-o"></i>Academic Record </a>
        </li>
        <li>
            <a href="rms.php?page=candidates&sy=<?php echo $school_year ?>"><i class="fa fa-fw fa-users"></i> Promote Students </a>
        </li>
        <li>
            <a href="rms.php?page=candidates_list&sy=<?php echo $school_year ?>"><i class="fa fa-fw fa-file-o"></i> Students List </a>
        </li>
    </ul>
</li> -->
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#reportsCollapse"><i class="fa fa-fw fa-file"></i> Reports       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="reportsCollapse" class="collapse">
        <li>
            <a href="rms.php?page=students_report"><i class="fa fa-fw fa-files-o"></i> Students</a>
        </li>
        <li>
            <a href="rms.php?page=courses_report"><i class="fa fa-fw fa-files-o"></i> Courses</a>
        </li>
        <li>
            <a href="rms.php?page=units_report"><i class="fa fa-fw fa-files-o"></i> Units</a>
        </li>
        <li>
            <a href="rms.php?page=student_performance_report_admin"><i class="fa fa-fw fa-files-o"></i> Student Performance</a>
        </li>
        <li>
            <a href="rms.php?page=finance_fee_payment_report"><i class="fa fa-fw fa-files-o"></i> Fee Payment</a>
        </li>
        
    </ul>
</li>
<li>
    <a href="rms.php?page=users"><i class="fa fa-users"></i> Users</a>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#maintenanceCollapse"><i class="fa fa-fw fa-gears"></i> Maintenance       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="maintenanceCollapse" class="collapse">
        <li>
            <a href="rms.php?page=school_year"><i class="fa fa-fw fa-calendar"></i>School Year</a>
        </li>
        <li>
            <a href="rms.php?page=grade"><i class="fa fa-fw fa-file-text-o"></i> Semester(s)</a>
        </li>
        <li>
            <a href="rms.php?page=configure_fee"><i class="fa fa-fw fa-file-text-o"></i> Configure Fee </a>
        </li>
        
    </ul>
</li>

</ul>
<script>
    $('.side-nav li a').each(function(){
        if((location.href).includes($(this).attr('href')) == true){
            $(this).closest('li').addClass("active")
            console.log($(this).closest('li').parent('ul').attr('id'))
            if($(this).closest('li').parent('ul').hasClass('collapse') == true){
                $('[data-target="#'+$(this).closest('li').parent('ul').attr('id')+'"]').click()
            }
        }
    })
</script>

                