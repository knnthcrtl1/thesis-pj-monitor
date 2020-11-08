$(document).ready(function() {

    const fetchEngineerTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_engineer_tables.php",
            data:{},
            success:function(data){
                $("#engineerTable table tbody").html(data);
                $('#engineerDataTable').DataTable();
            }
        });
    }

    fetchEngineerTable();

    $(document).on("click","#delete-engineer", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to data this equipment?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-engineer.php",
                data: `id=${deleteId}`,
                success:function(data){
                    if(data == 1){
                        alert('Engineer has existing project, delete the data first on the connected project');
                        return false;
                    }
                    alert('Deleted Successfully');
                    fetchEngineerTable();
                }
            });
        }

    });

 
    $(document).on("click","#submit-edit-engineer-form", function(e) {
        e.preventDefault();
       
        var engineerFormData = $("#edit-engineer-form").serialize();

        var engineerRequired1 = $("#engineerRequired1").val();
        var engineerRequired2 = $("#engineerRequired2").val();
        var engineerRequired3 = $("#engineerRequired3").val();
        var engineerRequired4 = $("#engineerRequired4").val();
        var engineerRequired5 = $("#engineerRequired5").val();
        var engineerRequired6 = $("#engineerRequired6").val();
        var engineerRequired7 = $("#engineerRequired7").val();
        var engineerRequired8 = $("#engineerRequired8").val();
        
        if (engineerRequired1 == "" || engineerRequired2 == "" || engineerRequired3 == ""  || engineerRequired4 == "" || engineerRequired5 == "" || engineerRequired6 == "" || engineerRequired7 == "" || engineerRequired8 == ""){
            alert("Fill all the required fields!");
            return false;
        }

        if (!validateEmail(engineerRequired4)){
            alert('Please provide correct email address');
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-engineer.php",
            data: engineerFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }
                alert("Edited Successfully!");
            }
        });

    });
    

    $(document).on("click","#submit-engineer-form", function(e) {
        e.preventDefault();

        var engineerFormData = $("#add-engineer-form").serialize();

        var engineerRequired1 = $("#engineerRequired1").val();
        var engineerRequired2 = $("#engineerRequired2").val();
        var engineerRequired3 = $("#engineerRequired3").val();
        var engineerRequired4 = $("#engineerRequired4").val();
        var engineerRequired5 = $("#engineerRequired5").val();
        var engineerRequired6 = $("#engineerRequired6").val();
        var engineerRequired7 = $("#engineerRequired7").val();
        var engineerRequired8 = $("#engineerRequired8").val();
        
        if (engineerRequired1 == "" || engineerRequired2 == "" || engineerRequired3 == ""  || engineerRequired4 == "" || engineerRequired5 == "" || engineerRequired6 == "" || engineerRequired7 == "" || engineerRequired8 == ""){
            alert("Fill all the required fields!");
            return false;
        }

        if (!validateEmail(engineerRequired4)){
            alert('Please provide correct email address');
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-engineer.php",
            data: engineerFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }

                alert("Added Successfully!");
                fetchEngineerTable();
            }
        });

    });

    function validateEmail (email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }


});
