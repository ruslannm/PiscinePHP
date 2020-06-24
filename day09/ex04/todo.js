$(document).ready(function () {
    let counter = 0;
    $.ajax({
        url: 'select.php',
        success: function(response) {
            const cooks = JSON.parse(response);
                let tmp;
                for (let i = cooks.length - 1; i >= 0; i--) {
                    cooks[i] = cooks[i] + '';
                    if (cooks[i].length > 0) {
                        tmp = cooks[i].split(',');
                        add(tmp[1], tmp[0]);
                        tmp = tmp[0].split('k');
                        if (counter < parseInt(tmp[1], 10)) {
                            counter = parseInt(tmp[1], 10);
                        }
                    }
                }
        }
    })

    $('#add').click(function () {
        const input = prompt('Enter your task, please');
        if (input != null && input != '') {
            counter++;
            add(input, 'task' + counter);
            $.ajax({
                type: 'GET',
                url: 'insert.php?id=task' + counter + '&value=' + input
            })
        }
    });
});

function add(input, taskId) {
    $('#ft_list').prepend($("<div class='task' id='" + taskId + "' >" + input + "</div>").click(taskId, del));
}

function del(elem) {
    if (confirm('Do you want to remove the task?')){
        let taskId = $(this).attr("id");
        console.log(taskId);
        $.ajax({
            url: 'delete.php?id=' + taskId
        })
        $(this).remove();
    }
}