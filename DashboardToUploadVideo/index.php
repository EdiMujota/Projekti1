<?php

$con = mysqli_connect("localhost", "root", "", "video");

if (isset($_POST['upload'])){
    $file = $_FILES['video']['name'];

    $query = "INSERT INTO upload(image) VALUES('$file')";

    $res = mysqli_query($con, $query);

    if ($res) {
        move_uploaded_file($_FILES['video']['tmp_name'], "$file");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Video Upload</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">UPLOAD VIDEO</h3>

                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" class="form-control">
                        <input type="submit" name="upload" value="UPLOAD" class="btn
                        btn-success my-3">
                    </form>

                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Display VIDEO</h3>

                    <?php

                    $sel = "SELECT * FROM upload";
                    $que = mysqli_query($con, $sel);


                    $output = "";

                    if (mysqli_num_rows($que) < 0){
                        $output .= "<h3 class='text-center'>No video uploaded</h3>";
                    }

                    while ($row = mysqli_fetch_array($que)){
                        $output .= "<video controls 
                                        <source src='".$row['video']."' class='my-3' 
                                        style='width:400px;height:400px;'>
                                    </video>";
                    }
                                    //<video controls width="500">
			                            //<source src="yt1s.com - All over in 10 seconds.mp4">
                                    //</video>
                    ?>

                </div>
            </div>
        </div>
    </div>     

</body>
</html>