<?php 
include 'db.php';

$query = mysqli_query($conn,"SELECT * FROM school_year where status='Yes' ");
$s = mysqli_fetch_assoc($query);
$school_year=$s['school_year'];
?>




 <ul class="nav navbar-nav side-nav">
 <li>
<a href="rms.php?page=home"><i class="fa fa-fw fa-dashboard"></i>Lecturer Dashboard</a>
</li>
<li>
<a id=demo1 href="javascript:void(0)" data-toggle="collapse" data-target="#masterlistCollapse"><i class="fa fa-fw fa-files-o"></i> Main <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="masterlistCollapse" class="collapse">
    <li>
        <a href="rms.php?page=registered_units"><i class="fa fa-fw fa-users"></i>Units</a>
    </li>
    
</ul>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#reportsCollapse"><i class="fa fa-fw fa-file"></i> Reports       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="reportsCollapse" class="collapse">
        <li>
            <a href="rms.php?page=lecturer_student_scores"><i class="fa fa-fw fa-files-o"></i>Scores</a>
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

                