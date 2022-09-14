<script>
    function image(){
        isValid = false;
         var name = $('#name').val();
         var image = document.getElementById('image');
         isValid = true;
         return isValid;
    }
    function image_upload(){
        var isValid = image();
                if(isValid == true){
                    var employee_submit=document.getElementById('employee_submit');
                    var formdata = new FormData(employee_submit);
                    $.ajax({
                        url  :  '<?php echo base_url();?>'+"addImage",	
                        type:"post",
                        data:formdata,
                        processData:false,
                        contentType:false,
                        success: function(data){
                            
                        }
                })
            
                }
        }
    function editImg(image_id){
        // alert(image_id);
        var params = "image_id="+image_id;
        $.ajax({
             type : "POST",
             url  :  '<?php echo base_url();?>'+"edit_image",	 	          	
             data :params,
             success: function(data){
            //  console.log(data);
              var myObj = JSON.parse(data);
              var responseStatus = myObj["response_status"];
              var img_data = myObj["img_data"];

              var image_id = img_data.image_id;
              var name = img_data.name;
              var image = img_data.image;
              if(responseStatus == "success"){	 
                
                $("#edit_image_id").val(image_id); 
                $("#edit_name").val(name);
                $("#edit_image").val(image);
     }
}
        })
    }
    function editVal(){
        isValid = false;

        var edit_image_id = $("#edit_image_id").val();
        var edit_name = $('#edit_name').val();
        var edit_image = $('#edit_image').val();

        isValid = true;
        return isValid;
    }
    function editImage(){
        var isValid = editVal();
                if(isValid == true){
                    var edit_employee_submit=document.getElementById('edit_employee_submit');
                    var formdata = new FormData(edit_employee_submit);
                    $.ajax({
                        url  :  '<?php echo base_url();?>'+"updateImage",	
                        type:"post",
                        data:formdata,
                        processData:false,
                        contentType:false,
                        success: function(data){
                            var myObj = JSON.parse(data);
                            var responseStatus = myObj["response_status"];
                            var message = myObj["message"];
                            if(responseStatus == "success"){	 
                                        setTimeout(function(){
                                        $("#editSuccessMessage").html('<font color="#00FF00">Updated Successfully</font>');
                                }, 2000);
                                        setTimeout(function(){
                                        location.reload();   
                                }, 4000);       
                                            }else{
                                        setTimeout(function(){
                                    
                                        // location.reload();   
                                }, 4000);
                                            } 
                                    }
                                });
                                    }
                            }
</script>