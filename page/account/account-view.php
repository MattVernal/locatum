<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#locumForm">Locum</button>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#clinicForm">Clinic</button>
<!-- Modal -->
<div id="locumForm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Locum Signup</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="index-controller.php?module=account&page=account&option=locum">
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
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" >Submit</button>

                </form>
            </div>

        </div>

    </div>
</div>
<!-- Modal -->
<div id="clinicForm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Clinic Signup</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="index-controller.php?module=account&page=account&option=clinic">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1">Email</span>
                        <input name='email' type="text" class="form-control" placeholder="someone@example.com" aria-describedby="sizing-addon1">
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1">First Name</span>
                        <input name='firstName' type="text" class="form-control" placeholder="Joe" aria-describedby="sizing-addon1">
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
                        <span class="input-group-addon" id="sizing-addon1">Business Name</span>
                        <input name='clinicName' type="text" class="form-control" placeholder="" aria-describedby="sizing-addon1">
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1">Address</span>
                        <input name='address' type="text" class="form-control" placeholder="" aria-describedby="sizing-addon1">
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1">Password</span>
                        <input name='password' type="password" class="form-control" placeholder="" aria-describedby="sizing-addon1">
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1">Confirm Password</span>
                        <input name='confirmPassword' type="password" class="form-control" placeholder="" aria-describedby="sizing-addon1">
                    </div>

                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" href="index-controller.php?module=account&page=account&clinic=true">Close</button>
            </div>
        </div>

    </div>
</div>
