<?php
session_start();

require_once("db.php");

?>

<!DOCTYPE HTML>
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
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="css/style.css">
  
  
 <style>
 table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 14px;
		}
		
		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
		
 </style>
  		
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="navbar1">
			<div class="container">
			<div class="logo_div">
				<a href="index.php"><img src="uploads/office/britay.png" alt="" class="logo"></a>
			</div>
			
			<div class="navbar1_links">
				<ul class="menu">
					 <li>
            <a href="jobs.php">Jobs</a>
          </li>
          <li>
            <a href="candidate.php">Candidates</a>
          </li>
          <li>
            <a href="#">Company</a>
          </li>
          <li>
            <a href="#about">About Us</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login-candidates.php">Login</a>
          </li>
          <li>
            <a href="register-candidates.php">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>
				</ul>
			</div>
			</div>
		</div>

  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
          <h1 class="text-center margin-bottom-20">CREATE YOUR PROFILE</h1>
		  <h4 style="color:black;" class="text-center margin-bottom-10">Please register before applying for jobs</h4><br />

		  <form  method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">


<table border="0" cellpadding="5" cellspacing="0">
<p>
<tr> <td colspan="2">
<label for="user_name" type="text" id="user_name" placeholder="user_name" style="color:black;"><b>Full Name *</b></label><br />
<input name="user_name" class="form-control" type="text" maxlength="50" style="width: 560px" required />
</td> </tr>
</p>

<p>
<tr> <td>
<label for="ic_no" type="text" id="ic_no" placeholder="ic_no" style="color:black;"><b>NRIC *</b></label><br />
<input name="ic_no" class="form-control" type="text" maxlength="12" style="width: 235px" required />
</td> 

