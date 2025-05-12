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
        <a href="#">
            <li>
                <span>Categories</span>
            </li>
        </a>
        <a href="#">
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


    <div style="text-align:center; display:flex; width:60%; margin-left:20%; margin-right:20%; margin-top:5vh;">
        <div style="width:20vw;"></div>

        <div>
            <form id="updateCategory" action="" method="POST"> 
            @csrf
                <label for="category" style="font-size:40px">Category</label> <br>
                <input type="text" name="category" id="category" autocomplete="off" value="{{$category->category_name}}" style="border-radius:15px; border:3px solid black; height:3vh; width:14vw; padding:10px; font-size:24px;">
                @if($errors->has('category'))
                    <p style="height:1vh;">{{$errors->first('category')}}</p>
                @else
                <p style="height:1vh;"></p>
                @endif
                <button type="submit" form="updateCategory" style="border-radius:25px; font-size:40px; height:6vh; width:15vw; margin-top: 2vh; background-color:red; color:white; font-weight:bold">
                    Update Category
                </button>
                <input type="hidden" value="{{$category->category_id}}" name="originalCategoryCode">
            </form>
        </div>

        <div style="width:20vw;"></div>
    </div>
    </main>

</div>

</body>
</head>