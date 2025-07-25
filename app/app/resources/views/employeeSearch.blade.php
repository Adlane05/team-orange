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
                <div>
                        <label for="productName" style="display: block; width: 100%; text-align: center; font-size:20px">Product Name</label>
                        <input type="text" id="productName" name="productName" autocomplete="off" style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:24px;">
                </div>
            <button style="padding-right:30px; font-size:40px; font-weight:bold; color:white; background-color:black; border:none;">FR</button>
        </header>
    </div>

<nav id="sidebar" style="width: 200px; background-color: black; color: white; height: 100%; padding-top: 20px; position: relative; float: left;">
<ul style="padding: 0; margin: 0; list-style-type: none;">
        <a href="/login">
            <li>
                <span>Logout</span>
            </li>
        </a>
    </ul>
  </nav>

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