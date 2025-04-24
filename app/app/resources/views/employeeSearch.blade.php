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
    </style>
</head>

<body style="margin:0px; height:100%; background-color:#d9d9d9; font-family: Helvetica, Sans-Serif;">

    <div style="background-color:black; padding:10px;">
        <header style="color:white;  display:flex; justify-content:space-between; ">
            <img src="/images/logo.png" style="height:50px; padding:15px">
                <form method="post" id="search">
                    @csrf
                        <label for="productName" style="display: block; width: 100%; text-align: center; font-size:20px">Product Name</label>
                        <input type="text" id="productName" name="productName" style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:24px;">
                        <input type="submit" name="search" hidden/>
                </form>
            <button style="padding-right:30px; font-size:40px; font-weight:bold; color:white; background-color:black; border:none;">FR</button>
        </header>
    </div>

    <div style="height:10%"></div>

    <div style="text-align:center; height:60%; overflow-y:scroll; overflow-x:hidden; scrollbar-width:none; font-weight:bold;">
        <table style="margin-left:auto; margin-right:auto; border-collapse:collapse; width:900px; text-align:left;">
            <thead>
                <tr style="border:1px solid black;">
                    <td style="padding-left:10px; padding:10px; width:10vw">Product Code</td>
                    <td>Product Name</td>
                    <td>Category</td>
                    <td>Tags</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($productInfo as $product)
                <tr style="border:1px solid black;">
                <td style="padding-left:10px; padding:10px; width:10vw">{{$product->product_id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->category_name}}</td>
                <td>{{$product->tags}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>