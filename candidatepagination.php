<?php

session_start();

require_once("db.php");

$limit = 4;

if(isset($_GET["page"])){
	$page = $_GET['page'];
}else {
	
	$page=1;
}

	$start_from = ($page-1) * $limit;
	
	$sql = "SELECT * FROM users LIMIT $start_from, $limit";
	$result = $conn-> query($sql);
	
	if($result->num_rows > 0){
		while($row = $result -> fetch_assoc ()) {?>
		
		<div class="attachment-block clearfix">
			<img class="attachment-img" src="uploads/logo/britay.png" alt="Attachment Image">
				<div class="attachement-pushed">
				<div class="attachement-text">
					<div><strong>BA<?php echo $row['id_user']; ?></strong></div>
				</div>
					<div><?php echo $row['aboutme'] ?></div>
				</div>
		</div>
		<?php
		}
		
	}
$conn->close();
