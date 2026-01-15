<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .todo-container {
            background: white;
            padding: 20px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        input {
            width: 80%;
            padding: 10px;
        }

        button {
            padding: 10px;
            border: none;
            background: #28a745;
            color: white;
            cursor: pointer;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #f4f4f4;
            padding: 10px;
            margin-top: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .delete {
            background: red;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
        }

        .done {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>
<body>

<div class="todo-container">
    <h2>To-Do List</h2>
    <input type="text" id="taskInput" placeholder="Enter task">
    <button onclick="addTask()">Add</button>

    <ul id="taskList"></ul>
</div>

<script>
let tasks = JSON.parse(localStorage.getItem("tasks")) || [];

function showTasks() {
    let list = document.getElementById("taskList");
    list.innerHTML = "";
    tasks.forEach((task, index) => {
        let li = document.createElement("li");
        li.innerHTML = `
            <span onclick="toggleTask(${index})" class="${task.done ? 'done' : ''}">
                ${task.text}
            </span>
            <button class="delete" onclick="deleteTask(${index})">X</button>
        `;
        list.appendChild(li);
    });
}

function addTask() {
    let input = document.getElementById("taskInput");
    if (input.value === "") return;

    tasks.push({ text: input.value, done: false });
    localStorage.setItem("tasks", JSON.stringify(tasks));
    input.value = "";
    showTasks();
}

function deleteTask(index) {
    tasks.splice(index, 1);
    localStorage.setItem("tasks", JSON.stringify(tasks));
    showTasks();
}

function toggleTask(index) {
    tasks[index].done = !tasks[index].done;
    localStorage.setItem("tasks", JSON.stringify(tasks));
    showTasks();
}

showTasks();
</script>

</body>
</html>
