<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="<?php echo "http://".$_SERVER['SERVER_NAME']."/"; ?>"><b>Syro</b>Portal</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register for a Account</p>

        <?php echo validation_errors(); ?>
        <?php echo form_open('Auth/register'); ?>
            <div class="form-group has-feedback">
                <input type="text" name="fullName" value="<?php echo set_value('fullName'); ?>" class="form-control" placeholder="Full name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="cPassword" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <div class="captcha_wrapper">
                    <div class="g-recaptcha" data-sitekey="6LfGGjkUAAAAAB10j45WzyiVcZS4E-r5Rl6qbaWX"></div>
                </div>
            </div>
            <div class="row">
                <!--<div class="col-xs-6">
                    <div class="checkbox icheck" style="margin-left: 5px;">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>-->
                <!-- /.col -->
                <div class="col-xs-6 pull-right">
                    <input type="submit" value="Register" class="btn btn-primary btn-block btn-flat"/>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <hr />
        <div style="text-align: center;">
            <a href="<?= base_url('login') ?>" class="text-center">I already have an account</a>
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->