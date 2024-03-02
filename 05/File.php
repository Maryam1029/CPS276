<?php

$name = "";
$content = "";
$error = "";
 if (!empty($_REQUEST['name'])){
     $name = $_REQUEST['name'];
     $content = $_REQUEST['content'];
    
     if(file_exists("files/$name.txt")){
        $error = "File exixts <br>";
    }else{
        $name = $name . '.txt';
        file_put_contents('files/' . $name , $content);
    }
 }


$files = scandir('files');
?>
<html>
    <head></head>
    <body>
    Enter file name and file contents.
    <br>File names should contain alpha-numeric characters only. (No spaces)<br>
    <?=$error?>
<form method = 'post'>
    <br>File Name<br>
    <input type="text" name="name" size="60">
    <br><br>File Content<br>
    <textarea name ="content" cols="60" rows="6"></textarea>
    <br><br>
    <input type="submit" value="Submit" name="button">
</form>
<hr>
<strong>Existing Files</strong>

<br>
</html>

<?php

foreach ($files as $f){
    if($f == '.' || $f == '..'){
        continue;
    }
    echo("<a href='files/$f' target='view'>$f</a><br>");
}
?>
