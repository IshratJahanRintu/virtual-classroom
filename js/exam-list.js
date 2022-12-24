$(document).ready(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  $("#addExamModal").on("show.bs.modal", function (e) {
    //get data-id attribute of the clicked element
    let courseid = $(e.relatedTarget).data("courseid");

    //populate the textbox
    $(e.currentTarget).find('input[name="course_id"]').val(courseid);
  });

  //   $("#deleteStudentModal").on("show.bs.modal", function (e) {
  //     let userid = $(e.relatedTarget).data("userid");
  //     $(e.currentTarget).find('input[name="user_id"]').val(userid);
  //   });
});
