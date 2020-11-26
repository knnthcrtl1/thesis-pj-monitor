
$(document).ready(function() {

    const fetchnotificationTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_notification_tables.php",
            data:{},
            success:function(data){
                $("#notificationTable table tbody").html(data);
                $('#notificationDataTable').DataTable( );
            }
        });
    }

    fetchnotificationTable();
    
    
});
