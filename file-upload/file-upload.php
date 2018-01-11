<?php

    $link = mysqli_connect('localhost', 'root','', 'image-upload');
    echo '<pre>';
    print_r($_POST);

//    print_r($_FILES);
//    echo $_FILES['image_file']['name'];

    if (isset($_POST['btn'])){




        $fileName = $_FILES['image_file']['name'];
        $directory = 'images/';
        $imageUrl = $directory.$fileName;
        $fileType = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['image_file']['tmp_name']);

        if($check){    //image kina
            if(file_exists($imageUrl)){   //already uploaded kina
                die('This image already exists. Please select another one. Thanks.');
            } else {

                if($_FILES['image_file']['size'] > 500000){  //size boro kina
                    die('Your image size is too large. Please select within 10kb');
                } else {
                    if($fileType != 'JPG' && $fileType != 'png'){
                        die('Image type is not supported. Please use jpg or png.');
                    } else {
                        move_uploaded_file($_FILES['image_file']['tmp_name'],$imageUrl);
                        $sql = "INSERT INTO images (image_file) VALUES ('$imageUrl')";
                        mysqli_query($link, $sql);
                        echo 'Image uploaded & saved successfully';
                    }
                }

            }

        } else{
            die('Please choose an image file thanks!.');
        }
    }










?>

<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Select File</th>
            <td><input type="file" name="image_file" value="Choose File"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="submit"></td>
        </tr>
    </table>
</form>

<hr/>

<?php
    $sql = "SELECT * FROM images";
    $queryResult = mysqli_query($link, $sql);


?>



<table>
    <?php while ($image = mysqli_fetch_assoc($queryResult)) { ?>
    <tr>
        <td><img src="<?php echo $image['image_file']; ?>" alt="" height="100" width="100"/></td>
    </tr>
    <?php } ?>
</table>
