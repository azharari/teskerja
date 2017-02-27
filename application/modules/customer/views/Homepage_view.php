<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hazard Car Rent</title>
    <meta name="description" content="Various styles and inspiration for responsive, flexbox-based HTML pricing tables" />
    <meta name="keywords" content="pricing table, inspiration, ui, modern, responsive, flexbox, html, component" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/customer/css/normalize.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/customer/css/demo.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/customer/css/icons.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/customer/css/component.css')?>" />
    <!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
    <div class="container">
        <header class="codrops-header">
           
            <h1> HAZARD CAR RENT<span>now everyone can rent car</span></h1>
			<H3>
        </header>
        
        <section class="pricing-section bg-5">
		<img src="<?php echo base_url('assets/login/BIOHAZARD.PNG') ?>
            <h2 class="pricing-section__title">- HAZARD CAR RENT -</h2>
			<h1 >CAR RENT LIST</h1>
            <div class="pricing pricing--yama">
               
				<?php foreach($mobil as $row)
				{
				?>
                <div class="pricing__item">
                    <h3 class="pricing__title">
					<?php 
						$hasil = explode(" ",$row->Nama_Mobil);
						echo $hasil[0].'<br>'.$hasil[1];		
					?>
					
					</h3>
                    <p class="pricing__sentence"></p>
                    <div class="pricing__price"><span class="pricing__currency">
					Rp </span><?php 
						$hasil = $row->Harga;
						echo number_format($hasil);		
					?><span class="pricing__period">
					per hari</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Best care car</li>
                        <li class="pricing__feature">Clean, luxury, enjoy</li>
                        <li class="pricing__feature">Powerfull and comfortable</li>
                    </ul>
                    <a class="pricing__action" href="<?php echo site_url('auth/')?>">Booking Now !!</a>
                </div>
				<?php
				}
				?>
            </div>
        </section>
       
        <!-- Related demos -->
        <section class="content content--related">
            <p>HAZARD CAR RENT WEBSITE - CREATED BY ARI_HAZARD @FEBRUARY2017 FOR JOB RECRUITMENT TEST</p>
            <a class="media-item" href="">
                <img class="media-item__img" src="img/related/CheckoutConcepts.png">
                <h3 class="media-item__title">Customer Register</h3>
            </a>
            <a class="media-item" href="">
                <img class="media-item__img" src="img/related/ArrowNavigationEffects.png">
                <h3 class="media-item__title">Admin Page</h3>
            </a>
        </section>
    </div>
    <!-- /container -->
	

</body>

</html>
