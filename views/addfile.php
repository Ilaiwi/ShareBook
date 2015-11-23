
<?php
$target_dir = $to="../files/";
$target_file = $target_dir . basename($_FILES["up"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["up"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["up"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["up"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
//$id0=$_GET['id'];
//$ori_name=$_FILES['ll']['name'];
//$from=$_FILES['ll']['tmp_name'];
//$type=explode(".",$ori_name);
//$type1=end($type);
//$new=rand(1000000000,100000000000).".".$type1;

//$to="../files/".$new;
//include("db.php");
//if(move_uploaded_file($from,$to))
//mysqli_query($link,"insert into materials values(0,'$new','$id0')");



?>

