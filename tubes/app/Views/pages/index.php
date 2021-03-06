<?php
function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 10);
    $result = curl_exec($curl);
    curl_close($curl);


    return json_decode($result, true);
}


$result = get_CURL('https://developers.zomato.com/api/v2.1/geocode?lat=' . $resto['lat'] . '&lon=' . $resto['lon'] . '&apikey=0a62db4d542c54b65c4c29f09daa2bb6&maxResults=20');


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="icon" href="/img/icon2.png" type="image/gif" sizes="16x16">


    <title><?= $title; ?></title>
</head>

<body>


    <!-- nav -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand "><img src="/img/logo2.png" height="35" alt=""></a>
            <form class="d-flex">
                <div class="d-flex ">
                    <input class="form-control me-1  " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-orange" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <a class="login-link btn btn-login" href="
                <?php if (logged_in() && (in_groups('admin'))) { ?>
                        /admin
                    <?php } else if (logged_in() && in_groups('user')) { ?>
                        /profile
                    <?php } else { ?>
                        /login
                    <?php } ?>
                    ">
                <?php if (logged_in()) { ?>
                    <?= user()->username; ?>
                <?php } else { ?>
                    Login
                <?php } ?>

            </a>

        </div>
    </nav>




    <div class="container pt-5 mb-5 card-detail p-lokasi">
        <p class="a-pages text-center  "><a class="a-pages" href="/user/index"> Beranda </a> / <?= $resto['daerah']; ?></p>
        <h3 class=""> Makanan daerah di daerah <?= $resto['daerah']; ?></h3>
        <div class="row justify-content-left mt-5">
            <?php for ($i = 0; $i < 9; $i++) : ?>
                <div class="col-md-3 mt-5 pb-5 ">
                    <div class="card " style="width: 19.5rem; margin-top:-70px ">

                        <a href="/pages/detailRes/<?= $resto['id']; ?>" class="card-temukan" style="height: 500px; ">
                            <?php if (empty($result['nearby_restaurants'][$i]['restaurant']['thumb'])) : ?>
                                <img src="/img/noimage.png" width="300px" height="310px" alt="">
                            <?php else : ?>
                                <img src="<?= $result['nearby_restaurants'][$i]['restaurant']['thumb']; ?>" class="card-img-top img-radius" alt="...">
                            <?php endif; ?>








                            <div class="card-body">

                                <h5 class="card-title mb-4"><b><?= $result['nearby_restaurants'][$i]['restaurant']['name']; ?></b></h5>
                                <p class="p-detail">Rating <?= $result['nearby_restaurants'][$i]['restaurant']['user_rating']['aggregate_rating']; ?></p>
                                <p class="p-detail"><?= $result['nearby_restaurants'][$i]['restaurant']['location']['address']; ?></p>
                                <p class="p-detail">Rp. <?= $result['nearby_restaurants'][$i]['restaurant']['average_cost_for_two']; ?> untuk 2 orang.</p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>









    <!-- Footer -->
    <footer class="bg-footer text-black text-center text-lg-start pt-2">
        <!-- Grid container -->
        <div class="container p-4 pt-5">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase" style="font-size: 35px;">Le Pesto</h5>

                    <p>
                        Universitas Pasundan
                    </p>
                    <p class="pt-0">
                        Jalan Dr. Setiabudi No 193, Bandung
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0 text-black">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
        <hr class="hrr">
        <!-- Copyright -->
        <div class="text-center p-3" style=" background-color: rgb(247, 247, 247)">
            © 2020 Copyright:
            <a class="text-black" style="text-decoration:none; color:black" href="">Lepesto</a>
        </div>
        <!-- Copyright -->
    </footer>













    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>