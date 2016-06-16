<?php

function create_image_key() {
    return sha1($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . time() . mt_rand());
}

if (isset($_POST["submit"])) {
    if (($_FILES["file"]["type"] === "image/gif") || ($_FILES["file"]["type"] === "image/jpeg") || ($_FILES["file"]["type"] === "image/png")) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            
            $imagekey = create_image_key();

            // Temporary upload image name 
            $original_image = $_FILES["file"]["tmp_name"];

            if(!is_uploaded_file($original_image)) {
                fatal('uploaded file corrupted');
            }
            
            if ($_FILES["file"]["type"] === "image/png") {
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/images/photography/{$imagekey}.png");
                echo "File uploaded<br><br>";
            } else {
                $new_image = "uploads/images/photography/{$imagekey}.png";
                echo "Ready to convert {$_FILES["file"]["type"]} to image/png...";
                
                // Resize the image and save 
                $array=array();
                echo "<pre>";
                $cmd = "$original_image $new_image";
                exec("convert {$cmd} {$new_image} 2>&1", $array);
                echo "<br>".print_r($array)."<br></pre>";
                
                echo "File uploaded<br><br>";
            }
            
            echo "Stored in: " . "<a href='uploads/images/photography/{$imagekey}.png'>{$imagekey}.png</a>";
        }
    } else {
        echo "<h3>Invalid file</h3>";
    }
} else {
    echo <<<EOL
   <!DOCTYPE html>
    <html>
    <body>

    <form method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    </body>
    </html>
EOL;
}
?>