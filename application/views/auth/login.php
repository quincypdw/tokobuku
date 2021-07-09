<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head.php-->
    <?php $this->load->view("templates/auth_header.php") ?>
</head>

<body style="background-image: url('https://www.indoindians.com/wp-content/uploads/2016/07/Aksara.jpg'); background-size: cover; background-position: center; background-attachment: fixed"">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <?php echo $this->session->flashdata('message'); ?>
                                <div class="card-body">
                                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter email address" />
                                            <?= form_error('email', ' <small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            <?= form_error('password', ' <small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <center><div class="g-recaptcha" name="recaptcha" id="recaptcha" data-sitekey="6LdZl5kaAAAAAKJ1iT4_RcFBhmlMJJLMGJ1FkZ6q" ></div>
                                            <span id="captcha" style="margin-left:100px;color:red" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= base_url('auth/registration'); ?>">Need an account? Sign up!</a></div>
                                </div>
                                <div class="card-footer text-center">
                                <div class="small"><a href="<?= base_url('authemployee/registration'); ?>">Employee Registration</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 2021 Quincy Padawangi</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- footer.php-->
    <?php $this->load->view("auth/modal.php") ?>
    <?php $this->load->view("templates/auth_footer.php") ?>
    <?php $this->load->view("templates/captcha.php") ?>
</body>
</html>