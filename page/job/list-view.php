<?php if (empty($jobs)): ?>
    <p>No jobs found.</p>
<?php else: ?>
    <h2>Your Listed Jobs</h2>
    <ul class="list">
        <?php foreach ($jobs as $job): ?>
            <li>                
                <h3><a <?php echo "href= ../web/index-controller.php?module=browse&page=job&id=" . $job['Id_job'] . ">" ?>
                        <?php echo $job['jobTitle'] . '</a>'; ?></a></h3>                
                <p><span class="label">Start Date:</span> <?php
                    echo $job['startDate'];
                    ?></p>
                <p><span class="label">End Date:</span> <?php
                    echo $job['endDate'];
                    ?></p>
                <p><a href="index-controller.php?module=job&page=create&id=<?php echo $job['Id_job'] ;?>">Edit</a>
                    | <a href="index-controller.php?module=job&page=delete&id=<?php echo $job['Id_job']; ?>">Delete</a></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

