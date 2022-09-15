<div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Edit Employee Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
          <!--<div class="row">
      <div class="col-lg-12">-->
      <form  enctype="multipart/form-data"  id="edit_employee_submit" name="edit_employee_submit" class="forms-sample">
          <div class="row">
              <div class="col-lg-6">
              <?php foreach ($image_details as $image_details){ ?>
          <input value="<?php echo $image_details['image_id'] ?>" id="edit_image_id"name="edit_image_id" style="display:none" />
                     <div class="form-group">
                    <label for="edit_name">Name</label>
                    <input value="<?php echo $image_details['name'] ?>" type="text" class="form-control" id="edit_name" name="edit_name" >
                    <div id="edit_name_val"></div>
                  </div>
                  <div class="form-group"method="post" enctype="multipart/form-data">
                    <label for="edit_image">Image</label>

                    <img id="old_image" name="old_image" style="height:60px;width:60px;"src="<?php  echo base_url();?>assets/uploads/<?php echo $image_details['image']; ?>"/>
                    <?php } ?>
                    <label>Change Photo</label>
                    <input  type="file" id="edit_image" class="form-control" name="edit_image" />
                    <div id="edit_image_val"></div>
                  </div>
       
                  <button type="button"onclick="editImage()" class="btn btn-primary">Save changes</button>
        </div>