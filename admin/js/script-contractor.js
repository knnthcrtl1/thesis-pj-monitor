
$(document).ready(function() {

    const fetchcontractorTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_contractor_tables.php",
            data:{},
            success:function(data){
                $("#contractorTable table tbody").html(data);
                $('#contractorDataTable').DataTable();
            }
        });
    }

    fetchcontractorTable();

    $(document).on("click","#delete-contractor", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this equipment?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-contractor.php",
                data: `id=${deleteId}`,
                success:function(data){
                    if(data == 1){
                        alert('Contractor has existing project, delete the data first on the connected project');
                        return false;
                    }
                    alert('Deleted Successfully');
                    fetchcontractorTable();
                }
            });
        }

    });

 
    $(document).on("click","#submit-edit-contractor-form", function(e) {
        e.preventDefault();
       
        var contractorFormData = $("#edit-contractor-form").serialize();

        var contractorRequired1 = $("#contractorRequired1").val();
        var contractorRequired2 = $("#contractorRequired2").val();
        var contractorRequired3 = $("#contractorRequired3").val();
        var contractorRequired4 = $("#contractorRequired4").val();
        
        if (contractorRequired1 == "" || contractorRequired2 == "" || contractorRequired3 == ""  || contractorRequired4 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        if (!validateEmail(contractorRequired3)){
            alert('Please provide correct email address');
            return false;
        }
        
        jQuery.ajax({
            method: "POST",
            url: "./functions/function-contractor.php",
            data: contractorFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }
                alert("Edited Successfully!");
            }
        });

    });
    

    $(document).on("click","#submit-contractor-form", function(e) {
        e.preventDefault();

        var contractorFormData = $("#add-contractor-form").serialize();

        var contractorRequired1 = $("#contractorRequired1").val();
        var contractorRequired2 = $("#contractorRequired2").val();
        var contractorRequired3 = $("#contractorRequired3").val();
        var contractorRequired4 = $("#contractorRequired4").val();
        
        if (contractorRequired1 == "" || contractorRequired2 == "" || contractorRequired3 == ""  || contractorRequired4 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        if (!validateEmail(contractorRequired3)){
            alert('Please provide correct email address');
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-contractor.php",
            data: contractorFormData + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert('email already exists, please use other email');
                    return false;
                }
                alert("Added Successfully!");
                fetchcontractorTable();
            }
        });

    });

    function validateEmail (email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

});
