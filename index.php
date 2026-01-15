<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <title>Age Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
=======
    <title>To-Do List App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
>>>>>>> c21cbf2101da76cf3f926c4a4db79c033df90c99
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

<<<<<<< HEAD
        .container {
            background: white;
            padding: 25px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
=======
        .todo-container {
            background: white;
            padding: 20px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
>>>>>>> c21cbf2101da76cf3f926c4a4db79c033df90c99
            text-align: center;
        }

        input {
<<<<<<< HEAD
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #0056b3;
        }

        .result {
            margin-top: 15px;
            font-weight: bold;
=======
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
>>>>>>> c21cbf2101da76cf3f926c4a4db79c033df90c99
        }
    </style>
</head>
<body>

<<<<<<< HEAD
<div class="container">
    <h2>Age Calculator</h2>
    <input type="date" id="dob">
    <button onclick="calculateAge()">Calculate Age</button>
    <div class="result" id="result"></div>
</div>

<script>
function calculateAge() {
    let dob = document.getElementById("dob").value;
    if (dob === "") {
        document.getElementById("result").innerHTML = "Please select date of birth";
        return;
    }

    let birthDate = new Date(dob);
    let today = new Date();

    let years = today.getFullYear() - birthDate.getFullYear();
    let months = today.getMonth() - birthDate.getMonth();
    let days = today.getDate() - birthDate.getDate();

    if (days < 0) {
        months--;
        days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
    }

    if (months < 0) {
        years--;
        months += 12;
    }

    document.getElementById("result").innerHTML =
        `Age: ${years} Years, ${months} Months, ${days} Days`;
}
=======
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
>>>>>>> c21cbf2101da76cf3f926c4a4db79c033df90c99
</script>

</body>
</html>
