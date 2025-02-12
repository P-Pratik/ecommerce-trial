<?php require 'partials/_nav.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
</head>

<body class="body-prop">

    <div class="container mt-5 bg-dark padded-container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="text-center mb-4">Contact Us</h1>
                <p>
                    Have questions, feedback, or just want to connect? We'd love to hear from you! Feel free to
                    reach out through any of the following channels:
                </p>

                <h4 class="mt-4">Customer Support</h4>
                <p>
                    Our dedicated customer support team is ready to assist you with any inquiries or concerns. You can
                    contact them via email at <a href="mailto:support@yourcompany.com">support@yourcompany.com</a> or
                    call our toll-free number at 1-800-XXX-XXXX.
                </p>

                <h4 class="mt-4">Social Media</h4>
                <p>
                    Stay connected with us on social media for the latest updates, promotions, and more. Follow us on
                    <a href="https://www.facebook.com/yourcompany" target="_blank">Facebook</a>,
                    <a href="https://twitter.com/yourcompany" target="_blank">Twitter</a>, and
                    <a href="https://www.instagram.com/yourcompany/" target="_blank">Instagram</a>.
                </p>

                <h4 class="mt-4">Contact Form</h4>
                <p>
                    Alternatively, you can fill out the contact form below, and we'll get back to you as soon as
                    possible:
                </p>
                <form action="process_contact_form.php" method="post">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-end">
        <?php require 'partials/footer.php'; ?>
    </div>
</body>

</html>
