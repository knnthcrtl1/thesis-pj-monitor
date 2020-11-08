$(document).ready(function() {
   
    const fetchprojectTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_project_tables.php",
            data:{},
            success:function(data){
                $("#projectTable table tbody").html(data);
                $('#projectDataTable').DataTable( );
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
        var projectRequired8 = $("#projectRequired8").val();
        var projectRequired9 = $("#projectRequired9").val();
        
        if (projectRequired1 == "" || projectRequired2 == "" || projectRequired3 == ""  || projectRequired4 == "" || projectRequired5 == "" || projectRequired8 == "" || projectRequired9 == "" ){
            alert("Fill all the required fields!");
            return false;
        }
        
        var varStartDate = new Date(projectRequired8);
        var varEndDate = new Date(projectRequired9);
        var today = new Date();
        today.setHours(0,0,0,0);

        let startDate = varStartDate >= today;
        let endDate = varEndDate >= today;  

        if(!startDate) {
            alert("Start date must be today and up");
            return false;
        }

        if(!endDate) {
            alert("End date must be today and up");
            return false;
        }
        
        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: projectFormData + "&ajax=true",
            success:function(data){
                alert("Edited Successfully!");
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
        var projectRequired8 = $("#projectRequired8").val();
        var projectRequired9 = $("#projectRequired9").val();
        
        if (projectRequired1 == "" || projectRequired2 == "" || projectRequired3 == ""  || projectRequired4 == "" || projectRequired5 == "" || projectRequired8 == "" || projectRequired9 == "" ){
            alert("Fill all the required fields!");
            return false;
        }
        
        var varStartDate = new Date(projectRequired8);
        var varEndDate = new Date(projectRequired9);
        var today = new Date();
        today.setHours(0,0,0,0);

        let startDate = varStartDate >= today;
        let endDate = varEndDate >= today;  

        if(!startDate) {
            alert("Start date must be today and up");
            return false;
        }

        if(!endDate) {
            alert("End date must be today and up");
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

    

    // engineerProjectRequired1

    $(document).on("click","#submit-add-engineer-in-project-form", function(e) {
        e.preventDefault();

        var addEngineerProjectForm = $("#add-engineer-in-project-form").serialize();

        var engineerProjectRequired1 = $("#engineerProjectRequired1").val();

        if (engineerProjectRequired1 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: addEngineerProjectForm + "&ajax=true",
            success:function(data){

                if(data == 1){
                    alert("Engineer already exists in project");
                    return false;
                }

                alert("Added Successfully!");
                fetchEngineerInProjectTable();
            }
        });

    });

    
    let projectId = $('#editProjectId').val();

    const fetchEngineerInProjectTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_engineer_in_project_tables.php",
            data: `projectId=${projectId}`,
            success:function(data){
                $("#engineerProjectTable table tbody").html(data);
                $('#engineerProjectDataTable').DataTable( );
            }
        });
    }


    $(document).on("click","#delete-engineer-in-project", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this item?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-engineer-in-project.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchEngineerInProjectTable();
                }
            });
        }

    });

    fetchEngineerInProjectTable();

    // foremanProjectRequired1

    $(document).on("click","#submit-add-foreman-in-project-form", function(e) {
        e.preventDefault();

        var addforemanProjectForm = $("#add-foreman-in-project-form").serialize();

        var foremanProjectRequired1 = $("#foremanProjectRequired1").val();

        // if (foremanProjectRequired1 == "" ){
        //     alert("Fill all the required fields!");
        //     return false;
        // }


        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: addforemanProjectForm + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert("foreman already exists in project");
                    return false;
                }
                alert("Added Successfully!");
                fetchforemanInProjectTable();
            }
        });

    });


    const fetchforemanInProjectTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_foreman_in_project_tables.php",
            data: `projectId=${projectId}`,
            success:function(data){
                $("#foremanProjectTable table tbody").html(data);
                $('#foremanProjectDataTable').DataTable();
            }
        });
    }



    $(document).on("click","#delete-foreman-in-project", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this item?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-engineer-in-project.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchforemanInProjectTable();
                }
            });
        }

    });

    fetchforemanInProjectTable();

});
