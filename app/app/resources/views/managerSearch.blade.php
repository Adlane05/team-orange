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
        <header style="color:white;  display:flex; justify-content:space-between; align-items:center">
            <img src="/images/logo.png" style="height:50px; padding:15px">
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
                    <td style="width:3vw; text-align:left">
                        <a>     <!-- MAKE THIS REDIRECT TO THE "ADD PRODUCT" PAGE WHENEVER THAT GETS FINISHED -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                add_circle
                            </span>
                        </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr style="border:1px solid black;">
                    <td style="padding-left:10px; padding:10px; width:10vw">00001</td>
                    <td>Product 1</td>
                    <td>Category</td>
                    <td>Tag, Tag</td>
                    <td style="width:3vw; text-align:left">
                        <a>     <!-- MAKE THIS REDIRECT TO THE "EDIT" PAGE WHENEVER THAT GETS FINISHED -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                edit
                            </span>
                        </a>
                        <a>     <!-- MAKE THIS CALL WHATEVER DELETE FUNCTION I'VE IMPLEMENTED LATER -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="padding-left:10px; padding:10px; width:10vw">00002</td>
                    <td>Product 2</td>
                    <td>Category</td>
                    <td>Tag, Tag</td>
                    <td style="width:3vw; text-align:left">
                        <a>     <!-- MAKE THIS REDIRECT TO THE "EDIT" PAGE WHENEVER THAT GETS FINISHED -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                edit
                            </span>
                        </a>
                        <a>     <!-- MAKE THIS CALL WHATEVER DELETE FUNCTION I'VE IMPLEMENTED LATER -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="padding-left:10px; padding:10px; width:10vw">00003</td>
                    <td>Product 3</td>
                    <td>Category</td>
                    <td>Tag, Tag</td>
                    <td style="width:3vw; text-align:left">
                        <a>     <!-- MAKE THIS REDIRECT TO THE "EDIT" PAGE WHENEVER THAT GETS FINISHED -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                edit
                            </span>
                        </a>
                        <a>     <!-- MAKE THIS CALL WHATEVER DELETE FUNCTION I'VE IMPLEMENTED LATER -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="padding-left:10px; padding:10px; width:10vw">00004</td>
                    <td>Product 4</td>
                    <td>Category</td>
                    <td>Tag, Tag</td>
                    <td style="width:3vw; text-align:left">
                        <a>     <!-- MAKE THIS REDIRECT TO THE "EDIT" PAGE WHENEVER THAT GETS FINISHED -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                edit
                            </span>
                        </a>
                        <a>     <!-- MAKE THIS CALL WHATEVER DELETE FUNCTION I'VE IMPLEMENTED LATER -->
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>