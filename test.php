 $university = mysqli_real_escape_string($conn, $_POST['university']); with 	if($_POST['university']=="others")
	{
		$university = mysqli_real_escape_string($conn, $_POST['university1']);
	}
	else
	{
		$university = mysqli_real_escape_string($conn, $_POST['university']);
	}