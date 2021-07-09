<div class="modal fade" id="show_buku" role="dialog">
  <div class="modal-dialog modal-lg">
    <form class="form-horizontal" action="" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pilih Buku</h5>
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>
        </div>

        <div class="modal-body">
          <div div class="table-responsive">
            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Authors</th>
                  <th>Categories</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($book->result_array() as $i) :
                  $id = $i['book_id'];
                  $title = $i['title'];
                  $price = $i['price'];
                ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $title; ?></td>

                    <?php
                    $temp = "";
                    foreach ($book1->result_array() as $i) :
                      $id1 = $i['book_id'];
                      $author = $i['fullname'];
                      if ($id == $id1) {
                        if ($temp != "") {
                          $temp = $temp . ',&nbsp' . $author;
                        } else {
                          $temp = $author;
                        }
                      }
                    endforeach;

                    ?>
                    <td> <?php echo $temp; ?></td>

                    <?php
                    $temp = "";
                    foreach ($book2->result_array() as $i) :
                      $id1 = $i['book_id'];
                      $bookcategory = $i['name'];
                      if ($id == $id1) {
                        if ($temp != "") {
                          $temp = $temp . ',&nbsp' . $bookcategory;
                        } else {
                          $temp = $bookcategory;
                        }
                      }

                    endforeach;
                    ?>
                    <td><?php echo $temp; ?></td>
                    <td>
                      <input type="number" name="quantity" id="<?php echo $id; ?>" value="1" class="form-control" style="width: 65px;">
                    </td>
                    <td>
                      <input type="price" name="product_price" id="product_price<?php echo $id; ?>" value="<?php echo $price; ?>" class="form-control" style="width: 100px;">
                    </td>
                    <td>
                      <div style="width: 78px;">
                        <button class="add_carts btn btn-success btn-block" data-productid="<?php echo $id; ?>" data-productname="<?php echo $title; ?>" data-productprice="<?php echo $price; ?>" ?><i class="fa fa-cart-plus"></i> Add </button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div> -->
    </form>
  </div>
</div>

<!-- Modal Search Supplier-->
<div class="modal fade" id="showSupplier" role="dialog">
  <div class="modal-dialog modal-lg">
    <form class="form-horizontal" action="" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pilih Supplier</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div div class="table-responsive">
            <table class="table table-bordered display" id="table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="25%">Name</th>
                  <td style="display:none;">id</td>
                  <th width="25%">Email</th>
                  <th width="25%">Phone</th>
                  <th width="30%">Address</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $x = 1;
                foreach ($supplier->result_array() as $i) :
                  $id = $i['supplier_id'];
                  $name = $i['name'];
                  $email = $i['email'];
                  $phone = $i['phone'];
                  $address = $i['address'];
                ?>
                  <tr>
                    <td><?php echo $name; ?></td>
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $email; ?></td>
                    <td> <?php echo $phone; ?></td>
                    <td> <?php echo $address; ?></td>
                  </tr>
                <?php $x++;
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- End Modal Search Supplier-->