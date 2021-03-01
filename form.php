<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <title>Document</title>

  <title>Document</title>
  <style>
    th,
    td,
    table {
      padding: 15px;
      text-align: left;
      background-color: #84a9ac;
      border: 2px solid black;
      padding: 20px;

    }

    table {
      border-collapse: collapse;
      margin-left: auto;
      margin-right: auto;
    }

    h1 {
      text-align: center;
    }

    body {
      background-color: #e7dfd5;

    }

    #backbtn {
      text-decoration: none;
      border-radius: 5px;
      border: 2px solid purple;
      padding: 5px;
    }

    #backbtn:hover {
      text-decoration: none;
      background-color: purple;
      color: white;
      border-radius: 5px;
      border: 2px solid purple;
      padding: 5px;
    }
  </style>
</head>

<body>
  <!-- form -->


  <div class="container ">
    <form method="POST" >
      <div class="form-group">
        <label for=""><h3>First Name</h3></label>
        <input type="text" name="fname" required class="form-control">


      </div>

      <div class="form-group">
        <label for=""><h3>Last Name</h3></label>
        <input type="text" name="lname" required class="form-control">

      </div>
      <div class="form-group">
        <label for=""><h3>Age</h3></label>

        <input type="number" name="age" required min="0" class="form-control">

      </div>
      <div class="form-group">
        <label for=""><h3>City</h3></label>

        <input type="text" name="city" required class="form-control">

      </div>

      <button type="submit" name="submit" class="btn btn-primary mx-auto d-block">Submit</button>
      


    </form>

  </div>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myfname = $_REQUEST['fname'];
    $mylname = $_REQUEST['lname'];
    $myage = $_REQUEST['age'];
    $mycity = $_REQUEST['city'];
   

    //connection
    $myconn  = mysqli_connect('127.0.0.1', 'root', '', 'smit_dodiya') or die("Error");
    //insert
    $insert = "INSERT INTO users(first_name,last_name,age,city)
                   VALUES('$myfname','$mylname','$myage','$mycity')";



    $rows = mysqli_query($myconn, $insert) or die("Error while inserting values");
    echo ("</br>Send sucessfully");

    //close 
    mysqli_close($myconn);
  }

  ?>





  <!-- display form -->
  <h1 class="mt-5"  >Details</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>City</th>
       

      </tr>
    </thead>
    <tbody>

      <?php
      $myconn1  = mysqli_connect('127.0.0.1', 'root', '', 'smit_dodiya') or die("Error");
      $select = "Select * from users";
      $result = mysqli_query($myconn1, $select) or die("Error");
      while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo "<td>{$row['user_id']}</td>";
        echo "<td>{$row['first_name']}</td>";
        echo "<td>{$row['last_name']}</td>";
        echo "<td>{$row['age']}</td>";
        echo "<td>{$row['city']}</td>";
        echo '</tr>';
      }
      mysqli_close($myconn1);

      ?>

    </tbody>
  </table>
 
</body>

</html>