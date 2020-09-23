<?php

                         require 'dbconnect.php';
date_default_timezone_set("Asia/Manila");
$date = date("Y-m-d");
$date_time = date("Y-m-d h:i:sa");



							function clean($data) {
								
								
								return $data;
							}

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								

							   if (empty($_POST["edit_routing"])) {
									$edit_routing = "";
								} else {
									$edit_routing = clean($_POST["edit_routing"]);
								}
								
								
								 if (empty($_POST["delete_id"])) {
									$delete_id = "";
								} else {
									$delete_id = clean($_POST["delete_id"]);
								}

							   
								if (empty($_POST["grade"])) {
									$gradeErr = " Grade is required";
								} else {
									$grade = clean($_POST["grade"]);
								}


								if (empty($_POST["subject"])) {
									$subjectErr = "subject is required";
								} else {
									$subject = clean($_POST["subject"]);
								}

								if (empty($_POST["teacher"])) {
									$teacherErr = "teacher is required";
								} else {
									$teacher = clean($_POST["teacher"]);
								}
								
									if (empty($_POST["image"])) {
									$imageErr = "fee is required";
								} else {
									$image = clean($_POST["image"]);
								}
								
								
								

								

  

}   




?>