<td>
<label for="nationality" type="text" id="nationality" placeholder="Nationality" style="color:black;"><b>Nationality</b></label><br />
<select name="nationality" class="form-control" type="text" id="nationality" maxlength="50" style="width: 235px" >
					<option value="">-- select one --</option>
					<option value="afghan">Afghan</option>
					<option value="albanian">Albanian</option>
					<option value="algerian">Algerian</option>
					<option value="american">American</option>
					<option value="andorran">Andorran</option>
					<option value="angolan">Angolan</option>
					<option value="antiguans">Antiguans</option>
					<option value="argentinean">Argentinean</option>
					<option value="armenian">Armenian</option>
					<option value="australian">Australian</option>
					<option value="austrian">Austrian</option>
					<option value="azerbaijani">Azerbaijani</option>
					<option value="bahamian">Bahamian</option>
					<option value="bahraini">Bahraini</option>
					<option value="bangladeshi">Bangladeshi</option>
					<option value="barbadian">Barbadian</option>
					<option value="barbudans">Barbudans</option>
					<option value="batswana">Batswana</option>
					<option value="belarusian">Belarusian</option>
					<option value="belgian">Belgian</option>
					<option value="belizean">Belizean</option>
					<option value="beninese">Beninese</option>
					<option value="bhutanese">Bhutanese</option>
					<option value="bolivian">Bolivian</option>
					<option value="bosnian">Bosnian</option>
					<option value="brazilian">Brazilian</option>	
					<option value="british">British</option>
					<option value="bruneian">Bruneian</option>
					<option value="bulgarian">Bulgarian</option>
					<option value="burkinabe">Burkinabe</option>
					<option value="burmese">Burmese</option>
					<option value="burundian">Burundian</option>
					<option value="cambodian">Cambodian</option>
					<option value="cameroonian">Cameroonian</option>
					<option value="canadian">Canadian</option>
					<option value="cape verdean">Cape Verdean</option>
					<option value="central african">Central African</option>
					<option value="chadian">Chadian</option>
					<option value="chilean">Chilean</option>
					<option value="chinese">Chinese</option>
					<option value="colombian">Colombian</option>
					<option value="comoran">Comoran</option>
					<option value="congolese">Congolese</option>
					<option value="costa rican">Costa Rican</option>
					<option value="croatian">Croatian</option>
					<option value="cuban">Cuban</option>
					<option value="cypriot">Cypriot</option>
					<option value="czech">Czech</option>
					<option value="danish">Danish</option>
					<option value="djibouti">Djibouti</option>
					<option value="dominican">Dominican</option>
					<option value="dutch">Dutch</option>
					<option value="east timorese">East Timorese</option>
					<option value="ecuadorean">Ecuadorean</option>
					<option value="egyptian">Egyptian</option>
					<option value="emirian">Emirian</option>
					<option value="equatorial guinean">Equatorial Guinean</option>
					<option value="eritrean">Eritrean</option>
					<option value="estonian">Estonian</option>
					<option value="ethiopian">Ethiopian</option>
					<option value="fijian">Fijian</option>
					<option value="filipino">Filipino</option>
					<option value="finnish">Finnish</option>
					<option value="french">French</option>
					<option value="gabonese">Gabonese</option>
					<option value="gambian">Gambian</option>
					<option value="georgian">Georgian</option>
					<option value="german">German</option>
					<option value="ghanaian">Ghanaian</option>
					<option value="greek">Greek</option>
					<option value="grenadian">Grenadian</option>
					<option value="guatemalan">Guatemalan</option>
					<option value="guinea-bissauan">Guinea-Bissauan</option>
					<option value="guinean">Guinean</option>
					<option value="guyanese">Guyanese</option>
					<option value="haitian">Haitian</option>
					<option value="herzegovinian">Herzegovinian</option>
					<option value="honduran">Honduran</option>
					<option value="hungarian">Hungarian</option>
					<option value="icelander">Icelander</option>
					<option value="indian">Indian</option>
					<option value="indonesian">Indonesian</option>
					<option value="iranian">Iranian</option>
					<option value="iraqi">Iraqi</option>
					<option value="irish">Irish</option>
					<option value="israeli">Israeli</option>
					<option value="italian">Italian</option>
					<option value="ivorian">Ivorian</option>
					<option value="jamaican">Jamaican</option>
					<option value="japanese">Japanese</option>
					<option value="jordanian">Jordanian</option>
					<option value="kazakhstani">Kazakhstani</option>
					<option value="kenyan">Kenyan</option>
					<option value="kittian and nevisian">Kittian and Nevisian</option>
					<option value="kuwaiti">Kuwaiti</option>
					<option value="kyrgyz">Kyrgyz</option>
					<option value="laotian">Laotian</option>
					<option value="latvian">Latvian</option>
					<option value="lebanese">Lebanese</option>
					<option value="liberian">Liberian</option>
					<option value="libyan">Libyan</option>
					<option value="liechtensteiner">Liechtensteiner</option>
					<option value="lithuanian">Lithuanian</option>
					<option value="luxembourger">Luxembourger</option>
					<option value="macedonian">Macedonian</option>
					<option value="malagasy">Malagasy</option>
					<option value="malawian">Malawian</option>
					<option value="Malaysian">Malaysian</option>
					<option value="maldivan">Maldivan</option>
					<option value="malian">Malian</option>
					<option value="maltese">Maltese</option>
					<option value="marshallese">Marshallese</option>
					<option value="mauritanian">Mauritanian</option>
					<option value="mauritian">Mauritian</option>
					<option value="mexican">Mexican</option>
					<option value="micronesian">Micronesian</option>
					<option value="moldovan">Moldovan</option>
					<option value="monacan">Monacan</option>
					<option value="mongolian">Mongolian</option>
					<option value="moroccan">Moroccan</option>
					<option value="mosotho">Mosotho</option>
					<option value="motswana">Motswana</option>
					<option value="mozambican">Mozambican</option>
					<option value="namibian">Namibian</option>
					<option value="nauruan">Nauruan</option>
					<option value="nepalese">Nepalese</option>
					<option value="new zealander">New Zealander</option>
					<option value="ni-vanuatu">Ni-Vanuatu</option>
					<option value="nicaraguan">Nicaraguan</option>
					<option value="nigerien">Nigerien</option>
					<option value="north korean">North Korean</option>
					<option value="northern irish">Northern Irish</option>
					<option value="norwegian">Norwegian</option>
					<option value="omani">Omani</option>
					<option value="pakistani">Pakistani</option>
					<option value="palauan">Palauan</option>
					<option value="panamanian">Panamanian</option>
					<option value="papua new guinean">Papua New Guinean</option>
					<option value="paraguayan">Paraguayan</option>
					<option value="peruvian">Peruvian</option>
					<option value="polish">Polish</option>
					<option value="portuguese">Portuguese</option>
					<option value="qatari">Qatari</option>
					<option value="romanian">Romanian</option>
					<option value="russian">Russian</option>
					<option value="rwandan">Rwandan</option>
					<option value="saint lucian">Saint Lucian</option>
					<option value="salvadoran">Salvadoran</option>
					<option value="samoan">Samoan</option>
					<option value="san marinese">San Marinese</option>
					<option value="sao tomean">Sao Tomean</option>
					<option value="saudi">Saudi</option>
					<option value="scottish">Scottish</option>
					<option value="senegalese">Senegalese</option>
					<option value="serbian">Serbian</option>
					<option value="seychellois">Seychellois</option>
					<option value="sierra leonean">Sierra Leonean</option>
					<option value="singaporean">Singaporean</option>
					<option value="slovakian">Slovakian</option>
					<option value="slovenian">Slovenian</option>
					<option value="solomon islander">Solomon Islander</option>
					<option value="somali">Somali</option>
					<option value="south african">South African</option>
					<option value="south korean">South Korean</option>
					<option value="spanish">Spanish</option>
					<option value="sri lankan">Sri Lankan</option>
					<option value="sudanese">Sudanese</option>
					<option value="surinamer">Surinamer</option>
					<option value="swazi">Swazi</option>
					<option value="swedish">Swedish</option>
					<option value="swiss">Swiss</option>
					<option value="syrian">Syrian</option>
					<option value="taiwanese">Taiwanese</option>
					<option value="tajik">Tajik</option>
					<option value="tanzanian">Tanzanian</option>
					<option value="thai">Thai</option>
					<option value="togolese">Togolese</option>
					<option value="tongan">Tongan</option>
					<option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
					<option value="tunisian">Tunisian</option>
					<option value="turkish">Turkish</option>
					<option value="tuvaluan">Tuvaluan</option>
					<option value="ugandan">Ugandan</option>
					<option value="ukrainian">Ukrainian</option>
					<option value="uruguayan">Uruguayan</option>
					<option value="uzbekistani">Uzbekistani</option>
					<option value="venezuelan">Venezuelan</option>
					<option value="vietnamese">Vietnamese</option>
					<option value="welsh">Welsh</option>
					<option value="yemenite">Yemenite</option>
					<option value="zambian">Zambian</option>
					<option value="zimbabwean">Zimbabwean</option>
			</select>

	</td>
