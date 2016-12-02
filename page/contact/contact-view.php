<div class="container">
    <h2>Contact Us</h2>
    <form id="contact-form" method="GET" action="../web/index-controller.php?module=contact&page=contact-success">
        <div class="form_flexbox">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1" for="fullname">Full Name:</span>
                <input class="form-control" id="fullname" type="text" name="fullname" required minlength="2">
                <span id="fullname-error"></span><br></div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1" for="email">Email:</span>
                <input class="form-control" id="email" type="email" name="email" required minlength="2">
                <span id="email-error"></span><br></div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1" for="phone">Contact Phone:</span>
                <input class="form-control" id="phone" type="text" name="phone" required minlength="2" placeholder= "XXXXXXX">
                <span id="phone-error"></span><br></div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1" class="form-control" for="subject">Subject</span>
                <input class="form-control" id='subject' type='text' name='subject' required>
                <span id="subject-error"><br></span>
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1" for='message'>Message</label>
                    <textarea class="form-control" id='message' name='message' rows='10' form='contact-form' required></textarea>
                    <span id="message-error"><br></span>
            </div>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button>

    </form>
</div>
<script src="js/main.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        addFormValidation(document.querySelector('#contact-form'));
    });
</script>
