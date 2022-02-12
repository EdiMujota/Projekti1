<?php

$con = mysqli_connect("localhost", "root", "", "image");

if (isset($_POST['upload'])){
    $file = $_FILES['image']['name'];

    $query = "INSERT INTO upload(image) VALUES('$file')";

    $res = mysqli_query($con, $query);

    if ($res) {
        move_uploaded_file($_FILES['image']['tmp_name'], "$file");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">UPLOAD IMAGE</h3>

                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" class="form-control">
                        <input type="submit" name="upload" value="UPLOAD" class="btn
                        btn-success my-3">
                    </form>

                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Display IMAGE</h3>

                    <?php

                    $sel = "SELECT * FROM upload";
                    $que = mysqli_query($con, $sel);

                    /*$ID = $_GET['Id']; //Get Individual Row ID
		            $sel = "SELECT * from employees WHERE `EmpID` = '$empID'";//Select a specific row with the ID
		            $que = mysqli_query($mysqli, $sel);*/

                    $output = "";

                    if (mysqli_num_rows($que) < 1){
                        $output .= "<h3 class='text-center'>No image uploaded</h3>";
                    }

                    while ($row = mysqli_fetch_array($que)){
                        $output .= "<img src='".$row['image']."' class='my-3'
                            style='width:400px;height:400px;'>";
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>     

</body>
</html>