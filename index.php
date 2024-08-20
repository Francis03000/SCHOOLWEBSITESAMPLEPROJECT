<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>
<link rel="stylesheet" href="style.css">

<style>
	.container {
		margin-top: -0.3rem;
	}

	.vertical-line {
		width: 2px;
		height: 43vh;
		background-color: yellow;
		position: absolute;
		top: 30px;
		left: 50%;
		transform: translateX(-50%);
	}

	@media (max-width: 767px) {
		.vertical-line {
			width: 100%;
			height: 2px;
			transform: none;
			top: 37%;
			left: 0;
		}
	}

	/* WHAT WE OFFER FLIP CARD */

	.section_title {
		position: relative;
	}

	.section_title::before,
	.section_title::after {
		content: "";
		position: absolute;
		top: 50%;
		width: 28%;
		/* Adjust the width of the lines as needed */
		height: 1px;
		/* Adjust the height of the lines as needed */
		background-color: maroon;
		/* Color of the lines */
	}

	.section_title::before {
		left: 0;
		transform: translateY(-50%);
	}

	.section_title::after {
		right: 0;
		transform: translateY(-50%);
	}

	/* Media Query for smaller screens */
	@media (max-width: 768px) {

		.section_title::before,
		.section_title::after {
			width: 25%;
			/* Adjust the width for smaller screens */
		}
	}

	/* Media Query for even smaller screens */
	@media (max-width: 576px) {

		.section_title::before,
		.section_title::after {
			width: 15%;
			/* Further adjust the width for very small screens */
		}
	}

	.courses {
		background-image: url('assets/images/pic19.jpg');
		background-attachment: fixed;
		background-size: cover;
	}

	.flip-card {
		background-color: transparent;
		width: 40vh;
		height: 300px;
		perspective: 1000px;
		cursor: pointer;
	}

	.flip-card-inner {
		width: 100%;
		height: 100%;
		transform-style: preserve-3d;
		transition: transform 0.5s;
	}

	.flip-card.flipped .flip-card-inner {
		transform: rotateY(180deg);
	}

	.flip-card-front,
	.flip-card-back {
		width: 100%;
		height: 100%;
		position: absolute;
		backface-visibility: hidden;
	}

	.flip-card-front {
		background-color: #f8f9fa;
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 24px;
	}

	.flip-card-back {
		font-size: 18px;
		background-color: #FE9900;
		color: black;
		display: flex;
		justify-content: center;
		align-items: center;
		transform: rotateY(180deg);
	}

	.image {
		margin-top: -10rem;
	}

	/* GALLERY TITLE */
	.gallery {
		position: relative;
	}

	.gallery::before,
	.gallery::after {
		content: "";
		position: absolute;
		top: 50%;
		width: 39%;
		/* Adjust the width of the lines as needed */
		height: 1px;
		/* Adjust the height of the lines as needed */
		background-color: maroon;
		/* Color of the lines */
	}

	.gallery::before {
		left: 0;
		transform: translateY(-50%);
	}

	.gallery::after {
		right: 0;
		transform: translateY(-50%);
	}

	/* Media Query for smaller screens */
	@media (max-width: 768px) {

		.gallery::before,
		.gallery::after {
			width: 35%;
			/* Adjust the width for smaller screens */
		}
	}

	/* Media Query for even smaller screens */
	@media (max-width: 576px) {

		.gallery::before,
		.gallery::after {
			width: 30%;
			/* Further adjust the width for very small screens */
		}
	}

	/* CALENDAR TITLE */
	.calendar {
		position: relative;
	}

	.calendar::before,
	.calendar::after {
		content: "";
		position: absolute;
		top: 50%;
		width: 32%;
		/* Adjust the width of the lines as needed */
		height: 1px;
		/* Adjust the height of the lines as needed */
		background-color: maroon;
		/* Color of the lines */
	}

	.calendar::before {
		left: 0;
		transform: translateY(-50%);
	}

	.calendar::after {
		right: 0;
		transform: translateY(-50%);
	}

	/* Media Query for smaller screens */
	@media (max-width: 768px) {

		.calendar::before,
		.calendar::after {
			width: 25%;
			/* Adjust the width for smaller screens */
		}
	}

	/* Media Query for even smaller screens */
	@media (max-width: 576px) {

		.calendar::before,
		.calendar::after {
			width: 20%;
			/* Further adjust the width for very small screens */
		}
	}

	/* GALLERY */

	@media (min-width: 768px) {
		.carousel-multi-item-2 .col-md-3 {
			float: left;
			width: 25%;
			max-width: 100%;
		}
	}

	.carousel-multi-item-2 .card img {
		border-radius: 2px;
	}


	/* NEWS */
	.card-container {
		display: flex;

	}

	.card {
		max-width: 100%;
		text-align: center;
	}

	.news-image {
		max-width: 100%;
		height: auto;
	}

	.outside-text {
		text-align: center;
	}

	@media (max-width: 767px) {

		/* Mobile view */
		.card-container {
			flex-direction: column;
		}

		.news-image {
			max-width: 100%;
		}
	}

	@media (min-width: 768px) and (max-width: 1024px) {

		/* iPad view */
		.news-image {
			max-width: 15rem;
		}
	}


	/* WHY CHOOSE US */
	.choose {
		position: relative;
	}

	.choose::before,
	.choose::after {
		content: "";
		position: absolute;
		top: 50%;
		width: 35%;
		/* Adjust the width of the lines as needed */
		height: 1px;
		/* Adjust the height of the lines as needed */
		background-color: maroon;
		/* Color of the lines */
	}

	.choose::before {
		left: 0;
		transform: translateY(-50%);
	}

	.choose::after {
		right: 0;
		transform: translateY(-50%);
	}

	/* Media Query for smaller screens */
	@media (max-width: 768px) {

		.choose::before,
		.choose::after {
			width: 32%;
			/* Adjust the width for smaller screens */
		}
	}

	/* Media Query for even smaller screens */
	@media (max-width: 576px) {

		.choose::before,
		.choose::after {
			width: 25%;
			/* Further adjust the width for very small screens */
		}
	}


	/* WHY CHOOSE US */
	.custom-card {
		background-color: #f8f9fa;
		border: 1px solid maroon;
		height: 25rem;
		border-radius: 10px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		transition: transform 0.2s;
	}

	.custom-card:hover {
		transform: translateY(-5px);
	}

	/* Style the card titles */
	.card-title {
		font-size: 1.5rem;
		font-weight: bold;
		color: #333;
	}

	/* Style the card text */
	.card-text {
		font-size: 1.2rem;
		color: #555;
	}

	@media (max-width: 768px) {

		.custom-card {
			height: 47rem;
		}
	}

	@media (max-width: 576px) {

		.custom-card {
			height: 30rem;
		}
	}


	/* ABOUT */
	.about {
		position: relative;
	}

	.about::before,
	.about::after {
		content: "";
		position: absolute;
		top: 50%;
		width: 38%;
		/* Adjust the width of the lines as needed */
		height: 1px;
		/* Adjust the height of the lines as needed */
		background-color: maroon;
		/* Color of the lines */
	}

	.about::before {
		left: 0;
		transform: translateY(-50%);
	}

	.about::after {
		right: 0;
		transform: translateY(-50%);
	}

	/* Media Query for smaller screens */
	@media (max-width: 768px) {

		.about::before,
		.about::after {
			width: 32%;
			/* Adjust the width for smaller screens */
		}
	}

	/* Media Query for even smaller screens */
	@media (max-width: 576px) {

		.about::before,
		.about::after {
			width: 30%;
			/* Further adjust the width for very small screens */
		}
	}


	.background-container {
		background-image: url('assets/images/pic8.jpg');
		/* Replace with your background image URL */
		background-size: cover;
		background-blur: blur(10px);
		/* Adjust the blur level as needed */
		background-attachment: fixed;
		position: relative;
		z-index: 1;
	}

	.background-container::before {
		content: "";
		background-color: maroon;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		opacity: 0.7;
		/* Adjust the opacity as needed */
		z-index: -1;
	}

	.tits {
		font-size: 5.25vmin;
		text-align: center;
		color: white;
	}

	.pard {
		font-size: max(10pt, 2.5vmin);
		line-height: 1.4;
		color: #0e390e;
		margin-bottom: 1.5rem;
	}

	.wrap {
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-between;
		width: 85vmin;
		height: 25em;
		margin: 2rem auto;
		border: 8px solid #FE9900;
		/* border-image: linear-gradient(-50deg, green, #00b300, forestgreen, green, lightgreen, #00e600, green) 1; */
		transition: .3s ease-in-out;
		position: relative;
		overflow: hidden;
	}

	.overlay {
		position: relative;
		display: flex;
		width: 100%;
		height: 100%;
		padding: 1rem .75rem;
		background: maroon;
		transition: .4s ease-in-out;
		z-index: 1;
	}

	.overlay-content {
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		width: 15vmin;
		height: 100%;
		padding: .5rem 0 0 .5rem;
		border: 3px solid;
		border-image:
			linear-gradient(to bottom,
				#FE9900 5%,
				maroon 100%,
				#FE9900 95%) 0 0 0 100%;
		transition: .3s ease-in-out .2s;
		z-index: 1;
	}

	.image-content {
		position: absolute;
		top: 0;
		right: 0;
		width: 60vmin;
		height: 100%;
		background-image: url("assets/images/pic19.jpg");
		background-size: cover;
		transition: .3s ease-in-out;
		/* border: 1px solid green; */
	}

	.image-content2 {
		position: absolute;
		top: 0;
		right: 0;
		width: 60vmin;
		height: 100%;
		background-image: url("assets/images/pic13.jpg");
		background-size: cover;
		transition: .3s ease-in-out;
		/* border: 1px solid green; */
	}

	.inset {
		max-width: 50%;
		margin: 0.25em 1em 1em 0;
		border-radius: 0.25em;
		float: left;
	}

	.dots {
		position: absolute;
		bottom: 1rem;
		right: 2rem;
		display: flex;
		flex-direction: row;
		justify-content: space-around;
		align-items: center;
		width: 55px;
		height: 4vmin;
		transition: .3s ease-in-out .3s;
	}

	.dot {
		width: 14px;
		height: 14px;
		background: yellow;
		border: 1px solid indigo;
		border-radius: 50%;
		transition: .3s ease-in-out .3s;
	}

	.text {
		position: absolute;
		top: 0;
		right: 0;
		width: 60vmin;
		height: 100%;
		padding: 3vmin 4vmin;
		background: #fff;
		box-shadow: inset 1px 1px 15px 0 rgba(0 0 0 / .4);
		overflow-y: scroll;
	}

	.wrap:hover .overlay {
		transform: translateX(-60vmin);
	}

	.wrap:hover .image-content {
		width: 30vmin;
	}

	.wrap:hover .overlay-content {
		border: none;
		transition-delay: .2s;
		transform: translateX(60vmin);
	}

	.wrap:hover .dots {
		transform: translateX(1rem);
	}

	.wrap:hover .dots .dot {
		background: white;
	}


	/* Animations and timing delays */
	.animate {
		animation-duration: 0.7s;
		animation-timing-function: cubic-bezier(.26, .53, .74, 1.48);
		animation-fill-mode: backwards;
	}

	/* Pop In */
	.pop {
		animation-name: pop;
	}

	@keyframes pop {
		0% {
			opacity: 0;
			transform: scale(0.5, 0.5);
		}

		100% {
			opacity: 1;
			transform: scale(1, 1);
		}
	}

	/* Slide In */
	.slide {
		animation-name: slide;
	}

	@keyframes slide {
		0% {
			opacity: 0;
			transform: translate(4em, 0);
		}

		100% {
			opacity: 1;
			transform: translate(0, 0);
		}
	}

	/* Slide Left */
	.slide-left {
		animation-name: slide-left;
	}

	@keyframes slide-left {
		0% {
			opacity: 0;
			transform: translate(-40px, 0);
		}

		100% {
			opacity: 1;
			transform: translate(0, 0);
		}
	}

	.slide-up {
		animation-name: slide-up;
	}

	@keyframes slide-up {
		0% {
			opacity: 0;
			transform: translateY(3em);
		}

		100% {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.delay-1 {
		animation-delay: 0.3s;
	}

	.delay-2 {
		animation-delay: 0.6s;
	}

	.delay-3 {
		animation-delay: 0.9s;
	}

	.delay-4 {
		animation-delay: 1.2s;
	}

	.delay-5 {
		animation-delay: 1.5s;
	}

	.delay-6 {
		animation-delay: 1.8s;
	}

	.delay-7 {
		animation-delay: 2.1s;
	}

	.delay-8 {
		animation-delay: 2.4s;
	}

	/* HOME IMAGE */

	/* @media (max-width: 768px) {
		.home_slider_background {
			height: 70vh;
		}
	}

	@media (max-width: 480px) {
		.home_slider_background {
			height: 50vh;
		}
	} */

	#scrollTop {
		position: fixed;
		bottom: 20px;
		right: 20px;
		cursor: pointer;
		/* display: none; */
	}

	@media (max-width: 768px) {
		#scrollTop {
			display: none !important;
		}
	}
</style>

<i id="scrollTop" class="fa fa-arrow-up fa-3x" style="color: black;"></i>

<div class="home">
	<div class="home_slider_container">
		<div class="owl-carousel owl-theme home_slider">
			<div class="owl-item">
				<div class="home_slider_background" style="background-image:url(assets/images/homebg.jpg);"></div>
				<div class="home_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content text-center">
									<div class="home_text">
										<!-- <div class="home_title" style="text-shadow: 2px 2px 5px black;">RIO CHICO
											NATIONAL HIGH SCHOOL</div> -->
									</div>
									<div class="home_buttons">
										<!-- <div class="button home_button"><a href="about-us.php">learn more<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="courses.php">see all courses<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
										</div> -->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-item">
				<div class="home_slider_background" style="background-image:url(assets/images/home2.jpg);"></div>
				<div class="home_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content text-center">
									<div class="home_text">
										<!-- <div class="home_title" style="text-shadow: 2px 2px 5px black;">RIO CHICO
											NATIONAL HIGH SCHOOL</div> -->
									</div>
									<div class="home_buttons">
										<!-- <div class="button home_button"><a href="about-us.php">learn more<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="courses.php">see all courses<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-item">
				<div class="home_slider_background" style="background-image:url(assets/images/home3.jpg);"></div>
				<div class="home_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content text-center">
									<div class="home_text">
										<!-- <div class="home_title" style="text-shadow: 2px 2px 5px black;">RIO CHICO
											NATIONAL HIGH SCHOOL</div> -->
									</div>
									<div class="home_buttons">
										<!-- <div class="button home_button"><a href="about-us.php">learn more<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="courses.php">see all courses<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											</div> -->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ANNOUNCEMENT FE9900 -->

<div class="container">
	<div class="row">
		<div class="col-md-7 mt-5 mx-auto" style="background-color: maroon; border-radius: 10px;">
			<div class="news" style="bottom: 35px;">
				<a href="announcement.php#news">
					<h2 class="text-center" style="text-decoration: underline; color: white;">NEWS</h2>
				</a>

				<div class="container mt-4" id="news_contain"></div>
			</div>
		</div>

		<div class="col-md-4 mt-5 mx-auto" style="background-color: maroon; border-radius: 10px;">
			<a href="announcement.php#announ">
				<h2 class="text-center mt-4" style="text-decoration: underline; color: white;">ANNOUNCEMENT</h2>
			</a>

			<div class="gallery" id="announce_gal">
			</div>
		</div>
	</div>
</div>

<div class="container mt-5">
	<h2 class="about text-center" style="color: maroon;">ABOUT US</h2>
	<div class="row align-items-center background-container">
		<div class="col-xl-6">
			<br>
			<div class="image-wrapper">
				<img src="assets/images/pic2.JPG" alt="Responsive Image">
			</div>
		</div>
		<div class="col-xl-6">
			<div class="text-wrapper mx-auto">
				<p class="text-white text-justify">Rio Chico National High School is a public secondary school
					located in General Tinio, a municipality in the province of Nueva Ecija, Philippines. The school was
					established in
					1971 as Rio Chico Barangay High School to provide secondary education to the students in the area.
					In 1991, the school was elevated to a national high school and was renamed Rio Chico National High
					School.</p>
				<a href="about-us.php#aboutschool">
					<button class="btn k-btn green-dark-btn mt-3" style="cursor: pointer;">Learn
						More</button>
				</a>
				<br><br><br>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<h2 class="text-center mt-5 gallery" style="color: maroon;">GALLERY</h2>
</div>

<div class="container">
	<div class="row">
		<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2"
			data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active" id="carol_active">
				</div>
				<div class="carousel-item" id="carol_1">
				</div>
				<div class="carousel-item" id="carol_2">
				</div>
			</div>
			<a class="black-text" href="#multi-item-example" data-slide="prev">
				<i class="fa fa-angle-left fa-3x pl-3"
					style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%);"></i>
			</a>
			<a class="black-text" href="#multi-item-example" data-slide="next">
				<i class="fa fa-angle-right fa-3x pr-3"
					style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
			</a>
		</div>
	</div>
