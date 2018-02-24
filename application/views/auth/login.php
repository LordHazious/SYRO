<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo "http://".$_SERVER['SERVER_NAME']."/"; ?>"><b>Syro</b>Portal</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo validation_errors(); ?>
        <?php echo form_open('Auth/login'); ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-6 pull-right">
                    <input type="submit" value="login" class="btn btn-primary btn-block btn-flat"/>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div style="text-align: center;">
            <hr />
            <a href="<?= base_url('forgot') ?>">Forgotten your password?</a><br>
            <a href="<?= base_url('register') ?>" class="text-center">Don't have an account? Register now!</a>
        </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->