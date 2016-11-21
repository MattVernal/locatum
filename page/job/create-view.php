<div class='container'>
    <form method="post" action="index-controller.php?module=job&page=create">
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Start Date</span>
            <input name ='startDate' type="date" class="form-control" placeholder="xx/xx/xxxx" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">End Date</span>
            <input name ='endDate' type="date" class="form-control" placeholder="xx/xx/xxxx" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Job Title</span>
            <input name='jobTitle' type="text" class="form-control" placeholder="Dentist" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="form-group input-group">            
            <span class="input-group-addon" id="sizing-addon1">Description</span>
            <textarea class="form-control" name='description' rows="5" name="description" aria-describedby="sizing-addon1  "></textarea>
        </div>

        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Hourly Rate</span>
            <input name='hourlyRate' type="text" class="form-control" placeholder="" aria-describedby="sizing-addon1">
        </div>
        <br>    
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" >Submit</button>

    </form>
    <div>