$(document).ready(function () {
    $('body').on('click', '#viewCourseDetails', function (event) {
      
        event.preventDefault();
        var id = $(this).data('id');
        $.get('courseM/' + id + '/view', function (data) {
             $('#userCrudModal').html("View courseView");
             $('#view-model').modal('show');
             $('#c_id').val(data.data.id);
             $('#c_title').val(data.data.c_title);
             $('#c_category').val(data.data.c_category);
             $('#c_description').val(data.data.c_description);
         })
    });
});