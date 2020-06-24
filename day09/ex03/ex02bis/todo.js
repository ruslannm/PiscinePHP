$(document).ready(function () {
    let counter = 0;
    if (document.cookie && document.cookie != '') {
        const cooks = document.cookie.split('; ');
        let tmp;
        for (let i = cooks.length - 1; i >= 0; i--) {
            tmp = cooks[i].split('=');
            add(tmp[1], tmp[0]);
            tmp = tmp[0].split('k');
            if (counter < parseInt(tmp[1], 10)) {
                counter = parseInt(tmp[1], 10);
            }
        }
    }

    $('#add').click(function () {
        const input = prompt('Enter your task, please');
        if (input != null && input != '') {
            counter++;
            add(input, 'task' + counter);
            document.cookie = 'task' + counter + '=' + input + ';';
        }
    });
});

function add(input, taskId) {
    $('#ft_list').prepend($("<div class='task' id='" + taskId + "' >" + input + "</div>").click(taskId, del));
}

function del(elem) {
    if (confirm('Do you want to remove the task?')){
        let taskId = $(this).attr("id");
        document.cookie = taskId + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
        $(this).remove();
    }
}