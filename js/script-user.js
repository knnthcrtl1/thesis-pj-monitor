

jQuery(document).ready(function($) {


    $(document).on("click","#submit-change-password-form", function(e) {

        e.preventDefault();
        var changePassFormData = $("#change-password-form").serialize();
        var equipmentRequired1 = $("#equipmentRequired1").val();
        var equipmentRequired2 = $("#equipmentRequired2").val();
        var id = $('#equipmentRequired3').val();

        if(equipmentRequired1.length <= 6){ // checks the password value length
            alert('Password must be greater than 6 characters');
            return false;
        }

        if (equipmentRequired1 == ""  || equipmentRequired2 == ""){
            alert("Fill all the required fields!");
            return false;
        } 
       
        if(equipmentRequired1 !== equipmentRequired2){
            alert('Password and retype password are not the same');
            return false;
        }


        jQuery.ajax({
            method: "POST",
            url: "./functions/function-user.php",
            data: changePassFormData + `&ajax=true&id=${id}`,
            success:function(data){
                alert("Password Updated Successfully!");
            }
        });


    });

});