<div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                    require_once '../functions/database.php';
                    $sql = 'select * from job_posting order by Time_Posted desc';
                    $statement = $connection -> query($sql);
                    $fetch = $statement -> fetchAll(PDO::FETCH_OBJ);
                    foreach ($fetch as $row):
                ?>
                    <div class="card border-success mb-3 w-100 d-block">
                        <div class="card-header">
                            <h2 class="mr-auto">
                                <?php echo $row -> Job_Title?>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#edit">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </h2>
                        </div>
                        <div class="card-body text-success">
                            <p class="card-text text-success"><?php echo $row -> Description ?></p>
                            <hr>
                            <p class="card-text text-success"><?php echo $row -> Qualifications ?></p>
                            <hr>
                            <p class="card-text text-success"><?php echo $row -> Responsibilities ?></p>
                            <button class="btn btn-warning form-control">Apply Now</button>
                        </div>
                        <div class="card-footer">
                            <blockquote>
                                <small>Author: <?php echo $row -> Author?></small>
                                <footer><small>Date Posted: <?php echo $row -> Time_Posted?></small></footer>
                            </blockquote>
                        </div>
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</div>