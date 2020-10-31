$(document).ready(function() {

    const fetchprojectTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_project_tables.php",
            data:{},
            success:function(data){
                $("#projectTable table tbody").html(data);
                $('#projectDataTable').DataTable();
            }
        });
    }

    fetchprojectTable();

    $(document).on("click","#delete-project", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this equipment?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-project.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchprojectTable();
                }
            });
        }

    });

 
    $(document).on("click","#submit-edit-project-form", function(e) {
        e.preventDefault();
       
        var projectFormData = $("#edit-project-form").serialize();

        var projectRequired1 = $("#projectRequired1").val();
        var projectRequired2 = $("#projectRequired2").val();
        var projectRequired3 = $("#projectRequired3").val();
        var projectRequired4 = $("#projectRequired4").val();
        var projectRequired5 = $("#projectRequired5").val();
        var projectRequired6 = $("#projectRequired6").val();
        var projectRequired7 = $("#projectRequired7").val();
        
        if (projectRequired1 == "" || projectRequired2 == "" || projectRequired3 == ""  || projectRequired4 == "" || projectRequired5 == "" || projectRequired6 == "" || projectRequired7 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: projectFormData + "&ajax=true",
            success:function(data){
                alert(data);
                // alert("Edited Successfully!");
            }
        });

    });
    

    $(document).on("click","#submit-project-form", function(e) {
        e.preventDefault();

        var projectFormData = $("#add-project-form").serialize();

        var projectRequired1 = $("#projectRequired1").val();
        var projectRequired2 = $("#projectRequired2").val();
        var projectRequired3 = $("#projectRequired3").val();
        var projectRequired4 = $("#projectRequired4").val();
        var projectRequired5 = $("#projectRequired5").val();
        var projectRequired6 = $("#projectRequired6").val();
        var projectRequired7 = $("#projectRequired7").val();
        
        if (projectRequired1 == "" || projectRequired2 == "" || projectRequired3 == ""  || projectRequired4 == "" || projectRequired5 == "" || projectRequired6 == "" || projectRequired7 == "" ){
            alert("Fill all the required fields!");
            return false;
        }


        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: projectFormData + "&ajax=true",
            success:function(data){
                alert("Added Successfully!");
                fetchprojectTable();
            }
        });

    });

});
