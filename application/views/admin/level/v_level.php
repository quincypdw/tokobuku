<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- head.php-->
        <?php $this->load->view("admin/_partials/head.php") ?>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar.php-->
       <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- Modal -->
           <?php $this->load->view("admin/_partials/modal.php") ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- sidebar.php-->
                <?php $this->load->view("admin/_partials/sidebar.php") ?>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4" style="color: blue">Level</h1>
                            <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Level
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLevel"><i class="fas fa-plus-circle"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="25%">Name</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="25%">Name</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $x=1;
                                            foreach ($level->result_array() as $i) :
                                                $id = $i['level_id'];
                                                $name = $i['name'];
                                            ?>

                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editLevel<?php echo $id; ?>" title="Edit User"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteLevel<?php echo $id; ?>" title="Delete User"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                $x++;
                                                endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- modal.php -->
                <?php $this->load->view("admin/_partials/modal.php") ?>
                <?php $this->load->view("admin/level/modal_level.php") ?>
                <!-- footer.php -->
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
        </div>
        <!-- js.php-->
        <?php $this->load->view("admin/_partials/js.php") ?>
    </body>
</html>