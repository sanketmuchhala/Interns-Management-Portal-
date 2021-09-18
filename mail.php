<?php
error_reporting(0);
$message = '';
include_once('config.php');
if (isset($_POST["submit"])) {
    //Store in Database
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $ph = $_POST['mobile'];
    $cllg = $_POST['additional_information'];


    //storing all necessary data into the respective variables.
    $file = $_FILES['resume'];

    $file_name = $file['name'];
    $file_type = $file ['type'];
    $file_size = $file ['size'];
    $file_path = $file ['tmp_name'];
    // echo $file_path.'/upload/'.$file_name;


    //Restriction to the image. You can upload any types of file for example video file, mp3 file, .doc or .pdf just mention here in OR condition. 

    if($file_name!="" && ($file_type="pdf") && $file_size<=614400)
    // echo 'if 1';
    
    
    if(move_uploaded_file($file_path,'upload/'.$file_name))//"images" is just a folder name here we will load the file.
    // $query1=mysqli_query($con,"insert into interns (resumepdf) values('$file_name')");//mysql command to insert file name with extension into the table. Use TEXT datatype for a particular column in table.
    // echo 'if 2';

    $query=mysqli_query($con,"insert into interns (name,gender,age,email,ph,addr,org,dob,resumepdf) values ('$name','$gender','$age','$email','$ph','$address','$cllg','$dob','$file_name')");
    // echo $query;
    // if($query1==true)
    // {
    //     echo "File Uploaded";
    // }

    if($query)
    {
	    echo "<script>alert('Successfully Registered.');</script>";
    }

    //Trigger Email
   
    $path = 'upload/' . $_FILES["resume"]["name"];
    move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
    $message = '

    Dear Interviewer, 
    
    A new application for internship has been submitted by '. $_POST["name"] .' Details are shown in table below anlong with resume attached at bottom of email. Kindly open your portal to schedule an interview if you are intrested.

    Login to admins portal for further process.

    Admins Portal: 
    
		<h3 align="center">Applicant Details</h3>
		<table border="0.2" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">' . $_POST["name"] . '</td>
			</tr>
			<tr>
				<td width="30%">Address</td>
				<td width="70%">' . $_POST["address"] . '</td>
			</tr>
			<tr>
				<td width="30%">Email Address</td>
				<td width="70%">' . $_POST["email"] . '</td>
			</tr>
			<tr>
				<td width="30%">Age</td>
				<td width="70%">' . $_POST["age"] . '</td>
			</tr>
            <tr>
				<td width="30%">Age</td>
				<td width="70%">' . $_POST["dob"] . '</td>
			</tr>
			<tr>
				<td width="30%">Gender</td>
				<td width="70%">' . $_POST["gender"] . '</td>
			</tr>
			<tr>
				<td width="30%">Phone Number</td>
				<td width="70%">' . $_POST["mobile"] . '</td>
			</tr>
			<tr>
				<td width="30%">College/Employment</td>
				<td width="70%">' . $_POST["additional_information"] . '</td>
			</tr>
		</table>
	';

    require 'class/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP

// ADD YOUR DETAILS HERE

    $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '465';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'forsendingemails814@gmail.com';                    //Sets SMTP username
    $mail->Password = 'NehalJayesh@80';                    //Sets SMTP password
    $mail->SMTPSecure = 'ssl';                            //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = 'forsendingemails814@gmail.com';                    //Sets the From email address for the message
    $mail->FromName = 'Sanket Muchhala';                //Sets the From name of the message
    $mail->AddAddress('sanket.muchhala@gmail.com', 'Sanket Muchhala');        //Adds a "To" address

// ADD YOUR DETAILS HERE
    
    $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                            //Sets message type to HTML
    $mail->AddAttachment($path);                    //Adds an attachment from a path on the filesystem
    $mail->Subject = 'Application for INTERNSHIP';                //Sets the Subject of the message
    $mail->Body = $message;                            //An HTML or plain text message body
    if ($mail->Send())                                //Send an Email. Return true on success or false on error
    {
        $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
        unlink($path);
    } else {
        $message = '<div class="alert alert-danger">There is an Error</div>';
    }
}