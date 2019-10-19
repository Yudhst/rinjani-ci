<div class="bodyhome">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="<?= base_url().'assets/img/28.jpg'?>" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url().'assets/img/b.jpg'?>" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url().'assets/img/hd.jpg'?>" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

	<div class="ket">
		B E S T &nbsp; S E L L E R
		<hr>
        <br>
        <br>
        <br>

		<div class="news">
			<div class="container">
				<div class="owl-carousel">
					<?php foreach($bestSeller as $bs): ?>
						<div>
							<center>
								<img src="<?= base_url().'uploads/products/'.$bs->img ?>" style="width:200px; height:200px;">
							</center>
							<p style="margin-top:10%">
								<?php
								if (strlen($bs->name) > 23) {
									echo substr($bs->name, 0, 20) . ". . .";
								} else {
									echo $bs->name;
								}
								?>
							</p>
							<br>
							    <h5 style="margin-top:-10%"><?php echo "Rp. " . number_format($bs->price) ?></h5>
							<br>
							<form action="" method="post">
								<input type="hidden" name="idUser">
								<input type="hidden" name="id">
								<button class="btnku btnku-putih" onclick="return confirm('Login first')" >
									<i class="fas fa-cart-plus    "></i>
									<span>Add to Cart</span>
								</button>
								<a href="<?= base_url().'home/detail/'.$bs->id_products?>" class="btnku btnku-putih">
									<i class="fas fa-eye    "></i>
								</a>
							</form>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>


		<div class="parent">
			<div class="gm">
				<img src="<?= base_url().'assets/img/rinjani.png'?>" width="490" height="350">
			</div>

			<div class="gm1">
				<div class="ab">
					A B O U T
				</div>

				<hr style="width:100%; margin:1%;">
				Rinjani is an online shop that provides the most complete hiking <br><br>
				equipment in Indonesia.You can get all the perfect hiking here.<br><br>
				With affordable prices and quality goods, of course, can provide <br><br>
				the convenience of shopping for climbers in Indonesia.So what are<br>
				you waiting for, immediately get your favorite climbing item here<br><br>
				<br>
				RINJANI ' 19
			</div>
		</div>
		<div class="parent1" style="margin-top:5%;">
			<div class="tx">
				<br>Rinjani Outdoor Shop
			</div>
			<br><br>
			<div class="tx1">
				You can get all the perfect hiking here.
			</div>
			<br><br>
			<div class="tx2">
				Copyright &copy; 2019 Rinjani Outdoor Shop.
				<br>
                Developed with <span style="color:red;">&#10084;</span> by Gopla.
			</div>
		</div>

	</div>



	<script>
		$("#sliderShuffle").cycle({
			next: '#next',
			prev: '#prev'
		});

		$('.owl-carousel').owlCarousel({
			items: 4,
			loop: true,
			margin: 5,
			autoplay: true,
			autoplayTimeout: 2000, //3 Second
			nav: true,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 3,
					nav: true
				},
				1000: {
					items: 4,
					nav: true
				}
			}

		});
	</script>