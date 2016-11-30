<div class='container'>
    <?php
    function error_field($title, array $errors) {
        foreach ($errors as $error) {
            /* @var $error Error */
            if ($error->getSource() == $title) {
                return ' error-field';
            }
        }
        return '';
    }
    ?>
    <h1>
        <?php if ($edit): ?>Edit <?php else: ?>Add <?php endif; ?>Job
    </h1>
    <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $error): ?>
                <?php /* @var $error Error */ ?>
                <li><?php echo $error->getMessage(); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="#" id="job-create-form" novalidate>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Start Date</span>
            <input required minlength="2" id='startDate' value='<?php
            if (array_key_exists('id', $_GET)) {
                echo $job->getStartDate();
            }if(isset($_POST['startDate'])){echo $_POST['startDate'];}
            ?>' name ='startDate' type="text" class="date" placeholder="xx/xx/xxxx" aria-describedby="sizing-addon1">
            <span id="startDate-error"></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">End Date</span>
            <input required minlength="2" id ='endDate' value='<?php
            if (array_key_exists('id', $_GET)) {
                echo $job->getEndDate();
            } if(isset($_POST['endDate'])){echo $_POST['endDate'];}
            ?>'  name ='endDate' type="text" class="date" placeholder="xx/xx/xxxx" aria-describedby="sizing-addon1">
            <span id="endDate-error"></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Job Title</span>
            <input required minlength="2" id='jobTitle'  value='<?php
            if (array_key_exists('id', $_GET)) {
                echo $job->getJobTitle();
            } if(isset($_POST['jobTitle'])){echo $_POST['jobTitle'];}
            ?>' name='jobTitle' type="text" class="form-control" placeholder="Dentist" aria-describedby="sizing-addon1">
            <span id="jobTitle-error"></span>
        </div>
        <br>
        <div class="form-group input-group">            
            <span class="input-group-addon" id="sizing-addon1">Description</span>
            <textarea required minlength="2" id='description' class="form-control" name='description' rows="5" name="description" aria-describedby="sizing-addon1"><?php if (array_key_exists('id', $_GET)) {echo $job->getDescription();} if(isset($_POST['description'])){echo $_POST['description'];}?></textarea>
            <span id="description-error"></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Hourly Rate</span>
            <input required minlength="2"  id='hourlyRate' value='<?php
            if (array_key_exists('id', $_GET)) {
                echo $job->getHourlyRate();
            }if(isset($_POST['hourlyRate'])){echo $_POST['hourlyRate'];}
            ?>' name='hourlyRate' type="text" id="hourly-rate" class="" placeholder="" aria-describedby="sizing-addon1">
            <span id="hourlyRate-error"></span>
        </div>
        <br>    
        <button class="btn btn-lg btn-primary btn-block" value='<?php echo $edit ? 'EDIT' : 'ADD'; ?>' type="submit" name="submit" >Submit</button>

    </form>
</div>
<script src="js/main.js"></script>   
<script>
    document.addEventListener('DOMContentLoaded', function () {
        addFormValidation(document.querySelector('#job-create-form'))
    });
</script>