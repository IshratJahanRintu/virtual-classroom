$(document).ready(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  $("#editTeacherModal").on("show.bs.modal", function (e) {
    //get data-id attribute of the clicked element
    let userid = $(e.relatedTarget).data("userid");
    let name = $(e.relatedTarget).data("name");
    let designation = $(e.relatedTarget).data("designation");
    let phone = $(e.relatedTarget).data("phone");

    //populate the textbox
    $(e.currentTarget).find('input[name="user_id"]').val(userid);
    $(e.currentTarget).find('input[name="name"]').val(name);
    $(e.currentTarget).find('input[name="phone"]').val(phone);
    $(e.currentTarget).find('input[name="designation"]').val(designation);
  });

  $("#deleteTeacherModal").on("show.bs.modal", function (e) {
    let userid = $(e.relatedTarget).data("userid");
    $(e.currentTarget).find('input[name="user_id"]').val(userid);
  });
});
