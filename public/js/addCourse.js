
$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#course-upload').submit(function(e) {
        e.preventDefault();
    
        let formData = new FormData(this);
    
       
        $('#tit-input-error').text('');
        $('#cat-input-error').text('');
        $('#vid-input-error').text('');
        $('#thumb-input-error').text('');
        $('#adoc-input-error').text('');
    
        
        $.ajax({
            async: true,
            type:'POST',
            url: "/upload_course",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                    $('#successMsg').show(response);
            },
            error: function(response){
                console.log(response)
                $('#tit-input-error').text(response.responseJSON.errors.c_title);
                $('#cat-input-error').text(response.responseJSON.errors.c_category);
                $('#vid-input-error').text(response.responseJSON.errors.c_vidFile);
                $('#thumb-input-error').text(response.responseJSON.errors.c_thumbFile);
                $('#adoc-input-error').text(response.responseJSON.errors.c_docfile);
                
            }
       });
    });
    
    });