<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Britay Asia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Britay</b> Asia</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="../jobs.php">Jobs</a>
          </li>       
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-user"></i> Dashboard</a></li>
				  <li class="active"><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                  <li><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Edit Profile</i></h2>
           <form action="update-profile.php" method="post" enctype="multipart/form-data">
                                   
								<?php
								//Sql to get logged in user details.
								$sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
								$result = $conn->query($sql);

								//If user exists then show his details.
								if($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								?>
								<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="user_name" type="text" id="user_name">	Full Name</label>
										<input name="user_name" class="form-control" type="text" maxlength="100" value="<?php echo $row['user_name'] ?>" required=""/>	
                                        </div>
                                        </div>
                                    </div>
									
								<!-- section 1-->	
								
								<div class="row">
									<div class="col-md-6">
                                    <div class="form-group">
                                    <label for="ic_no" type="text" id="ic_no" maxlength="12">NRIC</label>
									<input name="ic_no"type="text" class="form-control" value="<?php echo $row['ic_no'] ?>" readonly>
                                     </div>
                                     </div>
                                        
								<div class="col-md-6">
                                     <div class="form-group">
                                     <label for="nationality" type="text" id="nationality">Nationality</label>
                                     <input name="nationality" class="form-control" type="text" id="nationality" value="<?php echo $row['nationality'] ?>"/>
                                        </div>
                                       </div>
                                    </div>

									<!--first section -->
									
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender" type="text" id="gender">Gender</label>
                                                <input  name="gender" class="form-control" type="text" id="gender" value="<?php echo $row['gender'] ?>"/>
                                            </div>
                                        </div>
                                       
									   <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="race" type="text" id="race">Race</label>
                                                <input type="text" class="form-control" name="race" id="race" value="<?php echo $row['race'] ?>"/>
                                            </div>
                                        </div>
                                    </div>

									<!-- second section -->
									
									 <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contactno" type="text" id="contact_no">Contact No</label>
                                                <input  name="contactno" class="form-control" type="text" id="contact_no" value="<?php echo $row['contactno'] ?>">
                                            </div>
                                        </div>
                                       
									   <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" type="text" id="email">Email</label>
                                                <input type="text" class="form-control" type="text" id="email" value="<?php echo $row['email'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>	
									
									<!--other add -->
									
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                        <label for="address" type="text" id="address">Current Address</label>
										<textarea id="address" name="address" class="form-control" rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
									
									<!-- third section -->
									
									<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="highest_qualification" type="text" id="highest_qualification">Highest Qualification</label>
										<input name="highest_qualification" class="form-control" type="text" maxlength="100" value="<?php echo $row['highest_qualification'] ?>"/>
                                        </div>
                                        </div>
                                    </div>
									
									<!--another section -->
									<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="university" type="text" id="university">University</label>
										<input name="university" class="form-control" type="text" maxlength="100" value="<?php echo $row['university'] ?>"/>
                                        </div>
                                        </div>
                                    </div>
									
									<!--another section -->
									<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="major" type="text" id="major">Major</label>
										<input name="major" class="form-control" type="text" maxlength="100" value="<?php echo $row['major'] ?>"/>
                                        </div>
                                        </div>
                                    </div>
								
									<!-- another section-->
                                    
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="current_position" type="text" id="current_position">Current Position</label>
                                                <input type="text" class="form-control" name="current_position" value="<?php echo $row['current_position'] ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="position_appled" type="text" id="position_applied">Position Applied</label>
                                                <input type="text" class="form-control" name="position_applied" value="<?php echo $row['position_applied'] ?>">
                                            </div>
                                        </div>
										</div>
										
										
										<!--another section -->
										
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="current_monthly_salary" type="text" id="current_monthly_salary">Current Monthly Salary</label>
                                                <input type="text" class="form-control" name="current_monthly_salary" value="<?php echo $row['current_monthly_salary'] ?>">
                                            </div>
                                        </div>
                                        
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="expected_monthly_salary" type="text" id="expected_monthly_salary">Expected Monthly Salary</label>
                                                <input type="text" class="form-control" name="expected_monthly_salary" value="<?php echo $row['expected_monthly_salary'] ?>">
                                            </div>
                                        </div>
										</div>
										
									<!--another section -->	
								<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="prefered_working_location" type="text" id="prefered_working_location">Prefered Working Location</label>
										<input name="prefered_working_location" class="form-control" type="text" maxlength="100" value="<?php echo $row['prefered_working_location'] ?>" />
                                        </div>
                                        </div>
										
									<div class="col-md-6">
                                      <div class="form-group">
                                        <label for="avaibility" type="text" id="avaibility">Avaibility</label>
									<select name = "avaibility" class="form-control " type="text" id="avaibility" value="<?php echo $row['avaibility'] ?>">
										<option value="">-- select one --</option>
										<option value="Immediately">Immediately</option>
										<option value="One Month">One Month</option>
										<option value="Two Month">Two Month</option>
										<option value="Three Month">Three Month</option>					
									</select>
                                        </div>
                                        </div>
										</div>

									
									<div class="row">
									<div class="col-md-12">
									<div class="form-group">
									<label for="language" type="text" id="language">Language Proficiency</label><br />
			                         
									 &nbsp&nbsp&nbsp<p>Proficiency level 0-poor; 10-excellent</p>


									<table border="2" bordercolor="gray" align="center">

									<tr> 
										<td>
											<label for="malay" type="text" id="malay" placeholder="Malay" style="color:black; width:200px"><b>Malay</b></label><br />
										</td> 

										<td>
											<input name="malay" type="text" class="form-control" maxlength="100" style="width: 200px" value="<?php echo $row['malay'] ?>"/>

										</td> 
									</tr>  

									<tr> 
										<td>
											<label for="english" type="text" id="english" placeholder="English" style="color:black; width:200px"><b>English</b></label><br />
										</td> 

										<td>
											<input name="english" type="text" class="form-control" maxlength="100" style="width: 200px" value="<?php echo $row['english'] ?>"/>

										</td> 
									</tr>  

									<tr> 
										<td>
											<label for="mandarin" type="text" id="mandarin" placeholder="Mandarin" style="color:black; width:200px"><b>Mandarin</b></label><br />
										</td> 

										<td>
											<input name="mandarin" type="text" class="form-control" maxlength="100" style="width: 200px" value="<?php echo $row['mandarin'] ?>"/>

										</td> 
									</tr>

									<tr> 
										<td>
											<label for="other" type="text" id="other" placeholder="Other" style="color:black; width:200px"><b>Others</b></label><br />
										</td> 

										<td>
											<input name="other" type="text" class="form-control" maxlength="100" style="width: 200px" value="<?php echo $row['other'] ?>"/>

										</td> 
									</tr>  

									</table>
									
									</div>
									</div>
									</div>
										
										

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                       
                                            <label for="aboutme" type="text" id="aboutme"><b>About Me</b></label><br />
											<p>Summarize your employement history (Not more than 100 words)</p>
											<textarea id="aboutme" name="aboutme" class="form-control" rows="5" placeholder="About Me"><?php echo $row['aboutme']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
									
										<!--another section -->
										
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Upload/Change Resume</label>
												<input type="file" name="resume" class="btn btn-default">
                                            </div>
                                        </div>
                                        
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Change Profile Image</label>
												<input type="file" name="image" class="btn btn-default">
												<?php if($row['photo'] != "") { ?>
												<img src="../uploads/candidate/<?php echo $row['photo']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
											<?php } ?>
                                            </div>
                                        </div>
										</div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
									
										<?php
								
								}
							}
							?>
                                </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
