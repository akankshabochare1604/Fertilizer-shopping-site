<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set up email parameters
    $to = "abochare90@gmail.com"; // Change this to your email address
    $subject = "Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        // Email sent successfully
        echo "<script>alert('Thank you for your message. We will get back to you soon.');</script>";
    } else {
        // Failed to send email
        echo "<script>alert('Sorry, there was an error sending your message. Please try again later.');</script>";
    }
} else {
    // If the request method is not POST, redirect to the homepage or display an error message
    echo "<script>alert('Access denied.');</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>AgroMart - Online Fertilizer Shopping Site</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
<!-- Contact Section -->
<section id="contact" class="container my-5">
    <h2>Contact Us</h2>
    <p>Have a question or feedback? Feel free to get in touch with us!</p>
    <div class="row">
        <div class="col-md-6">
            <form action="contact_process.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <!-- You can add additional information or contact details here -->
            <p>Address: 123 Pimpri, Pune, India</p>
            <p>Phone: +123 456 7890</p>
            <p>Email: abochare90@gmail.com</p>
        </div>
    </div>
</section>
</body>
</html>