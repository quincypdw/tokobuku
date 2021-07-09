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
                        <h1 class="mt-4" style="color: blue">Customer</h1>
                            <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Customer
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomer"><i class="fas fa-plus-circle"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="10%">Name</th>
                                                <th width="10%">Email</th>
                                                <th width="10%">No Member</th>
                                                <th width="10%">Gender</th>
                                                <th width="15%">Phone</th>
                                                <th width="20%">Address</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="10%">Name</th>
                                                <th width="10%">Email</th>
                                                <th width="10%">No Member</th>
                                                <th width="10%">Gender</th>
                                                <th width="15%">Phone</th>
                                                <th width="20%">Address</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $x=1;
                                            foreach ($customer->result_array() as $i) :
                                                $id = $i['customer_id'];
                                                $name = $i['name'];
                                                $email = $i['email'];
                                                $no_member = $i['no_member'];
                                                $gender = $i['gender'];
                                                $phone = $i['phone'];
                                                $address = $i['address'];
                                            ?>

                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $no_member; ?></td>
                                                <td><?php echo $gender; ?></td>
                                                <td><?php echo $phone; ?></td>
                                                <td><?php echo $address; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editCustomer<?php echo $id; ?>" title="Edit User"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteCustomer<?php echo $id; ?>" title="Delete User"><i class="far fa-trash-alt"></i></a>
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
                <<!-- modal.php -->
                <?php $this->load->view("admin/_partials/modal.php") ?>
                <?php $this->load->view("admin/customer/modal_customer.php") ?>
                <!-- footer.php -->
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
        </div>
        <!-- js.php-->
        <?php $this->load->view("admin/_partials/js.php") ?>
    </body>
</html>