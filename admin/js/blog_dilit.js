$(document).ready(function () {
  $(".delete").click(function (e) {
    e.preventDefault();
    var form = $(this).closest("form");
    var bid = form.find('input[name="b_id"]').val();
    var row = $(this).closest("tr"); // Store reference to the row for removal

    $.ajax({
      type: "POST",
      url: "remove_blog.php",
      data: {
        bid: bid,
      },
      success: function (data) {
        // Remove the row from the table
        row.remove();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error deleting the post:", textStatus, errorThrown);
      },
    });
  });
});
