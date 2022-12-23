$(document).ready(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  $("#editCourseModal").on("show.bs.modal", function (e) {
    //get data-id attribute of the clicked element
    let courseid = $(e.relatedTarget).data("courseid");
    let title = $(e.relatedTarget).data("title");
    let teachername = $(e.relatedTarget).data("teachername");
    let semester = $(e.relatedTarget).data("semester");

    //populate the textbox
    $(e.currentTarget).find('input[name="course_id"]').val(courseid);
    $(e.currentTarget).find('input[name="course_title"]').val(title);
    $(e.currentTarget).find('input[name="teacher_name"]').val(teachername);
    $(e.currentTarget).find('input[name="semester"]').val(semester);
  });

  $("#deleteCourseModal").on("show.bs.modal", function (e) {
    let courseid = $(e.relatedTarget).data("courseid");
    $(e.currentTarget).find('input[name="course_id"]').val(courseid);
  });
});
