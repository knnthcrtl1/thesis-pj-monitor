$(document).ready(function() {

    const fetchEquipmentCategoryTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_equipment_category_tables.php",
            data:{},
            success:function(data){
                $("#equipmentCategoryTable table tbody").html(data);
                $('#equipmentDataTable').DataTable();
            }
        });
    }

    fetchEquipmentCategoryTable();

    $(document).on("click","#submit-equipment-category-form", function(e) {
        e.preventDefault();

        var equipmentFormData = $("#add-equipment-category-form").serialize();
        var equipmentRequired1 = $("#equipmentRequired1").val();

        if (equipmentRequired1 == ""){
            alert("Fill all the required fields!");
            return false;
        } 

        console.log(equipmentFormData);

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-equipment-category.php",
            data: equipmentFormData + "&ajax=true",
            success:function(data){
                alert("Added Successfully!");
                fetchEquipmentCategoryTable();
            }
        });

    });

    $(document).on("click","#submit-edit-equipment-category-form", function(e) {
        e.preventDefault();

        var equipmentFormData = $("#edit-equipment-category-form").serialize();
        var equipmentRequired1 = $("#equipmentRequired1").val();

        if (equipmentRequired1 == "" ){
            alert("Fill all the required fields!");
            return false;
        } 

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-equipment-category.php",
            data: equipmentFormData + "&ajax=true",
            success:function(data){
                alert("Edited Successfully!");
            }
        });

    });

    $(document).on("click","#delete-equipment-category", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this equipment category?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-equipment-category.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchEquipmentCategoryTable();
                }
            });
        }

    });

});
