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
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="<?php echo base_url('auth/registration'); ?>">
                                        <div class="form-group">
                                            <input class="form-control py-4" id="name" type="text" name="name" value="<?= set_value('name'); ?>" placeholder="Enter fullname" />
                                            <?= form_error('name', ' <small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control py-4" id="email" type="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter email address" />
                                            <?= form_error('email', ' <small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" id="password1" type="password" name="password1" placeholder="Enter password" />
                                                    <?= form_error('password1', ' <small class="text-danger">', '</small>') ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" id="password2" type="password" name="password2" placeholder="Confirm Password" />
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <center><div class="g-recaptcha" name="recaptcha" data-sitekey="6LdZl5kaAAAAAKJ1iT4_RcFBhmlMJJLMGJ1FkZ6q"></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= base_url('auth'); ?>">Have an account? Go to login</a></div>
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
    <?php $this->load->view("templates/auth_footer.php") ?>
    <?php $this->load->view("templates/captcha.php") ?>
</body>

</html>