</tr>
</p>

<p>
<tr> <td>
<label for="gender" type="text" id="gender" placeholder="Gender" style="color:black;"><b>Gender</b></label><br />
<select name = "gender" class ="form-control" type ="text" id="gender"  maxlength="50" style="width: 235px"> <br>
				<option value="">-- select one --</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select> 

</td> 

<td>
<label for="race" style="color:black;"><b>Race</b></label><br/>
<select name = "race" class ="form-control" type ="text" id="race"  maxlength="50" style="width: 235px"> <br>
				<option value="">-- select one --</option>
					<option value="Malay">Malay</option>
					<option value="Chinese">Chinese</option>
					<option value="Indian">Indian</option>
					<option value="Others">Others</option>					
				</select>


</td> </tr>  
</p>

<p>
<tr> <td>
<label for="contactno" type="text" id="contactno" placeholder="contactno" style="color:black;"><b>Contact Number *</b></label><br />
<input name="contactno" class="form-control" type="text" maxlength="11" style="width: 235px" />
</td> 

<td>
<label for="email" type="text" id="email" placeholder="Email" style="color:black;"><b>Email</b></label><br />
<input name="email" class="form-control" type="text" maxlength="50" style="width: 235px" />
</td> </tr> 
</p>
  <?php 
			  //If User already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div class="form-group">
                  <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 

              <?php if(isset($_SESSION['uploadError'])) { ?>
              <div class="form-group">
                  <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
              </div>
              <?php unset($_SESSION['uploadError']); } ?>   

