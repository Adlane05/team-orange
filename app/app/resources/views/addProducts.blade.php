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
        <header style="color:white;  display:flex; justify-content:space-between; ">
            <img src="/images/logo.png" style="height:50px; padding:15px">
                <div>
                        <label for="productName" style="display: block; width: 100%; text-align: center; font-size:20px">Product Name</label>
                        <input type="text" id="productName" name="productName" autocomplete="off" style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:24px;">
                </div>
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

    <div style="height:10%"></div>

    <div style="text-align:center;">
        <button type="submit" form="create" style="border-radius:25px; font-size:40px; height:6vh; width:12vw; background-color:red; color:white; font-weight:bold;">
            Submit
        </button>
        @if($errors->has('productName'))
            <p style="height:1vh;">{{$errors->first('productName')}}</p>
        @elseif($errors->has('productCode'))
            <p style="height:1vh;">{{$errors->first('productCode')}}</p>
        @elseif($errors->has('category'))
            <p style="height:1vh;">{{$errors->first('category')}}</p>
        @elseif($errors->has('tag.0'))
            <p style="height:1vh;">{{$errors->first('tag.0')}}</p>
        @elseif($errors->has('tag.1'))
            <p style="height:1vh;">{{$errors->first('tag.1')}}</p>
        @elseif($errors->has('tag.2'))
            <p style="height:1vh;">{{$errors->first('tag.2')}}</p>
        @else
            <p style="height:1vh;"></p>
        @endif
    </div>


    <div style="height:60%; margin-left:15vw; margin-right:15vw; text-align:left; padding-top:3vh;">
        <form action="" method="POST" id="create">
            @csrf

            <div style="display:flex; justify-content:center;">

            <div style="width:min-content;">
                    <div style="width: fit-content;">
                        <label for="productName" style="display: block; width: 100%; text-align: center; font-size:20px">Product Name</label>
                        <input type="text" id="productName" name="productName" autocomplete="off" style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:24px;">
                    </div>

                    <div style="height:15vh"></div>

                    <div style="width: fit-content; margin-top:10%">
                        <label for="tag1" style="display: block; width: 100%; text-align: center; font-size:20px">Tag</label>
                        <select id="tag1" name="tag[]" style="border-radius:15px; border:3px solid black; height:6vh; width:14vw; padding:10px;">
                            <option value="none" selected disabled hidden></option>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->tag_id }}">{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="width:10%"></div>

                <div style="width:min-content;">
                    <div style="width: fit-content; margin-top:15vh">
                    <label for="category" style="display: block; width: 100%; text-align: center; font-size:20px">Category</label>
                        <select id="category" name="category" style="border-radius:15px; border:3px solid black; height:6vh; width:14vw; padding:10px;">
                            <option value="none" selected disabled hidden></option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="height:15vh"></div>

                    <div style="width: fit-content; margin-top:10%">
                        <label for="tag2" style="display: block; width: 100%; text-align: center; font-size:20px">Tag</label>
                        <select id="tag2" name="tag[]" style="border-radius:15px; border:3px solid black; height:6vh; width:14vw; padding:10px;">
                            <option value="none" selected disabled hidden></option>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->tag_id }}">{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="width:10%"></div>

                <div style="width:min-content;">
                    <div style="width: fit-content;">
                        <label for="productCode" style="display: block; width: 100%; text-align: center; font-size:20px">Product Code</label>
                        <input type="text" id="productCode" name="productCode" autocomplete="off" style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:24px;">
                    </div>

                    <div style="height:15vh"></div>

                    <div style="width: fit-content; margin-top:10%">
                        <label for="tag3" style="display: block; width: 100%; text-align: center; font-size:20px">Tag</label>
                        <select id="tag3" name="tag[]" style="border-radius:15px; border:3px solid black; height:6vh; width:14vw; padding:10px;">
                            <option value="none" selected disabled hidden></option>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->tag_id }}">{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div> 
        </form>
    </div>
</body>