<div class="modal fade" id="post" role="dialog" aria-labelledby="post">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Add Available Job</h5>
                <button class="close" data-toggle="modal" data-target="#post">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="add.php" method="post" id="posting">
                                <div class="form-group">
                                    <label for="title">Job Title:</label>
                                    <input type="text" name="title" id="title" placeholder="Please enter title."
                                           class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="author">Author:</label>
                                    <input type="text" name="author" id="author" placeholder="Please enter author."
                                           class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="vacancy">Vacancy:</label>
                                    <input type="text" name="vacancy" id="vacancy" placeholder="Please enter vacancy."
                                           class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" placeholder="Please enter description."
                                              class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="qualification">Qualifications:</label>
                                    <textarea name="qualification" id="qualification" cols="30"
                                              rows="6" placeholder="Please enter qualifications."
                                              class="form-control"  form="posting"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="responsibility">Responsibilities:</label>
                                    <textarea name="responsibility" id="responsibility" cols="30"
                                              rows="6" placeholder="Please enter responsibilities."
                                              class="form-control"  form="posting"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-lg m-auto btn-arrow-right" name="submit" form="posting">
                    <i class="far fa-calendar-plus"></i> <span>Save</span>
                </button>
            </div>
        </div>
    </div>
</div>