function lms_education_courses_open_tab(evt, cityName) {
    var lms_education_courses_i, lms_education_courses_tabcontent, lms_education_courses_tablinks;
    lms_education_courses_tabcontent = document.getElementsByClassName("tabcontent");
    for (lms_education_courses_i = 0; lms_education_courses_i < lms_education_courses_tabcontent.length; lms_education_courses_i++) {
        lms_education_courses_tabcontent[lms_education_courses_i].style.display = "none";
    }
    lms_education_courses_tablinks = document.getElementsByClassName("tablinks");
    for (lms_education_courses_i = 0; lms_education_courses_i < lms_education_courses_tablinks.length; lms_education_courses_i++) {
        lms_education_courses_tablinks[lms_education_courses_i].className = lms_education_courses_tablinks[lms_education_courses_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});