<p>
<tr> <td colspan="2">
<label for="address" type="text" id="address" placeholder="Address" style="color:black;"><b>Current Address</b></label><br />
<textarea class="form-control" rows="4" id="address" name="address" maxlength="100" style="width: 560px"></textarea>
</td> </tr>
</p>

<p>
<tr>
<td colspan="2">
<label for="highest_qualification" style="color:black;"><b>Highest Qualification</b></label><br/>
<select name = "highest_qualification" class ="form-control" type ="text" id="highest_qualification"  maxlength="50" style="width: 235px"> <br>
				<option value="">-- select one --</option>
					<option value="PhD">PhD</option>
					<option value="Postgraduate/Master">Postgraduate/Master</option>
					<option value="Degree">Degree</option>
					<option value="Diploma">Diploma</option>					
				</select>
				
			</td></tr>
</p>			

<p>
<tr><td colspan="2">
<label for="university" type="text"  placeholder="University" style="color:black;"><b>University</b></label><br/>
<select name="university" class="form-control" type="text" id="university" maxlength="50" style="width: 235px" >5px" >

    <option value="">--select one--</option>
   <optgroup label="GENERAL UNIVERSITY">
    <option value="Universiti Kebangsaan Malaysia">Universiti Kebangsaan Malaysia </option>
    <option value="Universiti Malaya"> Universiti of Malaya</option>
    <option value="Univeristy of Malaysia Kelantan">University of Malaysia Kelantan </option>
    <option value="University of Malaysia Pahang">University of Malaysia Pahang </option>
    <option value="University of Malaysia Perlis">University of Malaysia Perlis</option>
    <option value="University of Malaysia Sarawak">University of Malaysia Sarawak </option>
    <option value="University of Malaysia Sabah">University Malaysia Sabah</option>
    <option value="Universiti Pertahanan Nasional Malaysia">Universiti Pertahanan Nasional Malaysia</option>
    <option value="Universiti Pendidikan Sultan Idris">Universiti Pendidikan Sultan Idris</option>
    <option value="Universiti Putra Malaysia">Universiti Putra Malaysia</option>
    <option value="Universiti Sains Malaysia">Universiti Sains Malaysia</option>
    <option value="Universiti Sains Islam Malaysia">Universiti Sains Islam Malaysia </option>
    <option value="Universiti Islam Antarabangsa Malaysia"> Universiti Islam Antarabangsa Malaysia</option>
    <option value="Universiti Sultan Zainal Abidin"> Universiti Sultan Zainal Abidin</option>
    <option value="Universiti Teknologi Malaysia">Universiti Teknologi Malaysia</option>
    <option value="University of Malaysia Terengganu">Universiti of Malaysia Terengganu</option>
    <option value="Universiti Tun Hussein Onn Malaysia">Universiti Tun Hussein Onn Malaysia</option>
    <option value="University Teknikal Malaysia Melaka">Universiti Teknikal Malaysia Melaka</option>
    <option value="Universiti Teknologi Malaysia">Universiti Teknologi Malaysia</option>
    <option value="Universiti Teknologi MARA">Universiti Teknologi MARA</option>
    <option value="Univesiti Utara Malaysia">Universiti Utara Malaysia</option>
	</optgroup>
	

   <optgroup label="PRIVATE UNIVERSITY">

    <option value="Al-Bukhary International University">Al-Bukhary International University</option>
    <option value="AIMST University"> AIMST University</option>
    <option value="Al-Madinah International University"> Al-Madinah International University</option>
    <option value="International Medical University"> International Medical University</option>
    <option value="INTI International University"> INTI International University</option>
    <option value="Limkokwing University of Creative Technology">Lilmkokwing University of Creative Technology</option>
    <option value="Malaysia University of Science and Technology">Malaysia University of Science and Technology</option>
    <option value="Management and Science University">Management and Science University</option>
    <option value="Multimedia University">Multimedia University</option>
    <option value="Open University Malaysia"> Open University Malaysia</option>
    <option value="Taylor's University"> Taylor's University</option>
    <option value="Universiti Teknologi Petronas Malaysia"> Universiti Teknolgi Petronas Malaysia</option>
    <option value="Universiti Tenaga Nasional"> Universiti Tenaga Nasional</option>
    <option value="Universiti Tun Abdul Razak">Universiti Tun Abdul Razak</option>
    <option value="Universiti Tunku Abdul Rahman"> Universiti Tunku Abdul Rahman</option>
    <option value="Universiti Kuala Lumpur">Univiersiti Kuala Lumpur</option>
    <option value="Universiti Industri Selangor">Universiti Industri Selangor</option>
    <option value="Universiti Sunway">Universiti Sunway</option>
    <option value="Wawasan Open University">Wawasan Open University</option>
    <option value="UCSI University"> UCSI University</option>

