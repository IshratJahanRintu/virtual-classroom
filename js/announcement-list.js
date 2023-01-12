$(document).ready(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  $("#editNoticeModal").on("show.bs.modal", function (e) {
    //get data-id attribute of the clicked element
    let noticeid = $(e.relatedTarget).data("noticeid");
    let notice = $(e.relatedTarget).data("notice");

    //populate the textbox
    $(e.currentTarget).find('input[name="notice_id"]').val(noticeid);
    $(e.currentTarget).find('input[name="notice"]').val(notice);
  });

  $("#deleteNoticeModal").on("show.bs.modal", function (e) {
    let noticeid = $(e.relatedTarget).data("noticeid");
    $(e.currentTarget).find('input[name="notice_id"]').val(noticeid);
  });
});
