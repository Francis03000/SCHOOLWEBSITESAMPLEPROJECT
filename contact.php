<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>

<style>
	form {
		display: flex;
		flex-direction: column;
		max-width: 500px;
		margin: 0 auto;
	}

	label {
		margin-top: 10px;
		font-weight: bold;
	}

	input[type="text"],
	input[type="email"],
	textarea {
		padding: 10px;
		margin-bottom: 20px;
		border: none;
		border-radius: 5px;
		background-color: #f2f2f2;
		font-size: 16px;
	}

	textarea {
		height: 150px;
	}

	button[type="submit"] {
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		background-color: #4CAF50;
		color: white;
		font-size: 16px;
		cursor: pointer;
	}

	button[type="submit"]:hover {
		background-color: #3e8e41;
	}

	/* MAP */
	.map-container {
		height: 500px;
	}
</style>


<!-- Home -->

<div class="home">
	<div class="home_background parallax_background parallax-window" data-parallax="scroll"
		data-image-src="assets/images/pic8.jpg" data-speed="0.8"></div>
	<div class="home_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Contact -->
<br><br>
<div class="container mt-5">
	<div class="row text-center">
		<div class="col">
			<h3 class="contact_info_title" style="color: maroon; font-size: 23px;"><i class="fa fa-envelope"></i> Email
			</h3>
			<div class="contact_info_line" style="color: black; font-size: 14px;">
				riochicohighschool1548@gmail.com</div>
		</div>
		<div class="col">
			<div class="contact_info_title" style="color: maroon; font-size: 23px;"><i class="fa fa-phone"></i>
				Phone
			</div>
			<div class="contact_info_line" style="color: black; font-size: 14px;">
				044-940-3513</div>
		</div>
		<div class="col">
			<div class="contact_info_title" style="color: maroon; font-size: 23px;"><i class="fa fa-address-card"></i>
				Address
			</div>
			<div class="contact_info_line" style="color: black; font-size: 14px;">Camia B.
				Rio Chico, General
				Tinio, Nueva Ecija</div>
		</div>
	</div>
</div>

<br><br>

<div class="contact mt-5">
	<div class="container">
		<div class="row row-xl-eq-height">
			<!-- Contact Content -->
			<div class="col-xl-6">
				<div class="contact_content">
					<h2 style="color: maroon;">Send us a Message</h2>
					<p style="color: black;">If you have any questions, feel free to contact us.</p>
					<div class="">
						<form class="ml-2" action="sendemail/send.php" method="post">
							<label for="name" style="color: black;">Name</label>
							<input type="text" id="name" name="name"
								style="border: 1px solid black; background-color: #ffffff; " required>

							<label for="email" style="color: black;">Email</label>
							<input type="email" id="email" name="email"
								style="border: 1px solid black;  background-color: #ffffff; " required>

							<label for="message" style="color: black;">Message</label>
							<textarea id="message" name="message"
								style="border: 1px solid black;  background-color: #ffffff;" required></textarea>

							<button type="submit" name="send">Send Message</button>
						</form>
					</div>
				</div>
			</div>

			<!-- Contact Map -->
			<div class="col-md-6">
				<h2 style="color: maroon;">Find Us on the Map</h2>
				<div class="map-container">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3847.403495423852!2d121.06597239999999!3d15.354618749999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339724a53b9a3705%3A0x9fbdf6f6f5ffab45!2sRio%20Chico%20National%20High%20School%2C%20General%20Tinio%2C%20Nueva%20Ecija!5e0!3m2!1sen!2sph!4v1683233419403!5m2!1sen!2sph"
						width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
						aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	/* To Disable Inspect Element */
	// $(document).bind("contextmenu", function (e) {
	// 	e.preventDefault();
	// });

	// $(document).keydown(function (e) {
	// 	if (e.which === 123) {
	// 		return false;
	// 	}
	// });
	// document.onkeydown = (e) => {

	// 	if (e.key == 123) {

	// 		e.preventDefault();

	// 	}

	// 	if (e.ctrlKey && e.shiftKey && e.key == 'I') {

	// 		e.preventDefault();

	// 	}

	// 	if (e.ctrlKey && e.shiftKey && e.key == 'C') {

	// 		e.preventDefault();

	// 	}

	// 	if (e.ctrlKey && e.shiftKey && e.key == 'j') {

	// 		e.preventDefault();

	// 	}

	// 	if (e.ctrlKey && e.key == 'U') {

	// 		e.preventDefault();
	// 	}
	// };
</script>
<br><br>
<?php include("layoutsWebsite/footer.php"); ?>