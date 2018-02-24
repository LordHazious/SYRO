<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="text-align: center;"><i class="fa fa-life-ring"></i> Support Tickets</h3>
                    </div>
                    <div class="box-body">

                        <div class="container">
                            <div class="row">
                                <?php echo validation_errors(); ?>
                                <?php echo form_open('Tickets/create'); ?>
                                    <div class="form-group">
                                        <label for="inputSubject">Subject</label>
                                        <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" class="form-control form-control-lg" id="inputSubject" aria-describedby="subjectHelp" placeholder="Ticket Subject" style="max-width: 1000px; min-height: 50px;">
                                        <small id="subjectHelp" class="form-text text-muted">Ensure the ticket subject is relevant to your query</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">Related Service</label>
                                        <select name="service" class="form-control form-control-lg" style="max-width: 1000px; min-height: 80px;">
                                            <option>None Selected</option>
                                        </select>
                                        <small id="subjectHelp" class="form-text text-muted">Please select the service in which this ticket relates to</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">Department</label>
                                        <select name="department" class="form-control form-control-lg" style="max-width: 1000px; min-height: 80px;">
                                            <option>Technical</option>
                                            <option>Billing</option>
                                        </select>
                                        <small id="subjectHelp" class="form-text text-muted">Please ensure you submit your ticket to the correct department</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputContent">Content</label>
                                        <textarea name="content" class="form-control" id="inputContent" rows="5" placeholder="Please write descriptively what issues/queries you have" style="max-width: 1000px;"></textarea>
                                    </div>
                                    <input type="submit" value="Create Ticket" class="btn btn-primary"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->