</optgroup>
	

    <optgroup label="OVERSEA'S UNIVERSITY MALAYSIA'S CAMPUS">

    <option value="Curtin Technology University">Curtin Technology University </option>
    <option value="Monash Malaysia University ">Monash Malaysia University</option>
    <option value="Swinburne Technology University">Swinburne Technology University</option>
    <option value="Nottingham University of Malaysia"> Nottingham University of Malaysia</option>
    <option value="Medical University of Newcastle, Malaysia"> Medical University of Newcastle, Malaysia</option>

 </optgroup>   
    <option value='others'>Others..</option>
  </select>
  
</div>

<div id="ifYes1" style="display:none">
  <div class="form-group">
    <input class="form-control" id="university1" name="university1" placeholder="Please write your University's name" />
  </div>
</div>
</td>
</tr>
</p>

<script>

document.querySelector("[name=university1]").onchange=function() {
  document.getElementById("ifYes1").style.display=this.value=="others"?"block":"none";
}
</script>


<tr> <td colspan="2">
<label for="major" type="text" id="major" placeholder="Major" style="color:black;"><b>Major *</b></label><br />
<input name="major" type="text" class="form-control" maxlength="100" style="width: 560px" />
</td> </tr> 

<tr> <td colspan="2">
<label for="current_position" type="text" id="current_position" placeholder="Current Position" style="color:black;"><b>Current Position *</b></label><br />
<input name="current_position" type="text" class="form-control" maxlength="100" style="width: 560px" />
</td> </tr> 

<tr> <td colspan="2">
<label for="position_applied" type="text" id="position_applied" placeholder="Position Applied" style="color:black;"><b>Position Applied*</b></label><br />
<input name="position_applied" type="text" class="form-control" maxlength="100" style="width: 560px" />
</td> </tr> 

<tr> <td>
<label for="current_monthly_salary" type="text" id="current_monthly_salary" placeholder="Current Monthly Salary" style="color:black;"><b>Current Monthly Salary</b></label><br /> 
<input name="current_monthly_salary" type="text" class="form-control" maxlength="50" style="width: 235px" /> 
</td> 


<td>
<label for="expected_monthly_salary" type="text" id="expected_monthly_salary" placeholder="Expected Monthly Salary" style="color:black;"><b>Expected Monthly Salary</b></label><br />
<input name="expected_monthly_salary" type="text" class="form-control" maxlength="50" style="width: 235px" />
</td> </tr> 

<tr> <td colspan="2">
<label for="prefered_working_location" type="text" id="prefered_working_location" placeholder="Preffered working Location" style="color:black;"><b>Prefered working location?</b></label><br />
<input name="prefered_working_location" type="text" class="form-control" maxlength="100" style="width: 560px" />
</td> </tr> 


<tr> <td colspan="2">

