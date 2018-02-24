<!--
 * Created by PhpStorm.
 * User: kodusk
 * Date: 11/17/2017
 * Time: 9:13 PM
-->
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo "http://".$_SERVER['SERVER_NAME']."/"; ?>"><b>Syro</b>Portal</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Forgotten Password</p>

        <?php echo validation_errors(); ?>
        <?php echo form_open('Auth/forgot'); ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" value="Reset Password" class="btn btn-primary btn-block btn-flat" />
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div style="text-align: center;">
            <hr>
            <a href="<?= base_url('login') ?>">Wait, I know my login details!</a><br>
            <a href="<?= base_url('register') ?>" class="text-center">Haven't got an account? Register now!</a>
        </div>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->