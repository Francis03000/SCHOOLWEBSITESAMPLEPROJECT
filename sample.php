<div class="container b-5">
  <div class="dropdown float-left">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="yearDropdown" data-toggle="dropdown">
      Select Year
    </button>
    <div class="dropdown-menu" aria-labelledby="yearDropdown">
      <a class="dropdown-item" href="#">2023</a>
      <a class="dropdown-item" href="#">2022</a>
      <a class="dropdown-item" href="#">2021</a>
    </div>
  </div>
</div>


<div class="container mt-5">
  <div class="row">
    <!-- Education Card -->
    <div class="col-md-4 mb-4" id="education_gal">
      <div class="card custom-card" id="education-card">
        <div class="card-body card-content mt-5">
          <h3 class="card-title" style="color: black;">EDUCATION</h3>
          <p class="card-text" style="color: black;">Click to See more Image.</p>
        </div>
      </div>
    </div>

    <!-- Sports Card -->
    <div class="col-md-4 mb-4" id="sports_gal">
      <div class="card custom-card" id="sports-card">
        <div class="card-body card-content mt-5">
          <h3 class="card-title" style="color: white;">SPORTS</h3>
          <p class="card-text" style="color: white;">Click to See more Image.</p>
        </div>
      </div>
    </div>

    <!-- Activity Card -->
    <div class="col-md-4 mb-4" id="education_gal">
      <div class="card custom-card" id="activity-card">
        <div class="card-body card-content mt-5">
          <h3 class="card-title" style="color: black;">ACTIVITY</h3>
          <p class="card-text" style="color: black;">Click to See more Image.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- EDUCATION IMAGES -->
  <div class="row mt-3 hidden" id="education-details">
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic11.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic12.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic13.jpg'); background-size: cover;">
      </div>
    </div>
  </div>

  <!-- SPORTS IMAGES -->
  <div class="row mt-3 hidden" id="sports-details">
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic11.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic12.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic13.jpg'); background-size: cover;">
      </div>
    </div>
  </div>

  <!-- ACTIVITY IMAGES -->
  <div class="row mt-3 hidden" id="activity-details">
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic10.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic11.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic12.jpg'); background-size: cover;">
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card custom-card" style="background-image: url('assets/images/pic13.jpg'); background-size: cover;">
      </div>
    </div>
  </div>
</div>

<script>
  const educationCard = document.getElementById("education-card");
  const sportsCard = document.getElementById("sports-card");
  const activityCard = document.getElementById("activity-card");

  const educationDetails = document.getElementById("education-details");
  const sportsDetails = document.getElementById("sports-details");
  const activityDetails = document.getElementById("activity-details");

  educationCard.addEventListener("click", () => {
    if (educationDetails.classList.contains("hidden")) {
      educationDetails.classList.remove("hidden");
      sportsDetails.classList.add("hidden");
      sportsCard.classList.add("hidden");
      activityDetails.classList.add("hidden");
      activityCard.classList.add("hidden");
    } else {
      educationDetails.classList.add("hidden");
      sportsCard.classList.remove("hidden");
      activityCard.classList.remove("hidden");
    }
  });

  sportsCard.addEventListener("click", () => {
    if (sportsDetails.classList.contains("hidden")) {
      sportsDetails.classList.remove("hidden");
      educationDetails.classList.add("hidden");
      educationCard.classList.add("hidden");
      activityDetails.classList.add("hidden");
      activityCard.classList.add("hidden");
    } else {
      sportsDetails.classList.add("hidden");
      educationCard.classList.remove("hidden");
      activityCard.classList.remove("hidden");
    }
  });

  activityCard.addEventListener("click", () => {
    if (activityDetails.classList.contains("hidden")) {
      activityDetails.classList.remove("hidden");
      educationDetails.classList.add("hidden");
      educationCard.classList.add("hidden");
      sportsDetails.classList.add("hidden");
      sportsCard.classList.add("hidden");
    } else {
      activityDetails.classList.add("hidden");
      educationCard.classList.remove("hidden");
      sportsCard.classList.remove("hidden");
    }
  });


  $("#education_gal").click(function () {

    // alert("education");
  });
  $("#sports_gal").click(function () {

    // alert("sports_gal");
  });
  $("#activity_gal").click(function () {

    // alert("activity_gal");
  });

</script>

<br><br><br>

<?php include("layoutsWebsite/footer.php"); ?>