<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bharathiar University</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/Bharathiar_University_logo.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
<form enctype="multipart/form-data" id="employee_submit" name="employee_submit" class="forms-sample">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                      <div id="employee_code_val"></div>
                    </div>
                    <div class="form-group"method="post" enctype="multipart/form-data">
                      <label for="image">Image</label>
                    <input  type="file" class="form-control" id="image" name="image" multiple="multiple"/>
                      <div id="image_val"></div>
                    </div>
                    <button type="button" onClick="image_upload()">Submit</button>
</form>
    </body>
    </html>
    <table  id="image_table" class=" table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th style="display:none">image_id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($image_details)){
                    $i=1;
                    foreach($image_details as $image_details){ ?>
            <tr>
                <td scope="row"><?php echo $i++;?></td>
                <td style="display:none"><?php echo $image_details['image_id']; ?></td>
                <td><?php echo $image_details['name']; ?></td>
                <td><img style="height:60px;width:60px;"src="<?php  echo base_url();?>assets/uploads/<?php echo $image_details['image']; ?>"/></td>
                <td><button type="button" data-toggle="modal" data-target="#image_modal"onclick=editImg(this.id) id="<?php echo  $image_details['image_id'] ?>" ><i class="fa-solid fa-pen-to-square"></i></button></td>
                      
            </tr>
            <?php } } ?>
        </tbody>
                    </table>
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
$(document).ready( function () {
           $('#image_table').DataTable({
            scrollX: true,
           });
         });
         </script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  
<!-- Modal -->
<div class="modal fade" id="image_modal" role="dialog">
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
          <input id="edit_image_id"name="edit_image_id" style="display:none" />
                     <div class="form-group">
                    <label for="edit_name">Name</label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name" >
                    <div id="edit_name_val"></div>
                  </div>
                  <div class="form-group"method="post" enctype="multipart/form-data">
                    <label for="edit_image">Image</label>
                <?php foreach ($image_details1 as $image_details){ ?>
                    <img  style="height:60px;width:60px;"src="<?php  echo base_url();?>assets/uploads/<?php echo $image_details['image']; ?>"/>
<?php } ?>
                    <label>Change Photo</label>
                    <input  type="file" id="edit_image" class="form-control" name="edit_image" />
                    <div id="edit_image_val"></div>
                  </div>
                  <button type="button"onclick="editImage()" class="btn btn-primary">Save changes</button>
        </div>
        </div>