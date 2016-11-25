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
        <?php if ($edit): ?>
            Edit&nbsp;
        <?php else: ?>
            Add&nbsp; 
        <?php endif; ?>
        Job
    </h1>
    <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $error): ?>
                <?php /* @var $error Error */ ?>
                <li><?php echo $error->getMessage(); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <form method="post" action="#">
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Start Date</span>
            <input value='<?php if (array_key_exists('id', $_GET)){echo $job->getStartDate();}?>' name ='startDate' type="date" class="form-control" placeholder="xx/xx/xxxx" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">End Date</span>
            <input value='<?php if (array_key_exists('id', $_GET)){echo $job->getEndDate();} ?>'  name ='endDate' type="date" class="form-control" placeholder="xx/xx/xxxx" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Job Title</span>
            <input  value='<?php if (array_key_exists('id', $_GET)){echo $job->getJobTitle();} ?>' name='jobTitle' type="text" class="form-control" placeholder="Dentist" aria-describedby="sizing-addon1">
        </div>
        <br>
        <div class="form-group input-group">            
            <span class="input-group-addon" id="sizing-addon1">Description</span>
            <textarea class="form-control" name='description' rows="5" name="description" aria-describedby="sizing-addon1  ">
                <?php if (array_key_exists('id', $_GET)){echo $job->getDescription();} ?>
            </textarea>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Hourly Rate</span>
            <input  value='<?php if (array_key_exists('id', $_GET)){echo $job->getHourlyRate();} ?>' name='hourlyRate' type="text" class="form-control" placeholder="" aria-describedby="sizing-addon1">
        </div>
        <br>    
        <button class="btn btn-lg btn-primary btn-block" value='<?php echo $edit ? 'EDIT' : 'ADD'; ?>' type="submit" name="submit" >Submit</button>

    </form>
    <div>