<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center><i class="fa fa-life-ring fa-3x" aria-hidden="true"></i></center>
                        <hr />
                        <p style="text-align: center; color: #999999; margin-bottom: -15px;">Ticket ID</p>
                        <h3 style="text-align: center;"><?=$ticket->tid;?></h3>
                        <hr />
                        <p style="text-align: center; color: #999999; margin-bottom: -15px;">Department</p>
                        <h3 style="text-align: center;"><?=$ticket->department;?></h3>
                        <hr />
                        <p style="text-align: center; color: #999999; margin-bottom: -15px;">Priority</p>
                        <h3 style="text-align: center;"><?=$ticket->priority;?></h3>
                        <hr />
                        <p style="text-align: center; color: #999999; margin-bottom: -15px;">Current Status</p>
                        <h3 style="text-align: center;"><?=$ticket->status;?></h3>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="#" class="btn btn-success btn-block btn-lg">Fastrack this Ticket</a>
                        <a href="#" class="btn btn-danger btn-block btn-lg">Close Ticket</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><?=$ticket->subject;?></div>
                    <div class="panel-body"><?=$ticket->description;?></div>
                    <div class="panel-footer"><?php $datetime = new DateTime($ticket->date_created); echo $datetime->format('m/d/Y h:i A'); ?></div>
                </div>
                <a href="#" class="btn btn-info btn-block btn-lg" style="margin-bottom: 15px;">Add Reply</a>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="posted ticket-title"><strong>{CUSTOMER NAME} </strong> - {DATE} TIME</p>
                        <p>Customer Reply.</p>
                    </div>
                </div>

                <div class="panel panel-default ticket-admin">
                    <div class="panel-body">
                        <p class="posted ticket-title"><strong>{STAFF NAME} (staff)</strong> - {DATE} {TIME}</p>
                        <p>Admin Reply.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
