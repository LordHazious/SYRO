<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="text-align: center;"><i class="fa fa-life-ring"></i> Recent Tickets</h3>
                    </div>
                    <div class="box-body">
                        <table style="width: 100%;" class="table table-striped">
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($tickets as $row)
                            {
                                $datetime = new DateTime($row->date_created);
                                echo "<tr><td><a href=\"".base_url('tickets/view/'.$row->tid)."\"><div class=\"label label-success\">".$row->status."</div> &nbsp;<strong>".$row->subject."</strong> #".$row->tid."</a></td>
                                <td><span style=\"float: right;\">Created: ".$datetime->format('m/d/Y h:i A')."</span></td></tr>";
                                if ($i++ == 2) break;
                            }
                            ?>
                            </tbody>
                        </table>
                        <hr /><p style="text-align: center;"><a href="<?=base_url('tickets');?>">View all</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="text-align: center;"><i class="fa fa-file"></i> Overdue/Unpaid Invoices</h3>
                    </div>
                    <div class="box-body">
                        <div class="no_content">You have no overdue invoices</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->