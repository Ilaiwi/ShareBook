<?php
session_start();
    $groupId=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/AddMaterial.css"/>
    <title></title>
</head>
<body>
<div id="container">
    <header id="header">
         <a href="index.php">
        <img id="logo" src="../imgs/logo.png" alt="logo"/></a>
        <div id="headerButtons">
             <?php
            echo "<a href='templatetrainerhomepage.php'>";
            $user = $_SESSION['username'];
            echo $user;
            echo "</a>";
            ?>
            <a href="logout.php">
                <input type="button" value="Log out" class="headerButtons"/></a>
        </div>
    </header>
    <div id="body">
        <div id="MaterialContainer">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="fileToUpload">
                    Select File To Upload
                </label>
                <pre></pre>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <pre></pre>
                <input class="Button" type="submit" value="Upload File" name="upload">
                <input type="hidden" name="id" value="<?php echo $groupId; ?>">
            </form>
        </div>
        <div id="footer">
            <a class="footerLink" href="contactus.html">Contact us</a>
            <a class="footerLink" href="aboutus.html">About us</a>
            <a class="footerLink" href="">Find a group</a>
            <a class="footerLink" href="contactus.html">How this site work</a>
            <div class="footerLink">Copy Rights</div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>

