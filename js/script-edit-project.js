$(document).ready(function() {

let projectId = $('#editProjectId').val();

const fetchEngineerInProjectTable = () => {
    $.ajax({    
        method: "POST",
        url: "./tables/partial_engineer_in_project_tables.php",
        data: `projectId=${projectId}`,
        success:function(data){
            $("#engineerProjectTable table tbody").html(data);
            $('#engineerProjectDataTable').DataTable( );
        }
    });
}


fetchEngineerInProjectTable();


const fetchforemanInProjectTable = () => {
    $.ajax({    
        method: "POST",
        url: "./tables/partial_foreman_in_project_tables.php",
        data: `projectId=${projectId}`,
        success:function(data){
            $("#foremanProjectTable table tbody").html(data);
            $('#foremanProjectDataTable').DataTable();
        }
    });
}



fetchforemanInProjectTable();


const fetchEquipmentTable = () => {

    $.ajax({    
        method: "POST",
        url: "./tables/partial_equipment_in_project_tables.php",
        data: `projectId=${projectId}`,
        success:function(data){
            $("#equipmentTable table tbody").html(data);

            let totalPrice = document.getElementsByClassName('equipmentTotalPrice[]');
            let totalPriceArr = [...totalPrice];
            let pushPriceInArr = [];

            totalPriceArr.map((val, i) => {
                pushPriceInArr.push(Number(val.getAttribute('testValue')));
            })

            var totalValueInColumn = pushPriceInArr.reduce(function(a, b){
                return a + b;
            }, 0);

            const formatToCurrency = amount => {
                return "₱ " + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            };
              formatToCurrency(12.34546); //"$12.35"
              formatToCurrency(42345255.356); //"$42,345,255.36

            $('#totalEquipmentPrice').html(formatToCurrency(totalValueInColumn))

            // $('#equipmentDataTable').DataTable( );
            
            // console.log('aw');
        }
    });
}


fetchEquipmentTable();

const fetchTasksInProgress = () => {
    $.ajax({    
        method: "POST",
        url: "./tables/partial_task_inprogress_column.php",
        data: `taskStatus=2&projectId=${projectId}`,
        success:function(data){

            $("#tasksInProgressColumn").html(data);

            let selectProjectStatus = document.getElementsByClassName('select-project-status[]');
            let selectProjectStatusArr = [...selectProjectStatus];
           
            onSelectProjectStatus(selectProjectStatusArr);

        }
    });
}

const fetchTasksTodo = () => {
    $.ajax({    
        method: "POST",
        url: "./tables/partial_task_inprogress_column.php",
        data: `taskStatus=1&projectId=${projectId}`,
        success:function(data){

            $("#tasksTodoColumn").html(data);

            let selectProjectStatus = document.getElementsByClassName('select-project-status[]');
            let selectProjectStatusArr = [...selectProjectStatus];
           
            onSelectProjectStatus(selectProjectStatusArr);

        }
    });
}


const fetchTasksDone = () => {
    $.ajax({    
        method: "POST",
        url: "./tables/partial_task_inprogress_column.php",
        data: `taskStatus=3&projectId=${projectId}`,
        success:function(data){

            $("#tasksDoneColumn").html(data);

            let selectProjectStatus = document.getElementsByClassName('select-project-status[]');
            let selectProjectStatusArr = [...selectProjectStatus];
           
            onSelectProjectStatus(selectProjectStatusArr);

        }
    });
}

fetchTasksTodo();
fetchTasksDone();
fetchTasksInProgress();

$(document).on("click","#submit-tasks-form", function(e) {
    e.preventDefault();

    var taskFormData = $("#add-tasks-form").serialize();

    var taskRequired1 = $("#taskRequired1").val();
    var taskRequired2 = $("#taskRequired2").val();
    var taskRequired3 = $("#taskRequired3").val();
    var taskRequired4 = $("#taskRequired4").val();
    var projectRequired8 = $('#projectRequired8').val();
    var projectRequired9 = $('#projectRequired9').val();
    
    if (taskRequired1 == "" || taskRequired2 == "" || taskRequired3 == "" || taskRequired4 == ""){
        alert("Fill all the required fields!");
        return false;
    } 

    var taskDate = new Date(taskRequired4);
    var varStartDate = new Date(projectRequired8);
    var varEndDate = new Date(projectRequired9);


    if (taskDate < varStartDate) {
        alert("End date should be greater than or equal on the start date");
        return false;
    }

    if (taskDate > varEndDate) {
        alert("End date should be less than end date");
        return false;
    }

    jQuery.ajax({
        method: "POST",
        url: "./functions/function-task.php",
        data: taskFormData + `&ajax=true&project-id=${projectId}`,
        success:function(data){
            alert("Added Successfully!");
            fetchTasksTodo();
            fetchTasksDone();
            fetchTasksInProgress();
        }
    });

});

$(document).on("click","#delete-equipment", function(e) {
    
    e.preventDefault();
    let deleteId = $(this).attr('delete-id');

    alert(deleteId);

    if (confirm("Are you sure you want to delete this equipment?")) {
        $.ajax({    
            method: "POST",
            url: "./delete-equipment-handled-project.php",
            data: `id=${deleteId}`,
            success:function(data){
                alert('Deleted Successfully');
                fetchEquipmentTable();
            }
        });
    }

});

const fetchWorkerProjectTable = () => {
    $.ajax({    
        method: "POST",
        url: "./tables/partial_worker_in_project_tables.php",
        data: `projectId=${projectId}`,
        success:function(data){
            $("#workerTable table tbody").html(data);
            $('#workerDataTable').DataTable( );
        }
    });
}

fetchWorkerProjectTable();

function onSelectProjectStatus(arr) {
    arr.map((val, i) => {
        val.addEventListener("change", function(e) {
            let taskId = this.getAttribute('edit-attr-id');
            let taskStatus = this.value;

            jQuery.ajax({
                method: "POST",
                url: "./functions/function-task.php",
                data: `function-type=update-tasks&ajax=true&project-id=${projectId}&taskId=${taskId}&taskStatus=${taskStatus}`,
                success:function(data){
                    fetchTasksTodo();
                    fetchTasksDone();
                    fetchTasksInProgress();
                }
            });
            
        });
    })
}



});
