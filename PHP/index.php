<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CURL example + CSV generating</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="library/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="library/scripts.js"></script>
</head>

<body class="body bg-white">

    <header class="header bg-black ">
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 ">
                    <h1 class="text-white h4">PHP CURL example + CSV generating</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img src="library/img.png" alt="img" width="250">
            </div>
            <div class="table">

            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <button class="btn"><i class="fa fa-download"></i> Download CVS</button>
            </div>
        </div>
    </div>

    <footer class="footer bg-black text-center pt-2">
        <p class="text-white">&copy;<?= date("Y") ?></p>
    </footer>

</body>

</html>