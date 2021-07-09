<div class="modal fade" id="addLevel" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/level/add'); ?>"method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Add Level</h5>
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Level Name </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="i_name" placeholder="Mark Zurkerburg" required>
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
  foreach ($level->result_array() as $i) :
    $id = $i['level_id'];
    $name = $i['name'];
?>

<div class="modal fade" id="editLevel<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/level/edit/' . $id); ?>"method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Edit Level</h5>
          <button type="button" class="close" data-dismiss="modal">&times;  
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Level Name </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="i_name" placeholder="Mark Zurkerburg" value="<?php echo $name; ?>">
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
  foreach ($level->result_array() as $i) :
    $id = $i['level_id'];
    $name = $i['name'];
?>

<div class="modal fade" id="deleteLevel<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/level/delete/' . $id); ?>"method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>  
            </button>
          </div>

          <div class="modal-body">Pilih "Delete" untuk menghapus level dengan nama <?php echo $name; ?></div>

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