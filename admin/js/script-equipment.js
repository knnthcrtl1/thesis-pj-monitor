$(document).ready(function() {

    const checkNumberNegative = (val) => {
        let value = val < 0;
        return value;
    }

    const fetchEquipmentTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_equipment_tables.php",
            data:{},
            success:function(data){
                $("#equipmentTable table tbody").html(data);
                $('#equipmentDataTable').DataTable();
            }
        });
    }

    fetchEquipmentTable();

    $(document).on("click","#delete-equipment", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this equipment?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-equipment.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchEquipmentTable();
                }
            });
        }

    });

 
    $(document).on("click","#submit-edit-equipment-form", function(e) {
        e.preventDefault();

        var equipmentFormData = $("#edit-equipment-form").serialize();
        var equipmentRequired1 = $("#equipmentRequired1").val();
        var equipmentRequired3 = $("#equipmentRequired3").val();
        var equipmentRequired4 = $("#equipmentRequired4").val();

        if (equipmentRequired1 == ""  || equipmentRequired3 == "" || equipmentRequired4 == ""){
            alert("Fill all the required fields!");
            return false;
        } 

        
        if(checkNumberNegative(equipmentRequired4) || checkNumberNegative(equipmentRequired3)) {
            alert('Count or price must be greater than 0');
            return false;
        }

         jQuery.ajax({
            method: "POST",
            url: "./functions/function-equipment.php",
            data: equipmentFormData + "&ajax=true",
            success:function(data){
                alert("Edited Successfully!");
            }
        });

    });
    

    $(document).on("click","#submit-equipment-form", function(e) {
        e.preventDefault();

        var equipmentFormData = $("#add-equipment-form").serialize();

        var equipmentRequired1 = $("#equipmentRequired1").val();
        var equipmentRequired3 = $("#equipmentRequired3").val();
        var equipmentRequired4 = $("#equipmentRequired4").val();

        if (equipmentRequired1 == ""  || equipmentRequired3 == "" || equipmentRequired4 == ""){
            alert("Fill all the required fields!");
            return false;
        } 

        if(checkNumberNegative(equipmentRequired3) || checkNumberNegative(equipmentRequired4)) {
            alert('Count or price must be greater than 0');
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-equipment.php",
            data: equipmentFormData + "&ajax=true",
            success:function(data){
                alert("Added Successfully!");
                fetchEquipmentTable();
            }
        });

    });

});
