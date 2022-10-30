<!DOCTYPE html>
<html>
<head>
	<title>Weks College Payment Receipt</title>
	<style type="text/css">
			.invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .button{
        position: relative;
        margin-left: 1130px;
    }
</style>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</head>
<body onload="startTime();">
<form>
<div id="div1">
<div class="print">
<div class="invoice-box">
    <?php
    include('db.php');
    session_start();
    $id=$_GET['id'];
    $results = $conn->query("SELECT payments.date_of_payment,payments.paid_by,payments.id,payments.amount,payments.payment_date,payments.payment_method,program.PROGRAM,program.no_of_years,grade.grade,school_year.school_year,user.EMAIL,user.FIRSTNAME,user.MIDDLE_NAME,user.LASTNAME,user.EMAIL,student_study_year.study_year,students.REGISTRATION_NUMBER FROM payments left join grade on payments.semester=grade.grade_id JOIN school_year ON payments.school_year=school_year.SY_ID JOIN  students ON payments.student=students.STUDENT_ID join user on students.USER=user.USER_ID JOIN program ON students.PROGRAM=program.PROGRAM_ID JOIN student_study_year ON payments.study_year=student_study_year.id where payments.id='$id'"); 
    if(!$results){
        echo $conn->error;
    }
    $row=mysqli_fetch_array($results);
    $invoiceNumber=rand(1000,9999);
    ?>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img style="height: 50px;" src="asset/images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Receipt No: <strong><?php echo $row['id']; ?></strong><br>
                                Created at: <strong><?php echo $row['payment_date'];?></strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Weks College<br>
                                P.O BOX 001000<br>
                                BUNGOMA, KENYA<br>
                                +254712345678,
                            </td>
                            
                            <td>
                                <?php echo $row['FIRSTNAME']. ' '. $row['MIDDLE_NAME'].' '.$row['LASTNAME'];?>  <br>
                                <?php echo $row['EMAIL'];?><br>
                                <strong> Registration Number: </strong><?php echo $row['REGISTRATION_NUMBER'];?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    TRANSACTION ID
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    <?php echo $row['payment_method']; ?>
                </td>
                
                <td>
                    <?php echo $invoiceNumber;?>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Paid By
                </td>
                
                <td>
                    Payment Date
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    <?php echo $row['paid_by']; ?>
                </td>
                
                <td>
                    <?php echo $row['date_of_payment'];?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Course
                </td>
                
                <td>
                    Academic Year
                </td>
                
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo $row['PROGRAM']; ?>
                </td>
                
                <td>
                    <?php echo $row['school_year'];?>
                </td>
                
            </tr>
            <tr class="heading">
                <td>
                    Study Year
                </td>
                <td>
                    Semester
                </td>
            </tr>
            <tr class="item">
                <td>
                    <?php echo $row['study_year'];?>
                </td>
                <td>
                    <?php echo $row['grade'];?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Amount: <?php echo $row['amount'];?>
                </td>
            </tr>
            <tr>
                <td>Produced By <strong><?php echo $_SESSION['fname'] ?></strong></td>
                <td>Generated on <strong><?php echo date('Y-m-d H:i A') ?></strong> </td>
            </tr>
        </table>
    </div>

</div>
</div>
</form>
<div class="button">
    <button onclick="printContent('div1')">Print</button>
    <a href="rms.php?page=record_payment">Done</a>
</div>

</body>
</html>