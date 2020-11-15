
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

        if (confirm("Are you sure you want to delete this data?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-project.php",
                data: `id=${deleteId}`,
                success:function(data){
                    if(data > 0){
                        alert('Project has existing equipments, delete the data first on the connected project');
                        return false;
                    }
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
        var projectRequired3 = $("#projectRequired3").val();
        var projectRequired4 = $("#projectRequired4").val();
        var projectRequired5 = $("#projectRequired5").val();
        var projectRequired6 = $("#projectRequired6").val();
        var projectRequired8 = $("#projectRequired8").val();
        var projectRequired9 = $("#projectRequired9").val();
        
        
        var varStartDate = new Date(projectRequired8);
        var varEndDate = new Date(projectRequired9);
        var today = new Date();
        today.setHours(0,0,0,0);

        // let startDate = varStartDate >= today;
        // let endDate = varEndDate >= today;  

        if (varEndDate <= varStartDate) {
            alert("End date should be greater than Start date");
            return false;
        }

        if (projectRequired1 == "" || projectRequired3 == ""  || projectRequired4 == "" || projectRequired5 == "" || projectRequired6 == "" || projectRequired8 == "" || projectRequired9 == "" ){
            alert("Fill all the required fields!");
            return false;
        }
        

        // if(!startDate) {
        //     alert("Start date must be today and up");
        //     return false;
        // }

        // if(!endDate) {
        //     alert("End date must be today and up");
        //     return false;
        // }
        
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
        var projectRequired3 = $("#projectRequired3").val();
        var projectRequired4 = $("#projectRequired4").val();
        var projectRequired5 = $("#projectRequired5").val();
        var projectRequired8 = $("#projectRequired8").val();
        var projectRequired9 = $("#projectRequired9").val();
        
        if (projectRequired1 == "" ||  projectRequired3 == ""  || projectRequired4 == "" || projectRequired5 == "" || projectRequired8 == "" || projectRequired9 == "" ){
            alert("Fill all the required fields!");
            return false;
        }
        
        var varStartDate = new Date(projectRequired8);
        var varEndDate = new Date(projectRequired9);
        var today = new Date();
        today.setHours(0,0,0,0);

        let startDate = varStartDate >= today;
        let endDate = varEndDate >= today;  

        // if(!startDate) {
        //     alert("Start date must be today and up");
        //     return false;
        // }

        // if(!endDate) {
        //     alert("End date must be today and up");
        //     return false;
        // }

        if (varEndDate <= varStartDate) {
            alert("End date should be greater than Start date");
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
