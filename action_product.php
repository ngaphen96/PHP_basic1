<?php

if(isset($_GET['pro_id']) == false){   // NEU CHUA CO PRO_ID THI THUC HIEN INSERT
		    $target_dir =  "upload_product/";
		    $target_file = $target_dir . basename($_FILES["logo"]["name"]);  
		    $uploadOk = 1 ;
		    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);   

		   
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["logo"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image. INSERT ";
			        $uploadOk = 0;
			    }
			}
			
			
			if ($_FILES["logo"]["size"] > 500000) {
			    echo "Sorry, your file is too large. INSERT";
			    $uploadOk = 0;
			}
			
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. INSERT";
			    $uploadOk = 0;
			}
			
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			
			} else {
			    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded. INSERT ";
			      
				        $conn = mysqli_connect("localhost","root","","db");
				       
				        $cat_id = $_POST["cat_id"];

		                $query = "SELECT cat_id FROM tbl_category WHERE cat_id=$cat_id";
		                $result = $conn->query($query);
		                if($result->num_rows == 0 ) echo "Khong ton tai cat_id";
		                else{  
		                	    $pro_name = $_POST["pro_name"];
		                	    $logo = $target_file;
						        $price = $_POST["price"];
						        $sale = $_POST["saleoff"];
						        $des = $_POST["description"];
						        $status = isset($_POST["status"]) == TRUE ? 1 : 0 ;
						         
						        $sql2 = "INSERT INTO tbl_product(pro_name,cat_id,pro_image,price,saleoff,description,status) VALUES ('$pro_name' , $cat_id , '$logo', $price, $sale , '$des', $status)";
						       
						        if ($conn->query($sql2) === TRUE) {
									    echo "New record created successfully INSERT";
							    } else {
									    echo "Error: " . $sql2 . "<br>" . $conn->error;
									    }
				            }

				      
					     } else {
				        echo "Sorry, there was an error uploading your file. INSERT ";
			             }
		    }



}
else{   // THUC HIEN UPDATE 

			$id2 = $_GET['pro_id'];
			$target_dir = "upload_product/";


			if( empty($_FILES["logo"]["name"]) == FALSE){  // CO CAP NHAT LAI ANH : 

				 	$target_file = $target_dir . basename($_FILES["logo"]["name"]);  
				    $uploadOk = 1 ;
				    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);   

				   
					if(isset($_POST["submit"])) {
					    $check = getimagesize($_FILES["logo"]["tmp_name"]);
					    if($check !== false) {
					        echo "File is an image - " . $check["mime"] . ".";
					        $uploadOk = 1;
					    } else {
					        echo "File is not an image. UPDATE image ";
					        $uploadOk = 0;
					    }
					}
					
					
					if ($_FILES["logo"]["size"] > 500000) {
					    echo "Sorry, your file is too large.  UPDATE image ";
					    $uploadOk = 0;
					}
					
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.  UPDATE image ";
					    $uploadOk = 0;
					}
					
					if ($uploadOk == 0) {
					    echo "Sorry, your file was not uploaded.  UPDATE image ";
					
					} else {
					    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
					        echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded.  UPDATE image ";
					      
						        $conn = mysqli_connect("localhost","root","","db");
						       
						        $cat_id = $_POST["cat_id"];

				                $query = "SELECT cat_id FROM tbl_category WHERE cat_id=$cat_id";
				                $result = $conn->query($query);
				                if($result->num_rows == 0 ) echo "Khong ton tai cat_id  UPDATE image ";
				                else{  
				                	    $pro_name = $_POST["pro_name"];
				                	    $logo = $target_file;
								        $price = $_POST["price"];
								        $sale = $_POST["saleoff"];
								        $des = $_POST["description"];
								        $status = isset($_POST["status"]) == TRUE ? 1 : 0 ;
								         
								        $sql2 = "UPDATE tbl_product SET pro_name='$pro_name', cat_id=$cat_id, pro_image='$logo', price=$price, saleoff=$sale, description='$des', status=$status   WHERE pro_id=$id2";
								       
								        if ($conn->query($sql2) === TRUE) {
											    echo "New record created successfully  UPDATE image ";
									    } else {
											    echo "Error: " . $sql2 . "<br>" . $conn->error;
											    }
						            }

						      
							     } else {
						        echo "Sorry, there was an error uploading your file.  UPDATE image ";
					             }
				    }

		    }
		    else{   // KHONG CAP NHAT LAI ANH :

                    $conn = mysqli_connect("localhost","root","","db");
						       
			        $cat_id = $_POST["cat_id"];
	                $query = "SELECT cat_id FROM tbl_category WHERE cat_id=$cat_id";
	                $result = $conn->query($query);
	                if($result->num_rows == 0 ) echo "Khong ton tai cat_id  UPDATE no image ";
	                else{  
	                	    $pro_name = $_POST["pro_name"];
	                	
					        $price = $_POST["price"];
					        $sale = $_POST["saleoff"];
					        $des = $_POST["description"];
					        $status = isset($_POST["status"]) == TRUE ? 1 : 0 ;
					         
					        $sql2 = "UPDATE tbl_product SET pro_name='$pro_name', cat_id=$cat_id, price=$price, saleoff=$sale, description='$des', status=$status   WHERE pro_id=$id2";
					       
					        if ($conn->query($sql2) === TRUE) {
								    echo "New record created successfully  UPDATE no image ";
						    } else {
								    echo "Error: " . $sql2 . "<br>" . $conn->error;
											    }



		    }

            }
 }

?>