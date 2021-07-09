<div class="modal fade" id="addSupplier" role="dialog">
  <div class="modal-dialog">
    <form class="form" action="<?php echo base_url('/admin/supplier/add'); ?>"method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Add Supplier</h5>
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Supplier Name </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="i_name" placeholder="Kompas Gramedia" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Supplier Email </label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="i_email" placeholder="cs@kpg.id" required>
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
foreach ($supplier->result_array() as $i) :
  $id = $i['supplier_id'];
  $name = $i['name'];
  $email = $i['email'];
  $phone = $i['phone'];
  $address = $i['address'];
  ?>

  <div class="modal fade" id="editSupplier<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/supplier/edit/' . $id); ?>"method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Edit Supplier</h5>
            <button type="button" class="close" data-dismiss="modal">&times;  
            </button>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> Supplier Name </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="i_name" placeholder="Kompas Gramedia" value="<?php echo $name; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="title" class="col-sm-2 control-label"> Supplier Email </label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="i_email" placeholder="cs@kpg.id" value="<?php echo $email; ?>">
                </div>
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
foreach ($supplier->result_array() as $i) :
  $id = $i['supplier_id'];
  $name = $i['name'];
  $email = $i['email'];
  $phone = $i['phone'];
  $address = $i['address'];
  ?>

  <div class="modal fade" id="deleteSupplier<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/supplier/delete/' . $id); ?>"method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>  
            </button>
          </div>

          <div class="modal-body">Pilih "Delete" untuk menghapus supplier dengan nama <?php echo $name; ?></div>

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