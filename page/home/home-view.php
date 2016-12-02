<!-- Image Background Page Header -->
<!-- Note: The background image is set within the business-casual.css file. -->
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h1 class="tagline">Locatum - Your Locum Recruitment Specialists</h1>
                <br>
                <a class='signup-button' href='../../locatum/web/index-controller.php?module=account&page=account'>Sign Up</a>
            </div>
        </div>
    </div>
</header>

<div class="landing">
    <h2>Whether you’re seeking a locum or a locum looking for work we have you covered</h2>
</div>

<br>
<!-- Page Content -->
<div class="container main-body">
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <img class="img-responsive img-center" src="../web/img/confused-doctor.png" alt="Confused Doctor">
            <a class='browse-button' href='../../locatum/web/index-controller.php?module=browse&page=list'>Browse Jobs</a>
        </div>
        <div class="col-sm-6 col-xs-12">
            <img class="img-responsive img-center" src="../web/img/nurse.png" alt="Some Nurses">
            <a class='browse-button' href='../../locatum/web/index-controller.php?module=job&page=create'>Advertise Jobs</a>

        </div>
    </div>
    <div class='row'>
        <div class='col-sm-6'>
            <h2>Testimonials</h2>
            <ul class='testimonial'>
                <li>Fast & reliable, highly reccomended. - Jane Doe</li>
                <li>Got me work within the hour, I can't belive how fast they are! - Some Guy</li>
                <li>"I am completely blown away. Wow what great service, I love it! Locatum did exactly what you said it does."- Renie N.</li>
                <li>"I would also like to say thank you to all your staff."- Emmit S</li>
            </ul>
        </div>
        <div class='col-sm-6'>
            <h2>Current Jobs</h2>
            <ul class="testimonial">
                <?php displayJob($jobs) ?>
            </ul>

        </div>        
    </div>
</div>
<!-- /.row -->
