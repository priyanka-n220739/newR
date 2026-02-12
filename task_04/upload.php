<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <style>
        /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
}

/* Page background */
body {
    height: 100vh;
    background: #efe9ff; /* light lavender */
    display: flex;
    align-items: center;
    justify-content: center;
} 
/* Card */
.upload-container {
    background: #ffffff;
    padding: 30px 35px;
    width: 360px;
    border-radius: 12px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    animation: fadeIn 0.8s ease-in-out;
}

/* Title */
.upload-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #5b3db4;
}

/* Labels */
.upload-container label {
    display: block;
    margin-bottom: 5px;
    color:blue;
    font-weight: 500;
}

/* Inputs */
.upload-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
}

.upload-container input:focus {
    border-color: #7b5cff;
    box-shadow: 0 0 5px rgba(123,92,255,0.4);
}
</style>
</head>
<body>
    <div class='upload-container'>
    <form method="post" enctype="multipart/form-data">
        <h2>Upload Resume/Img/Pdf</h2><br><br>
        <input type="file" name="file" required><br><br>
        <input type="submit" name="upload" value="upload">
    </form>
    </div>
    <?php
    if(isset($_POST['upload'])){
        $filename=$_FILES['file']['name'];
        $tempname=$_FILES['file']['tmp_name'];
        $filetype=$_FILES['file']['type'];

        $allowed=["application/pdf","image/jpeg","image/png","text/plain"];
        if(!in_array($filetype,$allowed)){
            echo "Invalid File Type";
            exit;
        }
        $folder ="uploads/".basename($filename);
        if(move_uploaded_file($tempname,$folder)){
            echo "<h2>file uploaded successfull <h2>";
            echo "<a href='$folder'download>&nbsp;&nbsp;Download File</a>";
        }
        else{
            echo "uploaded failed";
        }
    }
    ?>
</body>
</html>