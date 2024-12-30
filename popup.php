<?PHP require('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Example</title>
    <!-- Add the jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Button to trigger popup -->
    <form method="post">
        <button type="submit" class="message" bid="1">Open Popup</button>
    </form>
    <!-- Popup structure -->
    <div id="myModal" class="modal">
        <div class="modal-content">

            <div class="conten">
                <?PHP
                $mess = $conn->query("SELECT * FROM `comment` WHERE b_id='1'");
                if ($mess->num_rows > 0) {
                    while ($row = $mess->fetch_assoc()) {
                        echo "<div class='data'>";
                        echo "<p>" . htmlspecialchars($row['email']) . "</p>";
                        echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No comments available.</p>"; // Message if no comments exist
                }
                ?>
            </div>
            <form method="post">
                <div>
                    <!-- Dynamically setting bid value in the input field -->
                    <input type="hidden" name="bid" id="bidInput" readonly>
                    <input type="hidden" name="email" value="tejas@gmail.com">
                    <textarea cols="45" name="message" placeholder="Message" required></textarea>
                </div>

                <div>
                    <button type="submit" class="send">Send</button>
                    <button type="button" class="close">Close</button>
                </div>
            </form>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
        var modal = $('#myModal'); // Get the modal
        var closeButton = $('.close'); // Get the close button
        var bidInput = $('#bidInput'); // Input field to set the bid value
        var bidDisplay = $('#bidDisplay'); // Span to display the bid value

        // When the button is clicked, show the modal and pass the bid value
        $(".message").click(function() {
            var bidValue = $(this).attr('bid'); // Get the bid attribute value
            bidInput.val(bidValue); // Set the bid value in the input field
            bidDisplay.text('Bid: ' + bidValue); // Also display the bid value in a span
            modal.show(); // Show the modal
        });

        // When the close button is clicked, hide the modal
        closeButton.click(function() {
            modal.hide();
        });

        // When clicking outside the modal content, close it
        $(window).click(function(event) {
            if (event.target.id === "myModal") {
                modal.hide();
            }
        });

        // Send button click event handler
        $(".send").click(function(e) {
            e.preventDefault(); // Prevent default form submission

            var form = $(this).closest("form");
            var bid = form.find('input[name="bid"]').val();
            var email = form.find('input[name="email"]').val();
            var message = form.find('textarea[name="message"]').val(); // Corrected to find the textarea

            // AJAX call to submit the form
            $.ajax({
                type: "POST",
                url: "ajax/message.php",
                data: {
                    bid: bid,
                    email: email,
                    message: message
                },
                success: function(response) {
                    // Handle the success response here (e.g., close the modal, show a message)
                    alert("Message sent successfully!");
                    modal.hide(); // Hide the modal on success
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    alert("An error occurred: " + error);
                }
            });
        });
    });
</script>

</html>