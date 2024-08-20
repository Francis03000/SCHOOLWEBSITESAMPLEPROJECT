<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>

<style>
	.hidden {
		display: none;
	}

	/* Custom card design */
	.custom-card {
		border: 1px solid #FE9900;
		border-radius: 5px;
		transition: transform 0.2s ease-in-out;
		cursor: pointer;
		height: 15rem;
	}

	.custom-card:hover {
		transform: scale(1.05);
		transition: transform 0.3s ease-in-out;
	}

	#grade7-card {
		background: url('') no-repeat center center;
		background-size: cover;
		opacity: 0.8;
		height: 15rem;
	}

	/* Style for Grade 8 Card */
	#grade8-card {
		background: url('grade8-background.jpg') no-repeat center center;
		background-size: cover;
		opacity: 0.8;
		height: 15rem;
	}

	/* Style for Grade 8 Card */
	#grade9-card {
		background: url('grade8-background.jpg') no-repeat center center;
		background-size: cover;
		opacity: 0.8;
		height: 15rem;
	}

	/* Style for Grade 8 Card */
	#grade10-card {
		background: url('grade8-background.jpg') no-repeat center center;
		background-size: cover;
		opacity: 0.8;
		height: 15rem;
	}

	/* Style for the logo */
	.card-logo {
		position: absolute;
		top: 10px;
		right: 10px;
		width: 50px;
	}

	/* Style for card content */
	.card-content {
		padding: 20px;
		color: white;
	}

	ul {
		list-style-type: square;
		color: black;
	}

	/* HOME PAGE */

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
<!-- Home -->

<i id="scrollTop" class="fa fa-arrow-up fa-3x" style="color: black;"></i>


<div class="home">
	<div class="home_background parallax_background parallax-window" data-parallax="scroll"
		data-image-src="assets/images/pic9.jpg" data-speed="0.8"></div>
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

<!-- Courses -->

<div class="container mt-5">
	<div class="row">
		<div class="col" id="sup_container">
			<h2 class="text-center" id="jhs" style="color: maroon;">Junior High School</h2>

			<div class="row mt-5" id="cat_container"></div>
			<div class="row mt-3 " id="container_2"></div>
		</div>
	</div>
	<div class="container">
		<hr>
	</div>
	<div class="row">
		<div class="col">
			<h2 class="text-center mt-5" id="jhs" style="color: maroon;">Senior High School</h2>

			<div class="row mt-5" id="cat_container2"></div>
			<div class="row mt-3 " id="container_3"></div>
		</div>
	</div>
</div>

<br>

<div class="container mt-5">
	<h1 style="color: maroon;">School Policies</h1>
	<div class="row mt-5">
		<div class="col">
			<h3>General Conduct</h3>
			<ul>
				<li>Respect: Treat all members of the school community with respect and courtesy.</li>
				<li>Bullying: Bullying in any form is strictly prohibited. Report any incidents to a teacher, counselor,
					or school administrator.</li>
				<li>Attendance: Regular attendance is mandatory. Notify the school in advance of any planned absences or
					provide a valid excuse for an unplanned absence.</li>
				<li>Punctuality: Be on time for all classes, exams, and school events.</li>
			</ul>
		</div>
		<div class="col">
			<h3>Academic Integrity</h3>
			<ul>
				<li>Plagiarism: Submit only original work. Plagiarism, cheating, and academic dishonesty will not be
					tolerated.</li>
				<li>Homework and Assignments: Complete all assignments on time. Late submissions may incur penalties.
				</li>
				<li>Exams: Follow the guidelines provided during exams. Any form of cheating will result in
					consequences.</li>
			</ul>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h3>Dress Code</h3>
			<ul>
				<li>Students are expected to adhere to the school's dress code policy. Dress modestly and appropriately
					for an educational environment.</li>
			</ul>
		</div>
		<div class="col">
			<h3>Technology Usage</h3>
			<ul>
				<li>Use of electronic devices is allowed only during designated times. Follow classroom and school
					guidelines for device usage.</li>
			</ul>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h3>Extracurricular Activities</h3>
			<ul>
				<li>Participate in school-sponsored activities responsibly and with good sportsmanship.</li>
				<li>Adhere to the specific rules and guidelines established for each extracurricular activity.</li>
			</ul>
		</div>
		<div class="col">
			<h3>Health and Safety</h3>
			<ul>
				<li>Follow safety guidelines provided by the school, including fire drills and emergency procedures.
				</li>
				<li>Report any health concerns promptly to the school nurse.</li>
			</ul>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h3>Code of Ethics</h3>
			<ul>
				<li>Uphold the highest standards of honesty, integrity, and ethical behavior.</li>
			</ul>
		</div>
		<div class="col">
			<h3>Parental Involvement</h3>
			<ul>
				<li>Encourage parents/guardians to actively participate in school activities and maintain open
					communication with teachers and school administrators.</li>
			</ul>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h3>Disciplinary Actions</h3>
			<ul>
				<li>Consequences for violations of these policies may include warnings, parent conferences, detention,
					suspension, or other appropriate measures.</li>
			</ul>
		</div>
		<div class="col">
			<h3>Reporting Concerns</h3>
			<ul>
				<li>Students are encouraged to report any concerns about safety, well-being, or potential policy
					violations to a teacher, counselor, or school administrator.</li>
			</ul>
		</div>
	</div>
