<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

 
$registration_number=$_POST['registration_number'];
$pg_name=$_POST['pg_name'];
$pg_address=$_POST['pg_address'];
$pg_phone=$_POST['pg_phone'];
$hs_name=$_POST['hs_name'];
$hs_grade=$_POST['hs_grade'];
$hs_year_completed=$_POST['hs_year_completed'];
$program=$_POST['program'];
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$pass=md5($_POST['password']);
$address=$_POST['address'];
$gender=$_POST['gender'];
$email = $_POST['email'];
$user = $_SESSION['ID'];
$user_type="STUDENT";
$dob=$_POST['dob'];
$program=$_POST['program'];
include 'db.php';



$search_query = mysqli_query($conn, "SELECT * FROM students WHERE REGISTRATION_NUMBER = '$registration_number'");
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			$_SESSION['error']="Registration number is not available";
			"<script>
			alert('Registration number is not available.');
			 location.replace(document.referrer);
			</script>";
		}else{

			print($pass);

			$user_sql="INSERT INTO user(LASTNAME,FIRSTNAME,MIDDLE_NAME,USER_TYPE,ADDRESS,GENDER,EMAIL,DOB,USERNAME,PASSWORD)
			          VALUES('$lname','$fname','$mname','$user_type','$address','$gender','$email','$dob','$email','$pass')

			";
			$query=$conn->query($user_sql);
			if ($query){
				$user_id=mysqli_insert_id($conn);
				$insert_student=$conn->query("INSERT INTO students(REGISTRATION_NUMBER,PG_NAME,PG_ADDRESS,PG_PHONE,HS_NAME,HS_GRADE,HS_YEAR_COMPLETED,PROGRAM,USER)
					VALUES('$registration_number','$pg_name','$pg_address','$pg_phone','$hs_name','$hs_grade','$hs_year_completed','$program','$user_id')
					");
				if($insert_student){
					mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) VALUES ('added $fname $lname as new student','$user',NOW() )");
					$_SESSION['success']="Student was added successfully";

				}
				else{
					$delete=$conn->query("DELETE FROM user WHERE id=$user_id");
					$error=$conn->error;
					$_SESSION['error']=$error;
					
				 "<script>
			alert('Failed to add user.Error: ".$error."');
			</script>";

				}
				
			}
			else{
				$error=$conn->error;
				$_SESSION['error']=$error;				

				 "<script>
			alert('Failed to add user.Error: ".$error."');
			</script>";

			}

		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $fn $ln as new student','$user',NOW() )");
		


		}
	
	}
mysqli_close($conn);

  ?>