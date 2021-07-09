<div class="modal fade" id="addCustomer" role="dialog">
  <div class="modal-dialog">
    <form class="form" action="<?php echo base_url('/admin/customer/add'); ?>"method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Customer Name </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="i_name" placeholder="Mark Zurkerburg" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Customer Email </label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="i_email" placeholder="markzurkerburg@gmail.com" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> No Member </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="i_no_member" placeholder="Premium" required>
              </div>
            </div>
          </div>

          <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> Gender </label>
                <div class="col-md-6">
                <select class="form-control" id="gender" name="i_gender" required>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Phone </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="i_phone" placeholder="081234567890" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Address </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="i_address" placeholder="Jl. Makmur no 3 Yogyakarta" required>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
foreach ($customer->result_array() as $i) :
  $id = $i['customer_id'];
  $name = $i['name'];
  $email = $i['email'];
  $no_member = $i['no_member'];
  $gender = $i['gender'];
  $phone = $i['phone'];
  $address = $i['address'];
  ?>

  <div class="modal fade" id="editCustomer<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/customer/edit/' . $id); ?>"method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Edit Customer</h5>
            <button type="button" class="close" data-dismiss="modal">&times;  
            </button>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> Customer Name </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="i_name" placeholder="Mark Zurkerburg" value="<?php echo $name; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> Customer Email </label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="i_email" placeholder="markzurkerburg@gmail.com" value="<?php echo $email; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> No Member </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="i_no_member" placeholder="Premium" value="<?php echo $no_member; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="title"> Gender </label>
                <select class="form-control" id="gender" name="i_gender" value="<?php echo $gender; ?>">
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> Phone </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="i_phone" placeholder="081234567890" value="<?php echo $phone; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> Address </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="i_address" placeholder="Jl. Makmur no 3 Yogyakarta" value="<?php echo $address; ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
endforeach;
?>

<?php
foreach ($customer->result_array() as $i) :
  $id = $i['customer_id'];
  $name = $i['name'];
  $email = $i['email'];
  $no_member = $i['no_member'];
  $gender = $i['gender'];
  $phone = $i['phone'];
  $address = $i['address'];
  ?>

  <div class="modal fade" id="deleteCustomer<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/customer/delete/' . $id); ?>"method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>  
            </button>
          </div>

          <div class="modal-body">Pilih "Delete" untuk menghapus customer dengan nama <?php echo $name; ?></div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
endforeach;
?>