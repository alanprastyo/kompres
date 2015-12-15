<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php echo $judul ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets3/css/jquery.fancybox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/da-slider.css" />
        <!-- Owl Carousel Assets -->

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets3/css/styles.css" />
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>assets3/css/font-awesome.min.css" rel="stylesheet">
    </head> 
    <body>
        <!--Price Table-->
        <section id="priceTable" class="secPad white">
            <div class="container">
                <div class="heading text-center">
                    <!-- Heading -->
                    <h2>Login Area Wismut 2016</h2>
                    <p>Pariwisata Sumatera Utara</p>
                    <p><a href="<?php echo base_url() ?>">Kembali ke Laman Utama</a></p>
                </div>
                <div class="row"> 
                    <div class="col-sm-4">
                        <div class="panel panel-danger text-center">
                            <div class="panel-heading">
                                <h3>Wisatawan</h3>
                            </div>
                            <div class="panel-body">
                                <h3 class="panel text-center">Wisatawan Area</h3>
                            </div>
                            <ul class="list-group">

                                <li class="list-group-item"><a href="#" class="btn btn-primary">Login</a> <a href="#" class="btn btn-primary">Register</a></li>
                            </ul>
                        </div>          
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-danger text-center">
                            <div class="panel-heading">
                                <h3>Pemandu</h3>
                            </div>
                            <div class="panel-body">
                                <h3 class="panel text-center">Pemandu Area</h3>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="<?php echo base_url() ?>pemandu/auth" class="btn btn-primary">Login</a> <a href="<?php echo base_url() ?>pemandu/register" class="btn btn-primary">Register</a></li>
                            </ul>
                        </div>          
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-danger text-center">
                            <div class="panel-heading">
                                <h3>Kontributor</h3>
                            </div>
                            <div class="panel-body">
                                <h3 class="panel text-center">Kontributor Area</h3>
                            </div>
                            <ul class="list-group">

                                <li class="list-group-item"><a href="<?php echo base_url() ?>kontributor/auth" class="btn btn-primary">Login</a> <a href="<?php echo base_url() ?>kontributor/register" class="btn btn-primary">Register</a></li>
                            </ul>
                        </div>          
                    </div>

                </div>
            </div>      
        </section>

    </body>
</html>