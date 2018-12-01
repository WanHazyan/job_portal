 <?php
 require_once("db1.php")
 ?>

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
 </head>
 
 <body>
 
 <form name="candidatetry" action="submitcandidate.php" method="post ">
<table id="example2" class="table table-hover">
                    <thead>
                      <th>Name</th>
                      <th>Description</th>
					  <th>Created on</th>
                    </thead>
                    <tbody>
                      <?php
                    $sql = "SELECT * FROM users";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                     <tr>
					 
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['aboutme']; ?></td>
						<td><?php echo $row['createdat']; ?></td>
						<td> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["id_user"] ?>"/></td>

					</tr>
					
				
                     <?php
                        }
                      }
                    ?>
                    </tbody>                    
                  </table>
	
	<input type="submit" name="submit" value="Submit"> 
	
</form>
 </body>
 
 
 </html>
 