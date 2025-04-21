<!DOCTYPE html>
<html lang="en" style="height:100%; width:100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin:0px; height:100%; width:100%; background-color:#d9d9d9; font-family: Helvetica, Sans-Serif;">

<div style="background-color:black; padding:10px;">
        <header style="color:white;  display:flex; justify-content:space-between; align-items:center">
            <img src="/images/logo.png" style="height:50px; padding:15px">
            <button style="padding-right:30px; font-size:40px; font-weight:bold; color:white; background-color:black; border:none;">FR</button>
        </header>
    </div>

    <div style="height:40%; background-color:black;"></div>


    <div style="text-align:center; display:flex; width:60%; margin-left:20%; margin-right:20%; margin-top:5vh;">
        <div style="padding-left:2vw;">
            <form id="createUser" action="" method="POST"> 
                <label for="username" style="font-size:40px">Username</label> <br>
                <input type="text" name="username" id="username" style="border-radius:15px; border:3px solid black; height:3vh; width:14vw; padding:10px; font-size:24px;">
                <button type="submit" form="createUser" style="border-radius:25px; font-size:40px; height:6vh; width:15vw; margin-top: 2vh; background-color:red; color:white; font-weight:bold">
                    Add User
                </button>
            </form>
        </div>

        <div style="width:20vw;"></div>

        <div>
            <form id="createTag" action="" method="POST"> 
                <label for="tag" style="font-size:40px">Tag</label> <br>
                <input type="text" name="tag" id="tag" style="border-radius:15px; border:3px solid black; height:3vh; width:14vw; padding:10px; font-size:24px;">
                <button type="submit" form="createTag" style="border-radius:25px; font-size:40px; height:6vh; width:15vw; margin-top: 2vh; background-color:red; color:white; font-weight:bold">
                    Add Tag
                </button>
            </form>
        </div>

        <div style="width:20vw;"></div>

        <div style="padding-right:2vw;">
            <form id="createCategory" action="" method="POST"> 
                <label for="category" style="font-size:40px">Category</label> <br>
                <input type="text" name="category" id="category" style="border-radius:15px; border:3px solid black; height:3vh; width:14vw; padding:10px; font-size:24px;">
                <button type="submit" form="createCategory" style="border-radius:25px; font-size:40px; height:6vh; width:15vw; margin-top: 2vh; background-color:red; color:white; font-weight:bold">
                    Add Category
                </button>
            </form>
        </div>
    </div>

</div>

</body>
</head>