<?php
session_start();
if ($_SESSION['id']==null){
    header('location:index.php');

}


require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$blog = new App\classes\Blog();

$queryResult = $blog->getAllPublishedCategory();

if (isset($_GET['logout'])){
    $login->adminLogout();
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>

<body>
<?php include 'includes/menu.php';?>

<div class="container" style="margin-top:10px ">
    <div class="row">
        <div class="col-sm-8 mx-auto">

            <div class="card border-success">

                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_name" class="form-control">
                                    <option>----Select Category Name----</option>
                                    <?php while ($category = mysqli_fetch_assoc($queryResult)) { ?>
                                    <option value="<?php echo $category['id']; ?>">"<?php echo $category['category_name']; ?></option>
                                    <?php } ?>
                                </select>

                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" class="form-control">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="status" value="1">Publish
                                <input type="radio" name="status" value="0">Unpublish
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary btn-block" name="btn">Save Blog Info</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>





<script src="../assets/js/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>


</html>