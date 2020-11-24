
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
    
    
});
