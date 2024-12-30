$(document).ready(function() {
    $("#Sign-Up").on("click", function(e) {
        e.preventDefault(); // Add this line to prevent default form submission
        var form = $(this).closest("form");
        var name = form.find('input[name="name"]').val();
        var email = form.find('input[name="email"]').val();
        var pass = form.find('input[name="pass"]').val();
        var cpass = form.find('input[name="cpass"]').val();

        if (name == "" || email == "" || pass == "" || cpass == "") {
            alert("Please fill all the fields");
        } else {
            if (pass != cpass) {
                alert("Password and confirm password should be same");
            } else {
                form.submit();
            }
        }
    });
});