<!DOCTYPE html>
<html>

<body>
    <?php 
        if(isset($_GET['upload'])) {
            echo "File upload was a success!";
        }
?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>

</html>