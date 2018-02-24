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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default"><a href="<?=base_url('tickets/create');?>">
                                        <div class="panel-body">
                                            <h4 style="text-align: center; color: #444;">
                                                <strong>Technical Support</strong><br />
                                                Submit a technical related ticket here
                                            </h4>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default"><a href="<?=base_url('tickets/create');?>">
                                        <div class="panel-body">
                                            <h4 style="text-align: center; color: #444;">
                                                <strong>Sales/Billing</strong><br />
                                                Submit a sales/billing related ticket here
                                            </h4>
                                        </div>
                                    </a></div>
                            </div>
                        </div>

                        <table style="width: 100%;" class="table table-striped">
                            <tbody>
                            <?php
                            foreach($tickets as $row)
                            {
                                $datetime = new DateTime($row->date_created);
                                echo "<tr><td><a href=\"".base_url('tickets/view/'.$row->tid)."\"><div class=\"label label-success\">".$row->status."</div> &nbsp;<strong>".$row->subject."</strong> #".$row->tid."</a></td>
                                <td><span style=\"float: right;\">Created: ".$datetime->format('m/d/Y h:i A')."</span></td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->