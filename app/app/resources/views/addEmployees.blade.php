<!DOCTYPE html>
<html lang="en" style="height:100%; width:100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
</head>
<body style="margin:0px; height:100%; width:100%; background-color:#d9d9d9; font-family: Helvetica, Sans-Serif;">

<div style="background-color:black; padding:10px;">
        <header style="color:white;  display:flex; justify-content:space-between; align-items:center">
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
    <div style="height:40%; background-color:black;"></div>


    <div style="text-align:center; width:60%; margin-left:20%; margin-right:20%; margin-top:5vh;">
        <div style="padding-left:2vw;">
            <form id="createUser" action="" method="POST"> 
            @csrf
                <label for="employeeID" style="font-size:40px">Employee ID</label> <br>
                <input type="text" name="employeeID" id="employeeID" autocomplete="off" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" style="border-radius:15px; border:3px solid black; height:3vh; width:14vw; padding:10px; font-size:24px;">
                @if($errors->has('employeeID'))
                    <p style="height:1vh;">{{$errors->first('employeeID')}}</p>
                @else
                <p style="height:1vh;"></p>
                @endif
                <label for="username" style="font-size:40px">Employee Name</label> <br>
                <input type="text" name="username" id="username" autocomplete="off" style="border-radius:15px; border:3px solid black; height:3vh; width:14vw; padding:10px; font-size:24px;">
                @if($errors->has('username'))
                    <p style="height:1vh;">{{$errors->first('username')}}</p>
                @else
                <p style="height:1vh;"></p>
                @endif
                <label for="password" style="font-size:40px">Password</label> <br>
                <input type="text" name="password" id="password" autocomplete="off" style="border-radius:15px; border:3px solid black; height:3vh; width:14vw; padding:10px; font-size:24px;">
                <br></br>
                <label for="role" style="display: block; width: 100%; text-align: center; font-size:20px">Role</label>
                <select id="role" name="role" style="border-radius:15px; border:3px solid black; height:4vh; width:14vw; padding:10px;">
                    <option value="none" selected disabled hidden></option>
                    <option value="employee">Employee</option>
                    <option value="manager"/>Manager</option>
                </select>
                <br>
                <button type="submit" form="createUser" style="border-radius:25px; font-size:40px; height:6vh; width:15vw; margin-top: 2vh; background-color:red; color:white; font-weight:bold">
                    Add User
                </button>
            </form>
        </div>
    </main>

</div>

</body>
</head>