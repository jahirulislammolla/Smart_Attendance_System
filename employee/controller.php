<?php

                         require 'dbconnect.php';
date_default_timezone_set("Asia/Manila");
$date = date("Y-m-d");
$date_time = date("Y-m-d h:i:sa");



							function clean($data) {
								
								
							
								return $data;
							}

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								

							   if (empty($_POST["edit_teacher"])) {
									$edit_teacher = "";
								} else {
									$edit_teacher = clean($_POST["edit_teacher"]);
								}
								
								
								 if (empty($_POST["delete_id"])) {
									$delete_id = "";
								} else {
									$delete_id = clean($_POST["delete_id"]);
								}

							   
								if (empty($_POST["name"])) {
									$nameErr = " Name is required";
								} else {
									$name = clean($_POST["name"]);
								}


								if (empty($_POST["email"])) {
									$emailErr = "email is required";
								} else {
									$email = clean($_POST["email"]);
								}

								if (empty($_POST["designation"])) {
									$designationErr = "designation is required";
								} else {
									$designation = clean($_POST["designation"]);
								}
								
									if (empty($_POST["phone"])) {
									$phoneErr = "phone is required";
								} else {
									$phone = clean($_POST["phone"]);
								}
								
									if (empty($_POST["address"])) {
									$addressErr = "address is required";
								} else {
									$address = clean($_POST["address"]);
								}
								
								
									if (empty($_POST["image"])) {
									$imageErr = "image is required";
								} else {
									$image = clean($_POST["image"]);
								}
								
								

								

  

}   




?>