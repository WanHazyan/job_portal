<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked register button
if(isset($_POST)) {
	$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
	$ic_no = mysqli_real_escape_string($conn, $_POST['ic_no']);
	$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$race = mysqli_real_escape_string($conn, $_POST['race']);
	$ic_no = mysqli_real_escape_string($conn, $_POST['ic_no']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$highest_qualification = mysqli_real_escape_string($conn, $_POST['highest_qualification']);
  //$university = mysqli_real_escape_string($conn, $_POST['university']);
	$major = mysqli_real_escape_string($conn, $_POST['major']);
	$current_position = mysqli_real_escape_string($conn, $_POST['current_position']);
	$position_applied = mysqli_real_escape_string($conn, $_POST['position_applied']);
	$current_monthly_salary = mysqli_real_escape_string($conn, $_POST['current_monthly_salary']);
	$expected_monthly_salary = mysqli_real_escape_string($conn, $_POST['expected_monthly_salary']);
	$prefered_working_location = mysqli_real_escape_string($conn, $_POST['prefered_working_location']);
	$avaibility = mysqli_real_escape_string($conn, $_POST['avaibility']);
	$malay = mysqli_real_escape_string($conn, $_POST['malay']);
	$english = mysqli_real_escape_string($conn, $_POST['english']);	
	$mandarin = mysqli_real_escape_string($conn, $_POST['mandarin']);
	$other = mysqli_real_escape_string($conn, $_POST['other']);
	$aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);
	
	
	if($_POST['university']=="others")
	{
		$university = mysqli_real_escape_string($conn, $_POST['university1']);
	}
	else
	{
		$university = mysqli_real_escape_string($conn, $_POST['university']);
	}

    
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$password = base64_encode(strrev(md5($password)));

    //sql query to check if email already exists or not
    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    //if email not found then we can insert new data
    if($result->num_rows == 0) {

            //This variable is used to catch errors doing upload process. False means there is some error and we need to notify that user.
    $uploadOk = true;



	// Code for image
	if(is_uploaded_file ( $_FILES['image']['tmp_name'] )) {

		$folder_dir = "../uploads/logo/";

		$base = basename($_FILES['image']['name']); 

		$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 

		$file = uniqid() . "." . $imageFileType; 
	  
		$filename = $folder_dir .$file;  

		if(file_exists($_FILES['image']['tmp_name'])) { 

			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType== "jpeg")  {

				if($_FILES['image']['size'] < 500000) { // File size is less than 5MB

					//If all above condition are met then copy file from server temp location to uploads folder.
					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);

				} else {
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					header("Location: adduser.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
				header("Location: adduser.php");
				exit();
			}
		}
	} else {
		$uploadOk = false;
	}
  // Code for resume

 
    $folder_dir = "uploads/resume/";
    $base = basename($_FILES['resume']['name']); 
    $resumeFileType = pathinfo($base, PATHINFO_EXTENSION); 
    $file1 = uniqid() . "." . $resumeFileType;   
    $filename = $folder_dir .$file1;  
    if(file_exists($_FILES['resume']['tmp_name'])) { 

        if($resumeFileType == "pdf"|| $resumeFileType == "doc")  {
            if($_FILES['resume']['size'] < 500000) { 
			
                move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);

            } else {
              
                $_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
                $uploadOk = false;
            }
        } else {
        
            $_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
            $uploadOk = false;
        }
    } else {
            //File not copied to temp location error.
            $_SESSION['uploadError'] = "Something Went Wrong. File Not Uploaded. Try Again.";
            $uploadOk = false;
        }

    //If there is any error then redirect back.
    if($uploadOk == false) {
        header("Location: register-candidates.php");
        exit();
    }

        $hash = md5(uniqid());


        //sql new registration insert query
		$sql="INSERT INTO users (user_name, ic_no, gender, race, email, password, address, nationality, contactno, highest_qualification, university, major, current_position,
		position_applied, current_monthly_salary, expected_monthly_salary, prefered_working_location, avaibility, malay, english, mandarin, other, logo, resume, hash, aboutme) VALUES
		('$user_name', '$ic_no', '$gender', '$race', $email', '$password', '$address', '$nationality', '$contactno', '$highest_qualification', '$university', '$major', '$current_position',
		'$position_applied', '$current_monthly_salary', '$expected_monthly_salary', '$prefered_working_location', '$avaibility', '$malay', '$english', '$mandarin',
		'$other', '$file', '$file1', '$hash', '$aboutme')";
		
		
		
        if($conn->query($sql)===TRUE) {
            // Send Email

            // $to = $email;

            // $subject = "Job Portal - Confirm Your Email Address";

            // $message = '

            // <html>
            // <head>
            //  <title>Confirm Your Email</title>
            // <body>
            //  <p>Click Link To Confirm</p>
            //  <a href="yourdomain.com/verify.php?token='.$hash.'&email='.$email.'">Verify Email</a>
            // </body>
            // </html>
            // ';

            // $headers[] = 'MIME-VERSION: 1.0';
            // $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            // $headers[] = 'To: '.$to;
            // $headers[] = 'From: hello@yourdomain.com';
            // //you add more headers like Cc, Bcc;

            // $result = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 

            // if($result === TRUE) {

            //  //If data inserted successfully then Set some session variables for easy reference and redirect to login
            //  $_SESSION['registerCompleted'] = true;
            //  header("Location: login.php");
            //  exit();

            // }

            // //If data inserted successfully then Set some session variables for easy reference and redirect to login
            $_SESSION['registerCompleted'] = true;
            header("Location: login-candidates.php");
            exit();
        } else {
            //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else {
        //if email found in database then show email already exists error.
        $_SESSION['registerError'] = true;
        header("Location: candidate-register.php");
        exit();
    }

    //Close database connection. Not compulsory but good practice.
    $conn->close();

} else {
    //redirect them back to register page if they didn't click register button
    header("Location: candidate-register.php");
    exit();
}
?>