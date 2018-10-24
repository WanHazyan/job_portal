<?php

session_start();

require_once("db.php");

$limit = 4;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM job_post LIMIT $start_from, $limit";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql1 = "SELECT * FROM admin WHERE id_admin='$row[id_admin]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
             ?>

		   <div class="attachment-block clearfix">
              <img class="attachment-img" src="uploads/logo/britay.png" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">RM<?php echo $row['salary']; ?>/Month</span></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row['qualification']; ?> | <?php echo $row['typeofjob']; ?></strong></div>
                </div>
					<div> <?php echo $row['description']; ?> </div>
              </div>
            </div>

		<?php
			}
		}
	}
}

$conn->close();