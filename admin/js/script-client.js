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

        if (confirm("Are you sure you want to delete this equipment?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-client.php",
                data: `id=${deleteId}`,
                success:function(data){
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
        
        // if (clientRequired1 == "" || clientRequired2 == "" || clientRequired3 == ""  || clientRequired4 == "" ){
        //     alert("Fill all the required fields!");
        //     return false;
        // }

        console.log(clientFormData);

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

});
