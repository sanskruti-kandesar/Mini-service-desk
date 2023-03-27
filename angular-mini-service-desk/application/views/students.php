<!-- <html lang="en">
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
<body ng-app="myapp"> -->
 <div ng-controller='studentData' ng-init="getStudents()">
    {{ error }}<br><br>
    <table border='1' style='border-collapse: collapse;'>
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
    <tr ng-repeat='student in students'>
       <td>{{ student.student_id }}</td>
       <td>{{ student.student_name }}</td>
     </tr>
    </tbody>
  </table>
 </div>

<!-- </body>
</html> -->