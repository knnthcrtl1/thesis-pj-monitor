$(document).ready(function() {

    const fetchforemanTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_foreman_tables.php",
            data:{},
            success:function(data){
                $("#foremanTable table tbody").html(data);
                $('#foremanDataTable').DataTable();
            }
        });
    }

    fetchforemanTable();

    $(document).on("click","#delete-foreman", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to data this equipment?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-foreman.php",
                data: `id=${deleteId}`,
                success:function(data){
                    if(data == 1){
                        alert('Foreman has existing project, delete the data first on the connected project');
                        return false;
                    }
                    alert('Deleted Successfully');
                    fetchforemanTable();
                }
            });
        }

    });

 
    $(document).on("click","#submit-edit-foreman-form", function(e) {
        e.preventDefault();
       
        var foremanFormData = $("#edit-foreman-form").serialize();

        var foremanRequired1 = $("#foremanRequired1").val();
        var foremanRequired2 = $("#foremanRequired2").val();
        var foremanRequired3 = $("#foremanRequired3").val();
        var foremanRequired4 = $("#foremanRequired4").val();
        var foremanRequired5 = $("#foremanRequired5").val();
        var foremanRequired6 = $("#foremanRequired6").val();
        var foremanRequired7 = $("#foremanRequired7").val();
        var foremanRequired8 = $("#foremanRequired8").val();
        
        if (foremanRequired1 == "" || foremanRequired2 == "" || foremanRequired3 == ""  || foremanRequired4 == "" || foremanRequired5 == "" || foremanRequired6 == "" || foremanRequired7 == "" || foremanRequired8 == ""){
            alert("Fill all the required fields!");
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-foreman.php",
            data: foremanFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }
                alert("Edited Successfully!");
            }
        });

    });
    

    $(document).on("click","#submit-foreman-form", function(e) {
        e.preventDefault();

        var foremanFormData = $("#add-foreman-form").serialize();

        var foremanRequired1 = $("#foremanRequired1").val();
        var foremanRequired2 = $("#foremanRequired2").val();
        var foremanRequired3 = $("#foremanRequired3").val();
        var foremanRequired4 = $("#foremanRequired4").val();
        var foremanRequired5 = $("#foremanRequired5").val();
        var foremanRequired6 = $("#foremanRequired6").val();
        var foremanRequired7 = $("#foremanRequired7").val();
        var foremanRequired8 = $("#foremanRequired8").val();
        
        if (foremanRequired1 == "" || foremanRequired2 == "" || foremanRequired3 == ""  || foremanRequired4 == "" || foremanRequired5 == "" || foremanRequired6 == "" || foremanRequired7 == "" || foremanRequired8 == ""){
            alert("Fill all the required fields!");
            return false;
        }


        jQuery.ajax({
            method: "POST",
            url: "./functions/function-foreman.php",
            data: foremanFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }
                alert("Added Successfully!");
                fetchforemanTable();
            }
        });

    });

});
