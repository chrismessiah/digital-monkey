<?php
    # Renaming file using MD5 method
    $target_dir = "public/blog/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $md5_string = md5_file($_FILES["fileToUpload"]["tmp_name"]); # md5 of file
    $path_parts = pathinfo($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir.$md5_string.".".$path_parts["extension"];

    $uploadOk = 1;
    $imageFileType = pathinfo( $target_file, PATHINFO_EXTENSION );
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            header('location:control_panel.php?choice=blogpost&error=file_not_image');
            exit();
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        # Do nothing, use that file
        echo "File exists, using already existing file instead";
        $uploadOk = 1;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        header('location:control_panel.php?choice=blogpost&error=file_too_large');
        exit();
        $uploadOk = 0;
    }
    // Allow certain file formats
    if( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header('location:control_panel.php?choice=blogpost&error=unknown_filetype');
        exit();
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        header('location:control_panel.php?choice=blogpost&error=file_not_uploaded');
        exit();
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
           	header('location:control_panel.php?choice=blogpost&error=file_upload_fail');
            exit();
        }
    }
?>