$(document).ready(function () {
  // Show writer info modal
  $(".p").click(function () {
    var totalBlog = $(this).data("total");
    var name = $(this).data("name");
    var image = $(this).data("image");
    // Set data to modal
    $("#writer-name").text(name);
    $("#writer-total").text(totalBlog);
    $("#writer-image").attr("src", image);
    // Show modal
    $("#writerInfoModal").modal("show");
  });

  // Handle adding a like
  $(".add").click(function (e) {
    e.preventDefault();
    var form = $(this).closest("form");
    var uid = form.find('input[name="uid"]').val();
    var bid = form.find('input[name="bid"]').val();
    var title = form.find('input[name="title"]').val();
    var user = form.find('input[name="user"]').val();
    var likeContainer = $(this).closest(".like"); // Target the specific .like container

    $.ajax({
      type: "POST",
      url: "ajax/like.php",
      data: {
        uid: uid,
        bid: bid,
        title: title,
        user: user,
      },
      success: function (data) {
        // Reload only the specific .like container
        likeContainer.load(location.reload(".add"));
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error liking the post:", textStatus, errorThrown);
      },
    });
  });

  // Handle removing a like
  $(".rimove").click(function (e) {
    e.preventDefault();
    var form = $(this).closest("form");
    var id = form.find('input[name="id"]').val();
    var bid = form.find('input[name="bid"]').val();
    var likeContainer = $(this).closest(".like"); // Target the specific .like container

    $.ajax({
      type: "POST",
      url: "ajax/dlike.php",
      data: {
        id: id,
      },
      success: function (data) {
        // Reload only the specific .like container
        likeContainer.load(location.reload(".remove"));
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error disliking the post:", textStatus, errorThrown);
      },
    });
  });
});
