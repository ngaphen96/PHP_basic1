<?php 

if(isset($_GET['id_cat']) == false){    // Nếu chưa có cat_id thì thực hiện insert  : Đã tồn tại TRUE , không tồn tại FALSE


  
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["logo"]["name"]);  // path file
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 


        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["logo"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image. Insert ";
                $uploadOk = 0;
            }
        }


        if ($_FILES["logo"]["size"] > 500000) {
            echo "Sorry, your file is too large.Insert";
            $uploadOk = 0;
        }



        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. Insert";
            $uploadOk = 0;
        }


        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded. Insert";
        } else {

            if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded. Insert";

               
                
                $conn = mysqli_connect("localhost","root","","db");
                $cat_name = $_POST["cat_name"];
                $logo = $target_file;
                $status = isset($_POST["status"]) == TRUE ? 1 : 0 ;
                $sql = "INSERT INTO tbl_category(cat_name,logo,status) VALUES ('$cat_name' , '$logo' ,$status)";
                if ($conn->query($sql) === TRUE) {
        			    echo "Insert  success!!!";
        	    } else {
        			    echo "Error: " . $sql . "<br>" . $conn->error;
        	    }


            } else {
                echo "Sorry, there was an error uploading your file (insert) .";
            }
        }

}
else{
            $id2 = $_GET['id_cat'];
            $target_dir = "upload/";
           
            
        if( empty($_FILES["logo"]["name"]) == FALSE){  // Có cập nhật lại ảnh , 

               
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 

                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["logo"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image. Update";
                    $uploadOk = 0;
                }
                }


                if ($_FILES["logo"]["size"] > 500000) {
                    echo "Sorry, your file is too large. Update";
                    $uploadOk = 0;
                }



                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. Update";
                    $uploadOk = 0;
                }


                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.(image)";
                } else {
                    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded. image";

                        
                        
                        $conn = mysqli_connect("localhost","root","","db");
                        $cat_name = $_POST["cat_name"];
                        $logo = $target_file;
                        $status = isset($_POST["status"]) == TRUE ? 1 : 0 ;
                        $sql = "UPDATE  tbl_category SET cat_name='$cat_name',logo='$logo',status=$status  WHERE cat_id=$id2"; 
                 
                       
                       
                        if ($conn->query($sql) === TRUE) {
                                echo "Update (image) success!!!";
                        } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                                }



                    } else {
                        echo "Sorry, there was an error uploading your file2. update image";
                    }
            }

            }
            else{

                        $conn = mysqli_connect("localhost","root","","db");
                        $cat_name = $_POST["cat_name"];
                        $status = isset($_POST["status"]) == TRUE ? 1 : 0 ;
                        $sql = "UPDATE  tbl_category SET cat_name='$cat_name',status=$status  WHERE cat_id=$id2"; 

                        if ($conn->query($sql) === TRUE) {
                                echo "Update (no image) success!!!";
                        } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                        }

            }
            
}
?>