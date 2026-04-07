  <?php
 $file =__DIR__."/uploads/uploaded.txt";
 echo "<br>";
 //File Info
 echo "size:".filesize($file)."<br>";
 echo "type:".filetype($file)."<br>";
 echo "Last Modified:".date("d-m-y H:i:s",filemtime($file));
//rename to the file
rename(
    "uploads/upload.txt",
    "uploads/uploaded.txt"
);
echo "<h3> php file handling </h3>";
//01.file existence
if(file_exists($file)){
    echo "File Exists <br>";
}
else{
    die("File not found");
}
echo "<hr>";
//get the file contents
echo "<b>Reading file using file_get_contets():</b><br>";
echo nl2br(file_get_contents($file));
echo "<hr>";
//Read the files 
echo "<b> Reading file in fopen(r mode):</b><br>";
$fp=fopen($file,"r");
echo nl2br(fread($fp,filesize($file)));
fclose($fp);
echo "<hr>";
//write mode -it erase the previous content in the file
echo "<b> Write using w mode (erase old):</b> <br>";
$fp=fopen($file,"w");
fwrite($fp,"old one is erased priya...but again and again i love you...\n");
fclose($fp);
echo "written using w mose <br> <hr>";
//get the file contents after using write operations
echo "<b>Reading file using file_get_contets():</b><br>";
echo nl2br(file_get_contents($file));
echo "<hr>";
//append mode
echo "<b> append using a mode</b> <br>";
$fp=fopen($file, "a");
fwrite($fp,"appended line \n");
fclose($fp);
echo "appended successfully <br><hr>";
//get the file contents after using write operations
echo "<b>Reading file using file_get_contets():</b><br>";
echo nl2br(file_get_contents($file));
echo "<hr>";

?>