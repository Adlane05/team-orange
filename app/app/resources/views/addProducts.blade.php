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

    <div style="height:10%"></div>

    <div style="text-align:center;">
        <button type="submit" form="create" style="border-radius:25px; font-size:40px; height:6vh; width:12vw; background-color:red; color:white; font-weight:bold;">
            Submit      <!--    THIS FORM DOES NOT HAVE IMPLEMENTED FUNCTIONALITY, NO POST REQUEST HANDLING MADE YET    -->
        </button>
    </div>


    <div style="height:60%; margin-left:15vw; margin-right:15vw; text-align:left; padding-top:3vh;">
        <form action="" method="POST" id="create">
            <div style="display:flex; justify-content:center;">
                
            <div style="width:min-content;">
                    <div style="width: fit-content;">
                        <label for="productName" style="display: block; width: 100%; text-align: center; font-size:20px">Product Name</label>
                        <input type="text" id="productName" name="productName" style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:24px;">
                    </div>

                    <div style="height:15vh"></div>

                    <div style="width: fit-content; margin-top:10%">
                        <label for="tag1" style="display: block; width: 100%; text-align: center; font-size:20px">Tag</label>
                        <select id="tag1" name="tag1" style="border-radius:15px; border:3px solid black; height:6vh; width:14vw; padding:10px;">
                            <option value="none" selected disabled hidden></option>
                            @foreach ($tags as $tag)
                            <option value="option{{ $tag->tag_id }}">{{$tag->tag_name}}</option>
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
                            <option value="option{{ $category->category_id }}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="height:15vh"></div>

                    <div style="width: fit-content; margin-top:10%">
                        <label for="tag2" style="display: block; width: 100%; text-align: center; font-size:20px">Tag</label>
                        <select id="tag2" name="tag2" style="border-radius:15px; border:3px solid black; height:6vh; width:14vw; padding:10px;">
                            <option value="none" selected disabled hidden></option>
                            @foreach ($tags as $tag)
                            <option value="option{{ $tag->tag_id }}">{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="width:10%"></div>

                <div style="width:min-content;">
                    <div style="width: fit-content;">
                        <label for="productCode" style="display: block; width: 100%; text-align: center; font-size:20px">Product Code</label>
                        <input type="text" id="productCode" name="productCode" style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:24px;">
                    </div>

                    <div style="height:15vh"></div>

                    <div style="width: fit-content; margin-top:10%">
                        <label for="tag3" style="display: block; width: 100%; text-align: center; font-size:20px">Tag</label>
                        <select id="tag3" name="tag3" style="border-radius:15px; border:3px solid black; height:6vh; width:14vw; padding:10px;">
                            <option value="none" selected disabled hidden></option>
                            @foreach ($tags as $tag)
                            <option value="option{{ $tag->tag_id }}">{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div> 
        </form>
    </div>




    

    <div style="text-align:center;">
        <a href="/managers/create/others" style="text-decoration:none; color:red; font-size:30px; font-weight:bold;">Add something else?<a>
    </div>