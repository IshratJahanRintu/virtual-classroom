$(document).ready(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  $("#playVideoModal").on("show.bs.modal", function (e) {
    //get data-id attribute of the clicked element
    let source = $(e.relatedTarget).data("source");

    document.getElementById("tutorial").src = source;
  });

  // $("#deleteStudentModal").on("show.bs.modal", function (e) {
  //   let userid = $(e.relatedTarget).data("userid");
  //   $(e.currentTarget).find('input[name="user_id"]').val(userid);
  // });
});
