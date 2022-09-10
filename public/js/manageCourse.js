$(document).ready(function () {
    getRecordsMC();
      $.ajaxSetup({
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
      
      $('body').on('submit', '#updateEditForm', function (e) {
        e.preventDefault();
  
       
        let formData = new FormData(this);
        // formData.append('_method', 'put');
        var id = formData.get('id');
  
      $('#tit-input-error').text('');
      $('#cat-input-error').text('');
      $('#c_description').text('');
         
          $.ajax({
            url: '/courseEdit/' + id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
              $('#edit-model').modal('hide');
              getRecordsMC();
              // $("#getData").load("manage_document #manageDocument");
              //$(".modal-backdrop").hide();
              // $('body').removeClass('modal-open');
              // $('.modal-backdrop').remove();
              //$('.modal-backdrop').remove();
            },
            error: function(response){
              console.log(response)
              $('#tit-input-error').text(response.responseJSON.errors.c_title);
              $('#cat-input-error').text(response.responseJSON.errors.c_category);
              $('#c_description').text(response.responseJSON.errors.c_description);
                
          }
        });
      });
  
      $('body').on('click', '#btn-delete', function (e) {
        e.preventDefault();
  
        var id = $("#idd").val();
         
          $.ajax({
            url: '/courseDelete/' + id,
            type: "POST",
            data: {id: id},
            contentType: false,
            processData: false,
            success: function (response) {
              $('#delete-model').modal('hide');
              getRecordsMC();
            },
            error: function(response){
              console.log(response)
              
          }
        });
      });
  
      $('body').on('click', '#editCourses', function (event) {
      
          event.preventDefault();
          var id = $(this).data('id');
          $.get('courseM/' + id + '/edit', function (data) {
               $('#userCrudModal').html("Edit courseEdit");
               $('#btn-edit').val("Edit courseEdit");
               $('#edit-model').modal('show');
               $('#id').val(data.data.id);
               $('#c_title').val(data.data.c_title);
               $('#c_category').val(data.data.c_category);
               $('#c_description').val(data.data.c_description);
           })
      });
  
      $('body').on('click', '#deleteCourses', function (event) {
      
        event.preventDefault();
        var id = $(this).data('id');
        $.get('courseM/' + id + '/delete', function (data) {
             $('#userCrudModal').html("Delete courseDel");
             $('#btn-delete').val("Delete courseDel");
             $('#delete-model').modal('show');
             $('#idd').val(data.data.id);
         })
    });
  
  
  //Get all records
  function getRecordsMC() {
    $.ajax({  //create an ajax request to display.php
     type: "GET",
     url: "get_manage_course",
     datatType : 'json',       
     success: function (data) {
       console.log(data.coursedata);
       $("tbody").html("");
       $.each(data.coursedata, function (key, item) {
           var rows = $('<tr>\
         <td>'+item.id+'</td>\
         <td>'+item.c_title+'</td>\
         <td>'+item.c_category+'</td>\
         <td>'+item.c_vid_file_name+'</td>\
         <td>'+item.c_thumb_file_name+'</td>\
         <td>'+item.c_adoc_file_name+'</td>\
         <td>'+item.c_description+'</td>\
         <td>\
           <button type="button" id="editCourses" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-model" data-id="'+item.id+'"><i class="fas fa-edit"></i></button>\
           <button type="button" id="deleteCourses" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-model" data-id="'+item.id+'"><i class="fas fa-trash"></i></button>\
         </td>\
       </tr>');
       $("tbody").append(rows);
       
       });
       $('#manageCourseTable').DataTable();
     }
   });
  }
  
    }); 
   
  // $(document).ready(function () {
  //   $("#edit-model").modal({backdrop: false});
  // }); 
  
  