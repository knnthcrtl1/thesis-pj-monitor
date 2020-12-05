$(document).ready(function() {

    let clientId = $('#projectRequired7').val();

        $('.select2').select2();
    
        $('.select2').select2({
            placeholder: "Select equipment"
        });
      
        $('.select2').on('change', function() {
            var dataId = $(".select2 option:selected").val();
    
            $.ajax({    
                method: "POST",
                url: './search_equipment_id.php',
                data: `id=${dataId}`,
                success:function(data){
                    let result = JSON.parse(data);
                    const {id, price, count,name ,um } = result[0];
                    $('#equipmentRequired1').val(name);
                    $('#equipmentRequired4').val(price);
                    $('#umId').val(um);
                    $('#equipmentStock').val(count);
                    $('#equipmentRequiredId').val(id);
                    $('#equipmentRequired3').removeAttr('disabled')
                }
            });
    
    })
    
        
    const checkNumberNegative = (val) => {
        let value = val <= 0;
        return value;
    }
    
    $(document).on("click","#submit-edit-project-form", function(e) {
        e.preventDefault();
       
        var projectFormData = $("#edit-project-form").serialize();

        var projectRequired1 = $("#projectRequired1").val();
        var projectRequired3 = $("#projectRequired3").val();
        var projectRequired4 = $("#projectRequired4").val();
        var projectRequired5 = $("#projectRequired5").val();
        var projectRequired6 = $("#projectRequired6").val();
        var projectRequired8 = $("#projectRequired8").val();
        var projectRequired9 = $("#projectRequired9").val();
        
        
        var varStartDate = new Date(projectRequired8);
        var varEndDate = new Date(projectRequired9);
        var today = new Date();
        today.setHours(0,0,0,0);

        // let startDate = varStartDate >= today;
        // let endDate = varEndDate >= today;  

        if (varEndDate <= varStartDate) {
            alert("End date should be greater than Start date");
            return false;
        }

        if (projectRequired1 == "" || projectRequired3 == ""  || projectRequired4 == "" || projectRequired5 == "" || projectRequired6 == "" || projectRequired8 == "" || projectRequired9 == "" ){
            alert("Fill all the required fields!");
            return false;
        }
        

        // if(!startDate) {
        //     alert("Start date must be today and up");
        //     return false;
        // }

        // if(!endDate) {
        //     alert("End date must be today and up");
        //     return false;
        // }
        
        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: projectFormData + "&ajax=true",
            success:function(data){
                alert("Edited Successfully!");
            }
        });

    });
    

    // engineerProjectRequired1

    $(document).on("click","#submit-add-engineer-in-project-form", function(e) {
        e.preventDefault();

        var addEngineerProjectForm = $("#add-engineer-in-project-form").serialize();

        var engineerProjectRequired1 = $("#engineerProjectRequired1").val();

        if (engineerProjectRequired1 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: addEngineerProjectForm + "&ajax=true",
            success:function(data){

                if(data == 1){
                    alert("Engineer already exists in project");
                    return false;
                }

                alert("Added Successfully!");
                fetchEngineerInProjectTable();
            }
        });

    });

    
    let projectId = $('#editProjectId').val();

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

    $(document).on("click","#delete-worker-in-project", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this data?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-worker.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchWorkerProjectTable();
                }
            });
        }

    });


    $(document).on("click","#submit-worker-form", function(e) {
        e.preventDefault();

        var addWorkerProjectForm = $("#add-worker-form").serialize();

        var workerRequired1 = $("#workerRequired1").val();
        var workerRequired2 = $("#workerRequired2").val();

        if (workerRequired1 == "" || workerRequired2 == "" ){
            alert("Fill all the required fields!");
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-worker.php",
            data: addWorkerProjectForm + `&ajax=true&projectId=${projectId}`,
            success:function(data){
                alert("Added Successfully!");
                fetchWorkerProjectTable();
            }
        });

    });



    const fetchEngineerInProjectTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_engineer_in_project_tables.php",
            data: `projectId=${projectId}`,
            success:function(data){
                $("#engineerProjectTable table tbody").html(data);

                let totalPrice = document.getElementsByClassName('engineerSalary[]');
                
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

                $('#totalEngineerSalary').html(formatToCurrency(totalValueInColumn))

                $('#engineerProjectDataTable').DataTable( );
            }
        });
    }


    $(document).on("click","#delete-engineer-in-project", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this item?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-engineer-in-project.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchEngineerInProjectTable();
                }
            });
        }

    });

    fetchEngineerInProjectTable();

    // foremanProjectRequired1

    $(document).on("click","#submit-add-foreman-in-project-form", function(e) {
        e.preventDefault();

        var addforemanProjectForm = $("#add-foreman-in-project-form").serialize();

        var foremanProjectRequired1 = $("#foremanProjectRequired1").val();

        // if (foremanProjectRequired1 == "" ){
        //     alert("Fill all the required fields!");
        //     return false;
        // }


        jQuery.ajax({
            method: "POST",
            url: "./functions/function-project.php",
            data: addforemanProjectForm + "&ajax=true",
            success:function(data){
                if(data == 1){
                    alert("foreman already exists in project");
                    return false;
                }
                alert("Added Successfully!");
                fetchforemanInProjectTable();
            }
        });

    });


    const fetchforemanInProjectTable = () => {
        $.ajax({    
            method: "POST",
            url: "./tables/partial_foreman_in_project_tables.php",
            data: `projectId=${projectId}`,
            success:function(data){
                $("#foremanProjectTable table tbody").html(data);

                let totalPrice = document.getElementsByClassName('foremanSalary[]');
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

                $('#totalForemanSalary').html(formatToCurrency(totalValueInColumn))

                $('#equipmentDataTable').DataTable( );

                $('#foremanProjectDataTable').DataTable();
            }
        });
    }



    $(document).on("click","#delete-foreman-in-project", function(e) {
        
        e.preventDefault();
        let deleteId = $(this).attr('delete-id');

        if (confirm("Are you sure you want to delete this item?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-engineer-in-project.php",
                data: `id=${deleteId}`,
                success:function(data){
                    alert('Deleted Successfully');
                    fetchforemanInProjectTable();
                }
            });
        }

    });

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

    $(document).on("click","#submit-equipment-form", function(e) {
        e.preventDefault();

        var equipmentFormData = $("#add-equipment-form").serialize();
        var equipmentRequiredId = $("#equipmentRequiredId").val();
        var equipmentRequired3 = $("#equipmentRequired3").val();
        var equipmentStock = $("#equipmentStock").val();

        let equipId = Number(equipmentRequiredId);
        
        if (equipmentRequiredId == "" || equipmentRequired3 == ""){
            alert("Fill all the required fields and select item on dropdown");
            return false;
        } 

        if(equipmentStock == 0) {
            alert('this item is currently out of stock');
            return false
        }

        if(Number(equipmentRequired3) > Number(equipmentStock)){
            alert('Count/quantity must be lower than the stock');
            return false
        }

        if(checkNumberNegative(Number(equipmentRequired3))) {
            alert('Count or price must be greater than 0');
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-equipment.php",
            data: equipmentFormData + `&ajax=true&equipment-project-id=${projectId}&equipmentRequiredId=${equipId}`,
            success:function(data){
                $('#equipmentRequired1').val("");
                $('#equipmentRequired4').val("");
                $('#umId').val("");
                $('#equipmentStock').val("");
                $('#equipmentRequiredId').val("");
                $('#equipmentRequired3').val('');
                $('#equipmentRequired3').attr('disabled', true);

                alert("Added Successfully!");

                fetchEquipmentTable();
            }
        });

    });


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
        var taskRequired5 = $("#taskRequired5").val();

        var projectRequired8 = $("#projectRequired8").val();
        var projectRequired9 = $("#projectRequired9").val();
        
        if (taskRequired1 == "" || taskRequired2 == "" || taskRequired3 == "" || taskRequired4 == ""|| taskRequired5 == ""){
            alert("Fill all the required fields!");
            return false;
        } 

        var projStartDate = new Date(projectRequired8);
        var projEndDate = new Date(projectRequired9);
        var varStartDate = new Date(taskRequired4);
        var varEndDate = new Date(taskRequired5);

        if (varEndDate <= varStartDate) {
            alert("End date should be greater than Start date");
            return false;
        }

        if (projStartDate > varStartDate ) {
            alert("task date must be within range of project date");
            return false;
        }

        if (projStartDate > varEndDate ) {
            alert("task date must be within range of project date");
            return false;
        }

        if (projEndDate < varStartDate ) {
            alert("task date must be within range of project date");
            return false;
        }

        if (projEndDate < varEndDate ) {
            alert("task date must be within range of project date");
            return false;
        }

        // if (taskDate > varEndDate) {
        //     alert("End date should be less than end date");
        //     return false;
        // }

        jQuery.ajax({
            method: "POST",
            url: "./functions/function-task.php",
            data: taskFormData + `&ajax=true&project-id=${projectId}&clientId=${clientId}`,
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

    $(document).on("click","#delete-task", function(e) {
        
        e.preventDefault();

        let deleteId = $(this).attr('delete-id');


        if (confirm("Are you sure you want to delete this data?")) {
            $.ajax({    
                method: "POST",
                url: "./delete-task.php",
                data: `id=${deleteId}`,
                success:function(data){
                    fetchTasksTodo();
                    fetchTasksDone();
                    fetchTasksInProgress();
                }
            });
        }

    });

    function onSelectProjectStatus(arr) {
        arr.map((val, i) => {
            val.addEventListener("change", function(e) {
                let taskId = this.getAttribute('edit-attr-id');
                let taskStatus = this.value;

                jQuery.ajax({
                    method: "POST",
                    url: "./functions/function-task.php",
                    data: `function-type=update-tasks&ajax=true&project-id=${projectId}&taskId=${taskId}&taskStatus=${taskStatus}&clientId=${clientId}`,
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
