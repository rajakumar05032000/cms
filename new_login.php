<?php
  if(!empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LcXPt0eAAAAADpgcB8OzdGBPxTKCWUFmQM38iAL';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
            $message = "g-recaptcha varified successfully";
        else
            $message = "Some error in vrifying g-recaptcha";
       echo $message;
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Registration-Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/nlogin.css">
</head>

<body>
    <div class="container-login100"
        style="background-image: url('images/img-01.jpg');align-items: start;padding-top: 15vh;">
        <section class="container card col-lg-4  mx-auto">
            <div class="row">

                <div class="im2 ">
                    <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="AVATAR"
                        class="img-fluid">
                </div>




                <div class="container mt-2">
                    <center class="p my-3">
                        <h2>Login</h2>
                    </center>
                    <form action="">
                        <div class="form-row my-3 mx-3">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>

                        <div class="form-row g-3 my-3 mx-3">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputEmail4">
                        </div>

                        <div class="form-row g-3 my-3 mx-3">

                        </div>

                        <div class="form-row g-2 mt-5 mx-3">
                            <div class="d-flex align-items justify-content-center">
                                <div class="g-recaptcha mx-auto"
                                    data-sitekey="6LcXPt0eAAAAADF0gdx2PesnaggbU6n7j8R25Z53"></div>
                            </div>

                        </div>

                        <div class="form-row g-3 my-5">
                            <div class="d-flex align-items justify-content-center">
                                <input type="submit" class="btn btn-primary " value="Login">
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src='https://www.google.com/recaptcha/api.js' async defer></script>


    <style>

    </style>

</body>

</html>