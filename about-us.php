<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>
<style>
  .team-boxed {
    color: #313437;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  .team-boxed p {
    color: #7d8285;
  }

  .team-boxed h2 {
    font-weight: bold;
    margin-bottom: 40px;
    padding-top: 40px;
    color: inherit;
  }

  @media (max-width:767px) {
    .team-boxed h2 {
      margin-bottom: 25px;
      padding-top: 25px;
      font-size: 24px;
    }
  }

  .team-boxed .intro {
    font-size: 16px;
    max-width: 500px;
    margin: 0 auto;
  }

  .team-boxed .intro p {
    margin-bottom: 0;
  }

  .team-boxed .people {
    padding: 50px 0;
  }

  .team-boxed .item {
    text-align: center;

  }

  .team-boxed .item .box {
    text-align: center;
    padding: 30px;
    background-color: #fff;
    margin-bottom: 30px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  .team-boxed .item .name {
    font-weight: bold;
    margin-top: 28px;
    margin-bottom: 8px;
    color: inherit;
  }

  .team-boxed .item .title {
    text-transform: uppercase;
    font-weight: bold;
    color: #d0d0d0;
    letter-spacing: 2px;
    font-size: 13px;

  }

  .team-boxed .item .description {
    font-size: 15px;
    margin-top: 15px;
    margin-bottom: 20px;
  }

  .team-boxed .item img {
    max-width: 160px;
  }

  .team-boxed .social {
    font-size: 18px;
    color: #a2a8ae;
  }

  .team-boxed .social a {
    color: inherit;
    margin: 0 10px;
    display: inline-block;
    opacity: 0.7;
  }

  .team-boxed .social a:hover {
    opacity: 1;
  }

  /* About */

  .main-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  .image-container {
    flex: 1;
    padding: 20px;
  }

  .text-container {
    flex: 1;
    padding: 20px;
    text-align: justify;
  }

  .bottom-text {
    text-align: justify;
  }

  @media (max-width: 768px) {
    .main-container {
      flex-direction: column;
    }

    .text-container,
    .image-container {
      flex: auto;
    }
  }

  @media (max-width: 767px) {
    .faq-container {
      padding: 10px;
    }
  }

  /* HISTORY */
  .history-image {
    width: 100%;
    height: 30rem;
  }

  .history-text {
    padding: 20px;
  }

  /* PAST PRINCIPAL */
  .divider {
    position: relative;
    padding-right: 20px;
  }

  .divider:before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    width: 2px;
    background: linear-gradient(to bottom, maroon, maroon);
  }

  .principal {
    padding: 20px;
  }

  .date {
    color: #FE9900;
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
  <div class="home_background parallax_background parallax-window" style="" data-parallax="scroll"
    data-image-src="assets/images/RIOSTAFF.jpg" data-speed="0.8"></div>
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


<br><br><br>
<!-- About School -->

<div class="container">
  <div class="container" id="aboutschool">
    <h1 style="color: maroon; text-decoration: underline;">About our School</h1>
  </div>
  <div class="main-container">
    <div class="image-container">
      <img src="assets/images/pic2.JPG" alt="Image" class="img-fluid" style="height: 25rem;">
    </div>
    <div class="text-container">
      <p style="color: black; font-size: 15px;">Rio Chico National High School is a public
        secondary school
        located in General Tinio, a
        municipality in the province of Nueva Ecija, Philippines. The school was established in 1971 as Rio Chico
        Barangay High School to provide secondary education to the students in the area.
        In 1991, the school was elevated to a national high school and was renamed Rio Chico National High School. It
        has since then undergone several changes and improvements in terms of facilities and academic offerings.
        In 2013, the school implemented the K-12 curriculum, which aimed to enhance the quality of education and better
        prepare students for higher education and employment. The school offers academic and technical-vocational
        tracks, including courses in entrepreneurship, information and communications technology (ICT), and agriculture.
      </p>
    </div>
  </div>
  <div class="container">
    <p class="bottom-text" style="color: black; font-size: 15px;">Rio Chico National High
      School also
      promotes extracurricular activities
      to enhance the students
      skills and talents. The school has different clubs and organizations, including the Boy Scouts of the Philippines,
      Girl Scouts of the Philippines, and Math Club, among others. The school also has its own drum and lyre corps and
      majorette group.
      Over the years, Rio Chico National High School has produced numerous graduates who have excelled in various
      fields, including academics, sports, and the arts. The school continues to provide quality education and
      opportunities for the youth in General Tinio and the surrounding communities.</p>
  </div>
</div>

<!-- HISTORY -->
<div class="container mt-5">
  <div class="row">
    <h1 class="ml-2" style="color: maroon;">Our History</h1>

    <img src="assets/images/old.jpg" alt="History Image" class="img-fluid history-image">

    <div class="history-text">
      <p style="color: black;">The parents and community of Barangay Rio Chico have a great role in the acquisition and
        materialization of
        Rio Chico National High School, formerly known as Rio Chico Barangay High School (RCBHS) which was established
        in February 1973.</p>
      <p style="color: black;">During that year, under the term of Mayor Nicanor B. Abes as Municipal Mayor of General
        Tinio, Nueva Ecija,
        RCBHS which had no owned site then, sharela space in the compound of Rio Chico Elementary School under the
        administration of Mr. Leonardo D. Razon as the Assistant Principal of then Principal Sabina Mangulabnan of
        Mother High School (Gen. Tinio National High School).</p>
      <p style="color: black;">Through the dynamic representation of the Barangay Council and the Municipal Officials,
        the Batas Pambansa
        No. 631-An act converting Barangay High Schools into Newly Nationalized High Schools which was approved by
        President Ferdinand E. Marcos on June 24, 1983 has been implemented to this school to become independently
        separated from Gen. Tinio National High School as a Mother High School of the two (2) Barangay High Schools in
        the Municipality of Gen. Tinio, Nueva Ecija namely: Bago High School and Rio Chico High School.</p>
      <p style="color: black;">When Mr. Leonardo D. Razon and his family migrated to USA on July, 1989, the tasks and
        responsibilities of
        managing and supervising the school were entrusted to Mr. Antonio D. Gante, Teacher I, who was promoted to Head
        Teacher III and designated as Officer-in-charge of the school during the period.</p>
      <p style="color: black;">Due to the rapid enrolment every year, a site of its own had been a burning obsession of
        the people living in
        the barangay particularly the teachers and students who were dreaming of conducive rooms and wide surroundings
        which serves as an important vehicles for the teaching-learning process.</p>
      <p style="color: black;">Mr. Gante, as an OIC, was also eager to acquire a lot not only to accommodate the
        increasing demand of school's
        population but more so to the recipient of Secondary Education Development Program (SEDP) building package which
        might be awarded by the Department of Education to those school with own lot.</p>
      <p style="color: black;">Since the school has no sufficient fund to purchase a lot, Mr. Gante as well as the
        teachers, barangay
        officials, and students' parents came into a dialogue to have beauty and money contest in which proceeds would
        be used for the acquisition of new school site.</p>
      <p style="color: black;">The long cherish dream of RCHS patronage came into a reality. Through the concerted
        effort of former Mayor
        Placido Calma together with the barangay officials, PTA and the OIC, a one (1) hectare of farmland, an
        approximately 300 meters away from RCES location, was acquired. This parcel of land which was originally owned
        by ex-mayor Manuel Domingo was sold in reasonable price. Hence, the SEDP package was also granted to this
        school.
      </p>
      <p style="color: black;">On July 18, 1991, the historic march of the teachers, students and parents together with
        other stakeholders in
        the community triumphantly happened during the inauguration of SEDP building. Finally, the school had its own
        ground and rooms to house and cater the raising school's population and continue to produce morally upright and
        prepared individuals.</p>
      <p style="color: black;">Numerous principals and head teachers were assigned to manage and supervise this school.
        Their corresponding
        school years of administrations are as follows:</p>
    </div>
  </div>
</div>

<br>

<!-- PAST PRINCIPAL -->
<div class="container mt-5">
  <h1 style="color: maroon">Past Principal</h1>
</div>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 divider">
      <div class="principal">
        <h3>Name: Leonardo D. Razon</h3>
        <p style="color: black;">Year: <span class="date">1972-1984</span></p>
        <p style="color: black;">Position: Assistant Principal</p>
      </div>
      <div class="principal">
        <h3>Name: Agueda Razon</h3>
        <p style="color: black;">Year: <span class="date">1984-1989</span></p>
        <p style="color: black;">Position: Head Teacher (OIC)</p>
      </div>
      <div class="principal">
        <h3>Name: Antonio D. Gante</h3>
        <p style="color: black;">Year: <span class="date">1989-1997</span></p>
        <p style="color: black;">Position: Principal I</p>
      </div>
      <div class="principal">
        <h3>Name: Windsor Flores</h3>
        <p style="color: black;">Year: <span class="date">1997-1998</span></p>
        <p style="color: black;">Position: Head Teacher III (OIC)</p>
      </div>
      <div class="principal">
        <h3>Name: Rogelio C. Dela Cruz</h3>
        <p style="color: black;">Year: <span class="date">1998-2002</span></p>
        <p style="color: black;">Position: Principal I</p>
      </div>
      <div class="principal">
        <h3>Name: Josephine S. Martinez</h3>
        <p style="color: black;">Year: <span class="date">2002-2010</span></p>
        <p style="color: black;">Position: Principal II</p>
      </div>
      <div class="principal">
        <h3>Name: Lorenzo P. Joaquin</h3>
        <p style="color: black;">Year: <span class="date">2010-2012</span></p>
        <p style="color: black;">Position: Principal II</p>
      </div>
      <div class="principal">
        <h3>Name: Julieta C. Pajarillaga</h3>
        <p style="color: black;">Year: <span class="date">2012-2014</span></p>
        <p style="color: black;">Position: Principal II</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="principal">
        <h3>Name: Noelito C. Noe</h3>
        <p style="color: black;">Year: <span class="date">2014-2015</span></p>
        <p style="color: black;">Position: Principal II</p>
      </div>
      <div class="principal">
        <h3>Name: Pablito Manalong</h3>
        <p style="color: black;">Year: <span class="date">2015-2016</span></p>
        <p style="color: black;">Position: Principal II</p>
      </div>
      <div class="principal">
        <h3>Name: Editha P. Mendoza</h3>
        <p style="color: black;">Year: <span class="date">2016-2017</span></p>
        <p style="color: black;">Position: Principal III</p>
      </div>
      <div class="principal">
        <h3>Name: Jovito J. Doque</h3>
        <p style="color: black;">Year: <span class="date">2017-2018</span></p>
        <p style="color: black;">Position: Principal III</p>
      </div>
      <div class="principal">
        <h3>Name: Vivian P. Maducdoc Ph. D.</h3>
        <p style="color: black;">Year: <span class="date">2018-2020</span></p>
        <p style="color: black;">Position: Principal III</p>
      </div>
      <div class="principal">
        <h3>Name: Sergio B. Gonzales</h3>
        <p style="color: black;">Year: <span class="date">2020-2021</span></p>
        <p style="color: black;">Position: Principal III</p>
      </div>
      <div class="principal">
        <h3>Name: Carlos G. Corpuz Ph. D.</h3>
        <p style="color: black;">Year: <span class="date">2021-Present</span></p>
        <p style="color: black;">Position: Principal III</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <hr>
</div>
<br>


<!-- MISSION VISION -->

<div class="team-boxed">
  <div class="container">

    <div class="row people">
      <div class="col-md-6 col-lg-4 item">
        <div class="box" style="background-color: #FE9900; border-radius: 10px;"><img class="rounded-circle"
            src="assets/images/depedlogo.png">
          <h3 class="name" style="color: maroon;">MISSION</h3>
          <p class="description" id="mission_text" style="color: #000;"> </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 item">
        <div class="box" style="background-color: #FE9900; border-radius: 10px;"><img class="rounded-circle"
            src="assets/images/depedlogo.png">
          <h3 class="name" style="color: maroon;">VISION</h3>
          <p class="description" id="vission_text" style="height: 483px; color: #000;"></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 item">
        <div class="box" style="background-color: #FE9900; border-radius: 10px;"><img class="rounded-circle"
            src="assets/images/depedlogo.png">
          <h3 class="name" style="color: maroon;">CORE VALUES</h3>
          <p class="description" id="goal_text" style="height: 483px; color: #000;"></p>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Teachers -->

<div class="teachers mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="teachers_title" style="color: maroon;">Meet the Teachers</h1>
      </div>
    </div>
    <h2 class="text-center mt-5" style="color: black;">PRINCIPAL</h2>
    <div class="row teachers_row text-center" id="principals" loading="lazy" style="color: black;">
    </div>
    <h2 class="text-center mt-5" style="color: black;">HEAD TEACHER</h2>
    <div class="row teachers_row text-center" id="headteachers" loading="lazy" style="color: black;">
    </div>
    <h2 class="text-center mt-5 p-5" style="color: black;">MASTER TEACHERS</h2>
    <div class="row teachers_row text-center" id="masterteachers" loading="lazy" style="color: black;">
    </div>
    <h2 class="text-center mt-5 p-5" style="color: black;">TEACHERS</h2>
    <div class="row teachers_row text-center" id="teachers" loading="lazy" style="color: black;">
    </div>
    <!-- <h2 class="text-center mt-5 p-5" style="color: black;">SCHOOL STAFFS</h2>
    <div class="row teachers_row text-center" id="staff" loading="lazy" style="color: black;">
    </div> -->
  </div>
</div>

<div class="container">
  <hr>
</div>

<br><br>

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

<?php include("layoutsWebsite/footer.php"); ?>
<script src="js/abouts/index.js"></script>
<script src="js/teachers/index.js"></script>
<script>
  /* To Disable Inspect Element */
  // $(document).bind("contextmenu", function (e) {
  //   e.preventDefault();
  // });

  // $(document).keydown(function (e) {
  //   if (e.which === 123) {
  //     return false;
  //   }
  // });
  // document.onkeydown = (e) => {

  //   if (e.key == 123) {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.shiftKey && e.key == 'I') {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.shiftKey && e.key == 'C') {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.shiftKey && e.key == 'j') {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.key == 'U') {

  //     e.preventDefault();
  //   }
  // };
</script>