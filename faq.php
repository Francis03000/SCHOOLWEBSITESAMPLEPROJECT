<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>

<style>
    /* FAQ */
    .faq-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .faq-item {
        border-bottom: 1px solid #ccc;
        padding: 20px 0;
    }

    .faq-item:last-child {
        border-bottom: none;
    }

    .faq-question {
        font-weight: bold;
        cursor: pointer;
    }

    .faq-answer {
        display: none;
        padding-top: 10px;
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
                        <div class="home_title"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- FREQUENTLY ASK QUESTION -->

<div class="container mt-5">
    <h1 class="text-center" style="color: maroon;">FREQUENTLY ASK QUESTION</h1>
    <div class="faq-container text-dark">
        <div class="faq-item">
            <div class="faq-question" data-toggle="collapse" data-target="#faq1">
                Question: What is the enrollment process for Rio Chico National High School?
                <span class="arrow-down-icon pull-right">&#9660;</span>
            </div>
            <div id="faq1" class="faq-answer collapse">
                Answer: To enroll at Rio Chico National High School, you must visit the school's admissions office
                during the
                designated
                enrollment period. You will need to provide your latest report card, birth certificate, and other
                required
                documents. Additionally, there may be an entrance exam or interview as part of the admission process.
                It's
                advisable to check the school's website or contact the admissions office for specific enrollment dates
                and
                requirements.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" data-toggle="collapse" data-target="#faq2">
                Question: What extracurricular activities are available at Rio Chico National High School?
                <span class="arrow-down-icon pull-right">&#9660;</span>
            </div>
            <div id="faq2" class="faq-answer collapse">
                Answer: Rio Chico National High School offers a variety of extracurricular activities to enhance
                students'
                overall
                development. These may include sports teams, clubs, academic competitions, and cultural organizations.
                The
                specific activities may vary from year to year, so it's a good idea to check with the school
                administration or
                student council for the most up-to-date list of available extracurricular options.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" data-toggle="collapse" data-target="#faq3">
                Question: Is there a school uniform policy at Rio Chico National High School?
                <span class="arrow-down-icon pull-right">&#9660;</span>
            </div>
            <div id="faq3" class="faq-answer collapse">
                Answer: Yes, Rio Chico National High School has a school uniform policy that students are expected to
                adhere to.
                The school typically provides guidelines regarding the specific uniform requirements, including colors,
                styles,
                and where to purchase them. It's important for students and parents to familiarize themselves with the
                uniform
                policy and ensure compliance, as it helps promote a sense of belonging and unity within the school
                community.
            </div>
        </div>
    </div>
</div>
<br><br>

<?php include("layoutsWebsite/footer.php"); ?>
<script>
    // /* To Disable Inspect Element */
    // $(document).bind("contextmenu", function (e) {
    //     e.preventDefault();
    // });

    // $(document).keydown(function (e) {
    //     if (e.which === 123) {
    //         return false;
    //     }
    // });
    // document.onkeydown = (e) => {

    //     if (e.key == 123) {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.shiftKey && e.key == 'I') {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.shiftKey && e.key == 'C') {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.shiftKey && e.key == 'j') {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.key == 'U') {

    //         e.preventDefault();
    //     }
    // };
</script>