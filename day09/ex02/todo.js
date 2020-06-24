const button = document.getElementById('add');
const list = document.getElementById('ft_list');
let counter = 0;

window.onload = function(){
    if (document.cookie && document.cookie != ''){
        const cooks = document.cookie.split('; ');
        let tmp;
        for (let i = cooks.length - 1; i >=0; i--){
            tmp = cooks[i].split('=');
            add(tmp[1], tmp[0]);
            tmp = tmp[0].split('k');
            if (counter < parseInt(tmp[1], 10)) {
                counter = parseInt(tmp[1], 10);
            }
        }
    }
}

button.addEventListener('click', function () {
    const input = prompt('Enter your task, please');
    if (input != null && input != ''){
        counter++;
        add(input, 'task' + counter);
        document.cookie = 'task' + counter + '=' + input + ';';
    }
})

function add(input, taskId) {
    const div=document.createElement('div');
    div.setAttribute('class', 'task');
    div.setAttribute('id', taskId);
    div.setAttribute('onclick', "del('" + taskId + "');");
    const text=document.createTextNode(input);
    div.appendChild(text);
    list.insertBefore(div, list.firstChild);
}

function del(taskId) {
    if (confirm('Do you want to remove the task?')){
        const div = document.getElementById(taskId);
        document.cookie = taskId + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
        list.removeChild(div);
    }
}