</div>


<br>

<!-- ACADEMIC CALENDAR -->
<!-- <div class="container mt-5">
	<h2 class="calendar text-center" style="color: maroon;">Academic Calendar</h2>
</div>
<br>
<h2 class="text-center mt-5 mb-5">August 2023</h2>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="card text-center text-white mb-3 h-100" style="background-color: #A6FF96;">
				<div class="card-header text-dark" style="font-weight: 700;">June 13 - August 19</div>
				<div class="card-body text-dark">
					<p class="card-text">General Registration</p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card text-center text-white mb-3 h-100" style="background-color: #A6FF96;">
				<div class="card-header text-dark" style="font-weight: 700;">August 22</div>
				<div class="card-body text-dark">
					<p class="card-text">First Semester Begins</p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card text-center text-white mb-3 h-100" style="background-color: #A6FF96;">
				<div class="card-header text-dark" style="font-weight: 700;">August 30</div>
				<div class="card-body text-dark">
					<p class="card-text">Last day of Registration</p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card text-center text-white mb-3 h-100" style="background-color: #A6FF96;">
				<div class="card-header text-dark" style="font-weight: 700;">August 29 - August 30</div>
				<div class="card-body text-dark">
					<p class="card-text">Deadline of Adding, Changing and Dropping of Subject</p>
				</div>
			</div>
		</div>
	</div>
