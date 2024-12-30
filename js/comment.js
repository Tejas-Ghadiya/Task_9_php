$(document).ready(function () {
  $("#commentForm").submit(function (e) {
    e.preventDefault(); // Prevent default form submission

    var bid = $("input[name='bid']").val(); // Get the blog ID from hidden input
    var email = $("input[name='email']").val(); // Get the email from hidden input
    var title = $("input[name='title']").val();
    var name = $("input[name='name']").val();
    var message = $("textarea[name='message']").val(); // Get the message from textarea

    // Simple validation
    if (!email || !message) {
      alert("Please fill out both fields.");
      return;
    }

    $.ajax({
      type: "POST",
      url: "ajax/message.php",
      data: {
        bid: bid,
        email: email,
        title: title,
        name: name,
        message: message,
      },
      success: function (response) {
        alert("Message sent successfully!");
        // Optionally, append the new comment to the comments section
        $(".comments-container").append(`
                    <div class="data">
                        <p class="email">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                </svg>
                            </span>
                            ${email}
                        </p>
                        <p class="comment">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            ${message}
                        </p>
                    </div>
                `);
        // Clear the input fields
        $("textarea[name='message']").val("");
      },
      error: function (xhr, status, error) {
        alert("An error occurred: " + error);
      },
    });
  });
});
