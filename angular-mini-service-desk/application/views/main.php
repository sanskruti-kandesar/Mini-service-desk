<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.min.js"></script>
    <script src="scripts/script.js"></script>

    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<table style="font-family: Arial">
    <tr>
        <td colspan="2" class="header">
            <h1>
                WebSite Header
            </h1>
        </td>
    </tr>
    <tr>
        <td class="leftMenu">
            <a href="#/home">Home</a>


            <a href="#/students">Students</a>
        </td>
        <td class="mainContent">
            <ng-view></ng-view>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="footer">
            <b>Website Footer</b>
        </td>
    </tr>
</table>
</body>
</html>