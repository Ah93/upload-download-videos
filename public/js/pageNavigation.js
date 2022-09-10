$( document ).ready(function() {

    $.ajax({url: "/home_page", success: function(result){
        $("#getData").html(result);
}});

    $("#homePage").click(function(){
            $.ajax({url: "/home_page", success: function(result){
                $("#getData").html(result);
        }});
    });
    
    $("#addCourse").click(function(){
            $.ajax({url: "/add_course", success: function(result){
                $("#getData").html(result);
        }});
    });
    
    $("#manageCourse").click(function(){
            $.ajax({url: "/manage_course", success: function(result){
                $("#getData").html(result);
        }});
    });

    });

    