</div>

<h2 class="text-center mt-5 mb-5">September 2023</h2>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="card text-center text-white mb-3 h-100" style="background-color: #0000ee;">
				<div class="card-header" style="font-weight: 700;">September 22</div>
				<div class="card-body">
					<p class="card-text">Deadline of Adding, Changing and Dropping of Subject</p>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card text-center text-white mb-3 h-100" style="background-color: #0000ee;">
				<div class="card-header" style="font-weight: 700;">September 22</div>
				<div class="card-body">
					<p class="card-text">Deadline of Adding, Changing and Dropping of Subject</p>
				</div>
			</div>
		</div>
	</div>
</div>

<h2 class="text-center mt-5 mb-5">October 2023</h2>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="card text-center text-white mb-3 h-100"
				style="background: linear-gradient(135deg, #007BA7 50%, #FF8080);">
				<div class="card-header" style="font-weight: 700;">October 22</div>
				<div class="card-body">
					<p class="card-text">Deadline of Adding, Changing and Dropping of Subject</p>
				</div>
			</div>
		</div>
	</div>
	<a href="calendar.php">
		<button class="btn k-btn green-dark-btn mt-3 mx-auto d-block"
			style="cursor: pointer; border: 2px solid black;">See
			More</button>
	</a>
</div> -->
<br><br><br>
<!-- WHY WE CHOOSE US -->
<div class="container">
	<h2 class="mt-5 mb-4 text-center choose" style="color: maroon;">Why Choose Us</h2>
	<div class="row">
		<div class="col-md-4 mb-3">
			<div class="card custom-card">
				<div class="card-body">
					<h5 class="card-title">Academic Excellence</h5>
					<p class="card-text" style="color: black;">Rio Chico National High School maintains high
						academic standards, providing
						students with
						a top-notch education and a strong foundation for future success.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<div class="card custom-card">
				<div class="card-body">
					<h5 class="card-title">Experienced and Caring Faculty</h5>
					<p class="card-text" style="color: black;">Our school is staffed with dedicated and
						compassionate teachers who are
						experts in their
						fields and genuinely care about each student's growth and development.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<div class="card custom-card">
				<div class="card-body">
					<h5 class="card-title">Holistic Education</h5>
					<p class="card-text" style="color: black;">We offer a well-rounded education that goes beyond
						academics,
						emphasizing character
						development, leadership skills, and social responsibility through extracurricular
						activities, sports, and
						community involvement.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- COURSES -->

