<?php
// Create uploads folder if not exists
if (!file_exists("uploads")) {
    mkdir("uploads");
}

// FILE UPLOAD
if (isset($_POST['upload'])) {
    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($temp_name, "uploads/" . $file_name);
}

// FILE DOWNLOAD
if (isset($_GET['download'])) {
    $file = "uploads/" . $_GET['download'];
    if (file_exists($file)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}

// FILE OPERATIONS
$message = "";
if (isset($_POST['operation'])) {

    // CREATE & WRITE (w)
    $file = fopen("sample.txt", "w");
    fwrite($file, "Hello Priya!");
    fclose($file);

    // READ (r)
    $file = fopen("sample.txt", "r");
    $content = fread($file, filesize("sample.txt"));
    fclose($file);

    // APPEND (a)
    $file = fopen("sample.txt", "a");
    fwrite($file, "\nAppended Data");
    fclose($file);

    // COPY
    copy("sample.txt", "copy.txt");

    // RENAME
    rename("copy.txt", "renamed.txt");

    // DELETE (optional)
    // unlink("renamed.txt");

    $message = "Operations Done! Content: " . $content;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>All-in-One File Handling</title>
</head>
<body>

<h2>📤 Upload File</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button name="upload">Upload</button>
</form>

<h2>📂 Uploaded Files</h2>

<?php
$files = scandir("uploads");

foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo "<p>
        $file 
        | Size: " . filesize("uploads/$file") . " bytes 
        | Last Modified: " . date("d-m-Y H:i:s", filemtime("uploads/$file")) . "
        | <a href='?download=$file'>Download</a>
        </p>";
    }
}
?>

<h2>⚙ File Operations</h2>
<form method="post">
    <button name="operation">Run Operations</button>
</form>

<p><?php echo $message; ?></p>

<h3>📁 Directory Listing (opendir)</h3>
<?php
$dir = opendir("uploads");

while (($f = readdir($dir)) !== false) {
    if ($f != "." && $f != "..") {
        echo $f . "<br>";
    }
}
closedir($dir);
?>

</body>
</html>