<div class="modal fade" id="addBook_category" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/book_category/add'); ?>"method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Add Book Category</h5>
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Book Category Name </label>
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
  foreach ($book_category->result_array() as $i) :
    $id = $i['book_category_id'];
    $name = $i['name'];
?>

<div class="modal fade" id="editBook_category<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/book_category/edit/' . $id); ?>"method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Edit Book Category</h5>
          <button type="button" class="close" data-dismiss="modal">&times;  
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label for="title" class="col-sm-2 control-label"> Book Category Name </label>
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
  foreach ($book_category->result_array() as $i) :
    $id = $i['book_category_id'];
    $name = $i['name'];
?>

<div class="modal fade" id="deleteBook_category<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
      <form class="form" action="<?php echo base_url('/admin/book_category/delete/' . $id); ?>"method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>  
            </button>
          </div>

          <div class="modal-body">Pilih "Delete" untuk menghapus book_category dengan nama <?php echo $name; ?></div>

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