<!-- <div class="courses mt-5"> -->
<div class="container mt-5">
	<h2 class="section_title text-center" style="color: maroon;">WHAT WE CAN OFFER?</h2>
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-6">
			<div class="wrap animate pop">
				<div class="overlay">
					<div class="overlay-content animate slide-left delay-2">
						<h1 class="animate slide-left pop delay-4 tits mt-5">Junior High School</h1>
					</div>
					<div class="image-content animate slide delay-5"></div>
					<div class="dots animate">
						<div class="dot animate slide-up delay-6"></div>
						<div class="dot animate slide-up delay-7"></div>
						<div class="dot animate slide-up delay-8"></div>
					</div>
				</div>
				<div class="text">
					<div class="mt-5" style="font-size: 24px; color: black;" id="strands_container2"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="wrap animate pop">
				<div class="overlay">
					<div class="overlay-content animate slide-left delay-2">
						<h1 class="animate slide-left pop delay-4 tits mt-5">Senior High School</h1>
					</div>
					<div class="image-content2 animate slide delay-5"></div>
					<div class="dots animate">
						<div class="dot animate slide-up delay-6"></div>
						<div class="dot animate slide-up delay-7"></div>
						<div class="dot animate slide-up delay-8"></div>
					</div>
				</div>
				<div class="text">
					<div class="mt-5" style="font-size: 24px; color: black;" id="strands_container"></div>
				</div>
			</div>
		</div>
	</div>
