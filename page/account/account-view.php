<div class="container">
    <h1>Sign Up</h1>
    <form method="post" id="signup-form" action="index-controller.php?module=account&page=account&option=locum">
        <div class="radio input-group">
            <input type="radio" name="accountType" value="locum" checked>Locum</input><br>
            <input type="radio" name="accountType" value="clinic">Clinic</input>
        </div>

        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Email</span>
            <input name ='email' type="text" class="form-control" placeholder="someone@example.com" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">First Name</span>
            <input name ='firstName' type="text" class="form-control" placeholder="Joe" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Last Name</span>
            <input name='lastName' type="text" class="form-control" placeholder="Bloggs" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Phone Number</span>
            <input name='phoneNumber' type="text" class="form-control" placeholder="XXXXXXXX" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Password</span>
            <input name='password' type="password" class="form-control" placeholder="" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Confirm Password</span>
            <input name='passwordConfirm' type="password" class="form-control" placeholder="" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div id="clinicOptions" class="hide">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Business Name</span>
                <input name='clinicName' type="text" class="form-control" placeholder="" aria-describedby="sizing-addon1">
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Address</span>
                <input name='address' type="text" class="form-control" placeholder="" aria-describedby="sizing-addon1">
            </div>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" >Submit</button>

    </form>
</div>
<script src="js/main.js">

</script>
<script>
//    document.addEventListener('DOMContentLoaded', function () {
//        addFormValidation(document.querySelector('#signup-form'))
//    });
    document.addEventListener('DOMContentLoaded', function () {
        showClinicOptions(document.querySelector('#signup-form'))
    });
</script>
