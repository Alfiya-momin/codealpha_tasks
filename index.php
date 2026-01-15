<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Age Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 25px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        input {
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
        }
    </style>
</head>
<body>

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
</script>

</body>
</html>
