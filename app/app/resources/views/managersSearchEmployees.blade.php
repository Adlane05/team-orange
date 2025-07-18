<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <title>Document</title>
    <style>
        tbody tr:nth-child(odd) {
            background-color:#adadad;
        }

        * {
            scrollbar-width:none;
        }

        #sidebar li {
            padding: 10px 20px;
        }

        #sidebar li:hover {
            background-color:#d9d9d9;
            color:black;
        }

        #sidebar a {
            color: white;
            text-decoration: none;
        }
  </style>
    
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const input = document.getElementById("productName");
            const rows = document.querySelectorAll("tbody tr");

            input.addEventListener("input", () => {
                const searchTerm = input.value.toLowerCase();
                rows.forEach(row => {
            const nameCell = row.children[1].textContent.toLowerCase(); // product_name
            const match = nameCell.includes(searchTerm);
            row.style.display = match ? "" : "none";
        });
            })
        })
    </script>
</head>

<body style="margin:0px; height:100%; background-color:#d9d9d9; font-family: Helvetica, Sans-Serif;">

    <div style="background-color:black; padding:10px;">
        <header style="color:white;  display:flex; justify-content:space-between; ">
            <img src="/images/logo.png" style="height:50px; padding:15px">
            <button style="padding-right:30px; font-size:40px; font-weight:bold; color:white; background-color:black; border:none;">FR</button>
        </header>
    </div>

<nav id="sidebar" style="width: 200px; background-color: black; color: white; height: 100%; padding-top: 20px; position: relative; float: left;">
<ul style="padding: 0; margin: 0; list-style-type: none;">
        <a href="/managers/search">
            <li>
                <span>Products<span>
            </li>
        </a>
        <a href="/managers/search/tags">
            <li>
                <span>Tags<span>
            </li>
        </a>
        <a href="/managers/search/categories">
            <li>
                <span>Categories</span>
            </li>
        </a>
        <a href="/managers/search/employees">
            <li>
                <span>Users</span>
            </li>
        </a>
        <a href="/managers/login">
            <li>
                <span>Logout</span>
            </li>
        </a>
    </ul>
  </nav>

<main style="height:100%; margin-left: 200px;">
    
    <div style="height:10%"></div>

    <div style="text-align:center; height:60%; overflow-y:scroll; overflow-x:hidden; scrollbar-width:none; font-weight:bold;">
        <table style="margin-left:auto; margin-right:auto; border-collapse:collapse; width:900px; text-align:left;">
            <thead>
                <tr style="border:1px solid black;">
                    <td style="padding-left:10px; padding:10px; width:10vw">Employee ID</td>
                    <td style="padding-left:10px; padding:10px; width:10vw">Employee Name</td>
                    <td style="padding-left:10px; padding:10px; width:10vw">Employee Role</td>
                    <td style="width:3vw; text-align:left">
                        <a href = "/managers/create/employees">
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; color:black;">
                                add_circle
                            </span>
                        </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($employeeInfo as $employee)
                <tr style="border:1px solid black;">
                <td style="padding-left:10px; padding:10px; width:10vw">{{$employee->employee_id}}</td>
                <td style="padding-left:10px; padding:10px; width:10vw">{{$employee->user_name}}</td>
                <td style="padding-left:10px; padding:10px; width:10vw">{{$employee->role}}</td>
                <form method="POST">
                    @csrf
                    <td style="width:3vw; text-align:left">
                        <button type="submit" name="update" value="{{$employee->employee_id}}" style="all:unset; cursor:pointer">
                            <a>
                                <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                    edit
                                </span>
                            </a>
                        </button>
                        <button type="submit" name="delete" value="{{$employee->employee_id}}" style="all:unset; cursor:pointer">
                            <a>
                                <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                        delete
                                </span>
                            </a>
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
</body>

</html>