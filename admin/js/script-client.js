$(document).ready(function() {

    const fetchclientTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_client_tables.php",
            data:{},
            success:function(data){
                $("#clientTable table tbody").html(data);
                $('#clientDataTable').DataTable();
            }
        });
    }

    fetchclientTable();

    $(document).on("click","#delete-client", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this data?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-client.php",
                data: `id=${deleteId}`,
                success:function(data){
                    if(data == 1){
                        alert('Client has existing project, delete the data first on the connected project');
                        return false;
                    }
                    alert('Deleted Successfully');
                    fetchclientTable();
                }
            });
        }

    });

 
    $(document).on("click","#submit-edit-client-form", function(e) {
        e.preventDefault();
       
        var clientFormData = $("#edit-client-form").serialize();

        var clientRequired1 = $("#clientRequired1").val();
        var clientRequired2 = $("#clientRequired2").val();
        var clientRequired3 = $("#clientRequired3").val();
        var clientRequired4 = $("#clientRequired4").val();
        
        if (clientRequired1 == "" || clientRequired2 == "" || clientRequired3 == ""  || clientRequired4 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        if (!validateEmail(clientRequired3)){
            alert('Please provide correct email address');
            return false;
        }

        
        jQuery.ajax({
            method: "POST",
            url: "./functions/function-client.php",
            data: clientFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }
                alert("Edited Successfully!");
            }
        });

    });
    

    $(document).on("click","#submit-client-form", function(e) {
        e.preventDefault();

        var clientFormData = $("#add-client-form").serialize();

        var clientRequired1 = $("#clientRequired1").val();
        var clientRequired2 = $("#clientRequired2").val();
        var clientRequired3 = $("#clientRequired3").val();
        var clientRequired4 = $("#clientRequired4").val();
        
        if (clientRequired1 == "" || clientRequired2 == "" || clientRequired3 == ""  || clientRequired4 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        if (!validateEmail(clientRequired3)){
            alert('Please provide correct email address');

            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-client.php",
            data: clientFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }
                alert("Added Successfully!");
                fetchclientTable();
            }
        });

    });

    function validateEmail (email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

});