</div>

<br><br>

<script>
	jQuery(document).ready(function ($) {


		var cat_ids = {};
		var details_ids = {};

		$.get({
			url: "admin/departments/departmentsCrud.php",
			data: { getDistincDepart: "getDistincDepart" },
			success: function (data) {
				let newData = JSON.parse(data);

				newData.forEach((dep, i) => {

					let cat_container = $("#cat_container ");
					let cat_container2 = $("#cat_container2 ");

					let sup_container = $("#sup_container ");
					let container_2 = $("#container_2 ");
					let container_3 = $("#container_3 ");




					var dep_id = dep.department_id;

					$.get({
						url: "admin/advisory/advisoryCrud.php",
						data: { getDataDep: "getDataDep", strand_department_id: dep_id },
						success: function (data) {
							let newData = JSON.parse(data);

							newData.forEach((distinct_strand, i) => {

								var grade = distinct_strand.strand_name.toLowerCase().replace(/\s+/g, '') + "-card";
								var grades = distinct_strand.strand_name;
								var dep_id = distinct_strand.strand_department_id;
								if (dep_id == 2) {
									cat_container.append(
										'<div class="col-md-3 mb-4">' +
										// '<h3>' + dep.dep_name + '</h3>' +

										'<div class="card custom-card  cat-card" id=' + grade + ' >' +
										'<img src="assets/images/rcnhslogonew.png" alt="Logo" class="card-logo">' +
										'<div class="card-body card-content mt-5">' +
										'<h3 class="card-title" style="color: maroon;">' + distinct_strand.strand_name + '</h3>' +
										'<p class="card-text" style="color: #000;">See more</p>' +
										'<input type="hidden" value="' + grades + '">' +
										'</div >' +
										'</div >' +
										'</div >'
									);
								} else if (dep_id == 1) {
									cat_container2.append(
										'<div class="col-md-4 mb-4">' +
										// '<h3>' + dep.dep_name + '</h3>' +

										'<div class="card custom-card  cat-card" id=' + grade + ' >' +
										'<img src="assets/images/rcnhslogonew.png" alt="Logo" class="card-logo">' +
										'<div class="card-body card-content mt-5">' +
										'<h3 class="card-title" style="color: maroon;">' + distinct_strand.strand_name + '</h3>' +
										'<p class="card-text" style="color: #000;">See more</p>' +
										'<input type="hidden" value="' + grades + '">' +
										'</div >' +
										'</div >' +
										'</div >'
									);
								}



								$taes = distinct_strand.strand_id;

								$('#' + grade).click(function () {
									var clickedGrade = $('#' + grade + ' input[type="hidden"]').val();


									$.get({
										url: "admin/advisory/advisoryCrud.php",
										data: { getDataDepUlit: "getDataDepUlit", strand_department_id: $taes, grade_level: clickedGrade },
										success: function (data) {
											let newData = JSON.parse(data);
											container_2.empty();
											container_3.empty();
											newData.forEach((advisor, i) => {
												var dep_id2 = advisor.strand_department_id;

												if (dep_id2 == 2) {
													$('html, body').animate({
														scrollTop: $('#container_2').offset().top
													}, 1000);
													container_2.append(

														'<div class="col-md-3 mb-3">' +
														'<div class="card custom-card" style="border-color: maroon;">' +

														'<h3 class="card-title mt-5 text-center">Section: <span style="font-size: 20px;">' + advisor.section_name + '</span></h3>' +
														'<p class="card-text text-center" style="font-size: 14px;"><span style="font-weight: 600;">Advisory Teacher:</span> ' + advisor.teacher_fname + ' ' + advisor.teacher_mname + ' ' + advisor.teacher_lname + '</p>' +
														'</div>' +

														'</div>'
													);
												} else if (dep_id2 == 1) {
													$('html, body').animate({
														scrollTop: $('#container_3').offset().top
													}, 1000);
													container_3.append(

														'<div class="col-md-3 mb-3">' +
														'<div class="card custom-card" style="border-color: maroon;">' +

														'<h3 class="card-title mt-5 text-center">Section: <span style="font-size: 20px;">' + advisor.section_name + ' </span></h3>' +
														'<p class="card-text text-center" style="font-size: 14px;"><span style="font-weight: 600;">Advisory Teacher:</span>' + advisor.teacher_fname + ' ' + advisor.teacher_mname + ' ' + advisor.teacher_lname + '</p>' +
														'</div>' +

														'</div>'
													);
												}

											});
										}
									});
								});
							});
						},
					});
				});
			},
		});
	});

</script>
<script>
	$(document).ready(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#scrollTop').fadeIn();
			} else {
				$('#scrollTop').fadeOut();
			}
		});

		$('#scrollTop').click(function () {
			$('html, body').animate({ scrollTop: 0 }, 800);
			return false;
		});
	});
</script>
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
<?php include("layoutsWebsite/footer.php"); ?>
<!-- <script src="js/departments/index.js"></script> -->