<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade 7 and 8 Cards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style id="custom-styles">
        /* Add custom CSS styles here */
        .hidden {
            display: none;
        }

        .custom-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: transform 0.2s ease-in-out;
            cursor: pointer;
            height: 15rem;
        }

        .custom-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        .cat-card {
            background: url('assets/images/gallery/education.jpg') no-repeat center center;
            background-size: cover;
            opacity: 0.8;
            height: 15rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5" id="sup_container">

        <div class="row" id="cat_container">

        </div>

        <div class="row mt-3 " id="container_2">
        </div>





    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
                        let sup_container = $("#sup_container ");
                        let container_2 = $("#container_2 ");



                        // sup_container.append(
                        //     '<div>' +
                        //     '<h3>' + dep.dep_name + '</h3>' +
                        //     '</div>'

                        // );

                        var dep_id = dep.department_id;

                        $.get({
                            url: "admin/advisory/advisoryCrud.php",
                            data: { getDataDep: "getDataDep", strand_department_id: dep_id },
                            success: function (data) {
                                let newData = JSON.parse(data);

                                newData.forEach((distinct_strand, i) => {

                                    var grade = distinct_strand.strand_name.toLowerCase().replace(/\s+/g, '') + "-card";
                                    var grades = distinct_strand.strand_name;


                                    cat_container.append(
                                        '<div class="col-md-4 mb-4">' +
                                        // '<h3>' + dep.dep_name + '</h3>' +

                                        '<div class="card custom-card  cat-card" id=' + grade + ' >' +
                                        '<div class="card-body card-content mt-5">' +
                                        '<h3 class="card-title" style="color: black;">' + distinct_strand.strand_name + '</h3>' +
                                        // '<p class="card-text" style="color: black;">Click to See more.</p>' +
                                        '<input type="hidden" value="' + grades + '">' +
                                        '</div >' +
                                        '</div >' +
                                        '</div >'
                                    );
                                    $('.custom-card').on('click', function () {
                                        // Hide all buttons except the clicked one
                                        $('.custom-card').not(this).hide();
                                    });



                                    $taes = distinct_strand.strand_id;




                                    $('#' + grade).click(function () {
                                        var clickedGrade = $('#' + grade + ' input[type="hidden"]').val();


                                        $.get({
                                            url: "admin/advisory/advisoryCrud.php",
                                            data: { getDataDepUlit: "getDataDepUlit", strand_department_id: $taes, grade_level: clickedGrade },
                                            success: function (data) {
                                                let newData = JSON.parse(data);
                                                container_2.empty();
                                                newData.forEach((advisor, i) => {
                                                    container_2.append(



                                                        '<div class="col-md-3 mb-4">' +
                                                        '<div class="card custom-card" style="background-image: url(\'assets/images/gallery/education.jpg\'); background-size: cover;">' +

                                                        '<h5 class="card-title">' + advisor.section_name + '</h5>' +
                                                        '<p class="card-text">' + advisor.teacher_fname + '</p>' +
                                                        '</div>' +

                                                        '</div>'





                                                    );



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




            // var greyd = ""

            // $.get({
            //     url: "admin/departments/departmentsCrud.php",
            //     data: { getDistincDepart: "getDistincDepart" },
            //     success: function (data) {
            //         let newData = JSON.parse(data);

            //         newData.forEach((distinct_dep, i) => {
            //             let container = $("#container");
            //             let row = $("<div>", {
            //                 class: "row",
            //             }).appendTo(container);

            //             let row1 = $("<div>", {
            //                 class: "row mt-3 ",
            //                 id: "grade7-details",
            //             }).appendTo(container);


            //             var dep_id = distinct_dep.department_id;




            //             $.get({
            //                 url: "admin/advisory/advisoryCrud.php",
            //                 data: { getDataDep: "getDataDep", strand_department_id: dep_id },
            //                 success: function (data) {
            //                     let newData = JSON.parse(data);

            //                     newData.forEach((distinct_strand, i) => {
            //                         var grade = distinct_strand.strand_name.toLowerCase().replace(/\s+/g, '');
            //                         greyd = distinct_strand.strand_name.toLowerCase().replace(/\s+/g, '');



            //                         row.append(
            //                             '<div class="col-md-3 mb-4">' +
            //                             '<div class="card custom-card w-100 h-100 strand-card" value=' + distinct_strand.strand_id + '" id="' + grade + '">' +
            //                             '<img src="" alt="Logo" class="card-logo">' +
            //                             '<div class="card-body card-content">' +
            //                             '<h5 class="card-title">' +
            //                             distinct_strand.strand_name +
            //                             '</h5>' +
            //                             '<p class="card-text">' + "Click to reveal more details" + '</p>' +
            //                             '</div>' +
            //                             '</div>' +
            //                             '</div>'
            //                         );

            //                         var cssText = '#' + grade + ' { ' +
            //                             'background: url("assets/images/pic2.jpg") no-repeat center center; ' +
            //                             'background-size: cover; ' +
            //                             'opacity: 0.8; ' +
            //                             '}';

            //                         // Append the CSS rules to the existing style tag
            //                         $('#custom-styles').append(cssText);




            //                         $tae = distinct_strand.strand_id;



            //                         var grade7Details = $('#grade7-details');
            //                         var myDiv = $('#' + greyd);

            //                         $('#' + greyd).click(function () {
            //                             var value = myDiv.attr("value");

            //                             $('#grade7-details').empty();


            //                             // $('.strand-card').hide();


            //                             // alert("The value attribute is: " + value);

            //                             $.get({
            //                                 url: "admin/advisory/advisoryCrud.php",
            //                                 data: { getDataDepUlit: "getDataDepUlit", strand_department_id: value },
            //                                 success: function (data) {
            //                                     let newData = JSON.parse(data);


            //                                     newData.forEach((advisor, i) => {







            //                                         row1.append(
            //                                             '<div class="col-md-3 mb-4 ">' +
            //                                             '<div class="card custom-card">' +
            //                                             '<div class="card-body text-center">' +
            //                                             '<h5 class="card-title">' + advisor.section_name + '</h5>' +
            //                                             '<p class="card-text">' + advisor.teacher_fname + '</p>' +
            //                                             '</div >' +
            //                                             '</div >' +
            //                                             '</div >'
            //                                         );


            //                                     });
            //                                 },
            //                             });


            //                         });

            //                     });


            //                 }

            //             });





            //         });


            //     },

            // });

        });

    </script>

</body>

</html>