<label for="avaibility" type="avaibility" id="avaibility" placeholder="avaibility" style="color:black;"><b>Avalibility</b></label><br/>
<select name = "avaibility" class="form-control " type="text" id="avaibility"  maxlength="50" style="width: 235px"> <br>
				<option value="">-- select one --</option>
					<option value="Immediately">Immediately</option>
					<option value="One Month">One Month</option>
					<option value="Two Month">Two Month</option>
					<option value="Three Month">Three Month</option>					
				</select>
</td> </tr> 


<!-- research table inside table-->
<tr><td colspan="2">
<label for="language" type="text" id="language" placeholder="Language Proficiency" style="color:black;"><b>Language Proficiency</b></label><br />
<p>Proficiency level 0-poor; 10-excellent</p>


<table border="2" bordercolor="gray" align="center">

<tr> 
	<td>
		<label for="malay" type="text" id="malay" placeholder="Malay" style="color:black; width:200px"><b>Malay</b></label><br />
	</td> 

	<td>
		<input name="malay" type="text" class="form-control" maxlength="100" style="width: 200px" />

	</td> 
</tr>  

<tr> 
	<td>
		<label for="english" type="text" id="english" placeholder="English" style="color:black; width:200px"><b>English</b></label><br />
	</td> 

	<td>
		<input name="english" type="text" class="form-control" maxlength="100" style="width: 200px" />

	</td> 
</tr>  

<tr> 
	<td>
		<label for="mandarin" type="text" id="mandarin" placeholder="Mandarin" style="color:black; width:200px"><b>Mandarin</b></label><br />
	</td> 

	<td>
		<input name="mandarin" type="text" class="form-control" maxlength="100" style="width: 200px" />

	</td> 
</tr>

<tr> 
	<td>
		<label for="other" type="text" id="other" placeholder="Other" style="color:black; width:200px"><b>Others</b></label><br />
	</td> 

	<td>
		<input name="other" type="text" class="form-control" maxlength="100" style="width: 200px" />

	</td> 
</tr>  

</table>


<!--about me -->

<tr> <td colspan="2">
<label for="aboutme" type="text" id="aboutme"  style="color:black;"><b>About Me</b></label><br />
<p>Summarize your employement history (Not more than 100 words)</p>
<textarea class="form-control" rows="6" id="aboutme" name="aboutme" maxlength="400" style="width: 560px" placeholder="Example: Early 30s. Master's Degree in Business Administration and Degree in Accounting. 
Total 19 years of working experience in Sales & Business Development in various industries. Good Exposure in Regional Sales & Business Development and etc. Is willing to travel locally and overseas"></textarea>
</td> </tr>
</p>
	<tr>

		<td>
		<label style="color:black;">Latest passport photo</label>
 		<input type="file" name="image" class="form-control" id="profile-img" required>
		<img src="" id="profile-img-tag" width="200px" />
		
		</td>
	</tr>
		
	<tr>
		
		<td>
		<label style="color:black;">File format PDF and doc only!</label>
		<input type="file" name="resume" class="form-control" required>
		</td>
		
	</tr>	
	</table>
	 
	 <br/>
	

	<table>			  
	
	<tr>
    
	
		<td>
		<input class="form-control" type="password" id="password" name="password" style= "width:235px"placeholder="Password *" required>
		</td>
		<br/>		
		<td>      
		<input class="form-control" type="password" id="cpassword" name="cpassword" style= "width:235px" placeholder="Confirm Password *" required>
		</td>
    </tr>
	</table>
	
<br/>
	
<br/>

<table>
	<td class="form-group checkbox">
                <label  style="color:black;"><input type="checkbox"> I hereby declare all informations are true and in current situation. Any discrepancies will result in penalty or termination</label>
              </td>
			  
</table>


<table>	 
	 	 <td class="form-group">
                <button class="btn btn-flat btn-primary">Register</button>
      </td>
	</table>
</form>
          
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
<script src="js/adminlte.min.js"></script>

<script type="text/javascript">
      function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
</script>

<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    $('#age').val(age);
  });
</script>
<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>