</div>


<br><br>

<?php include("layoutsWebsite/footer.php"); ?>
<script src="js/index/index.js"></script>
<script>
	const dropdownBtns = document.querySelectorAll('.dropdown-btn');

	dropdownBtns.forEach(btn => {
		btn.addEventListener('click', function () {
			const dropdown = this.parentElement;
			dropdown.classList.toggle('open');
		});
	});






	$.get({
		url: "admin/news/newsCrud.php",
		data: { getDataHeadline: "getDataHeadline" },
		success: function (data) {
			let newData = JSON.parse(data);

			newData.forEach((news, i) => {


				let news_contain = $("#news_contain ");
				// alert(news.news_category_id);
				// alert(news.news_image);

				function truncateWords(text, maxWords) {
					var words = text.split(' ');
					if (words.length > maxWords) {
						return words.slice(0, maxWords).join(' ') + '...';
					}
					return text;
				}

				news_contain.append(
					'<div class="card-container">' +
					'<div class="card mx-auto" style="max-width: 15rem;">' +
					'<img src=' + 'assets/images/news/' + news.news_category_id + '/' + news.news_image + ' class="img-fluid news-image" alt="Image">' +
					'</div>' +
					'<div class="outside-text">' +
					'<h3 style="color: white; text-decoration: underline;">' +
					truncateWords(news.news_title, 30) +
					'</h3>' +
					'<p style="color: white;">' +
					truncateWords(news.news_description, 30) +
					'</p>' +
					'<a href="announcement.php#news"><button class="btn k-btn green-dark-btn mt-2 pull-right" style="cursor: pointer;">Read More</button></a>' +
					'</div>' +
					'</div>' +
					'<hr style="background-color: white;">' +
					'<br>'
				);




			});
		},
	});


	$.get({
		url: "admin/announcements/announcementsCrud.php",
		data: { getDataHeadline: "getDataHeadline" },
		success: function (data) {
			let newData = JSON.parse(data);

			newData.forEach((announcements, i) => {

				const dateStr = announcements.create_a;


				const [datePart, timePart] = dateStr.split(" ");

				const [year, month, day] = datePart.split("-");

				const months = [
					"January", "February", "March", "April", "May", "June",
					"July", "August", "September", "October", "November", "December"
				];

				const monthWord = months[parseInt(month) - 1];

				const formattedDate = `${monthWord} ${day}, ${year}`;

				let announce_gal = $("#announce_gal");
				announce_gal.append(
					'<div class="card" style="border: none;">' +
					'<img src=' + 'assets/images/announcements/' + announcements.announcement_category_id + '/' + announcements.announcement_image + ' alt="Image 1" class="img-thumbnail">' +
					'<div class="card-body" style="background-color: maroon;">' +
					'<a href="announcement.php#announ">' +
					'<p class="card-text text-center text-white">' + announcements.announcement_title + '</p>' +
					'<p class=" text-center text-white">' + formattedDate + '</p>' +
					'</a>' +
					'</div >' +
					'</div >'

				);



			});
		},
	});


	var count = 0;

	$.get({
		url: "admin/galleries/galleriesCrud.php",
		data: { getDataHeadline: "getDataHeadline" },
		success: function (data) {
			let newData = JSON.parse(data);

			newData.forEach((gallery, i) => {
				let carol_active = $("#carol_active ");
				let carol_1 = $("#carol_1 ");
				let carol_2 = $("#carol_2 ");


				count = count + 1;
				if (count < 5) {
					carol_active.append(
						'<div class="col-md-3 mb-3">' +
						'<div class="card">' +
						'<img style="height: 200px; width: 400px"  class="img-fluid" src=' + 'assets/images/gallery/' + gallery.gallery_category_id + '/' + gallery.gallery_image + ' alt="Card image cap">' +
						'</div >' +
						'</div >'
					)

				} else if (count < 9) {
					carol_1.append(
						'<div class="col-md-3 mb-3">' +
						'<div class="card">' +
						'<img style="height: 200px; width: 400px"  class="img-fluid" src=' + 'assets/images/gallery/' + gallery.gallery_category_id + '/' + gallery.gallery_image + ' alt="Card image cap">' +
						'</div >' +
						'</div >'
					)

				} else if (count <= 12) {
					carol_2.append(
						'<div class="col-md-3 mb-3">' +
						'<div class="card">' +
						'<img style="height: 200px; width: 400px"  class="img-fluid" src=' + 'assets/images/gallery/' + gallery.gallery_category_id + '/' + gallery.gallery_image + ' alt="Card image cap">' +
						'</div >' +
						'</div >'
					)

				}








			});
		},
	});


</script>
<script>
	function flipCard(card) {
		card.classList.toggle('flipped');
	}

	$(document).ready(function () {
		// Show or hide the scroll-to-top button based on scroll position
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#scrollTop').fadeIn();
			} else {
				$('#scrollTop').fadeOut();
			}
		});

		// Smooth scroll to top when the button is clicked
		$('#scrollTop').click(function () {
			$('html, body').animate({ scrollTop: 0 }, 800);
			return false;
		});
	});

</script>
<script src="js/index/ann.js"></script>
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