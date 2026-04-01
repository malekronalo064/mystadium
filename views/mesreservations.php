<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/footer.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/mesreservations.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"/>

    <title>MyStadium</title>
    
</head>

    <body>
    <style>
body {    
    background-image: linear-gradient(rgba(0,0,0,0.60), rgba(0,0,0,0.60)),url('../public/img/signupbackground1.jpg');
    background-size: cover;
    background-position: center;  
}  
</style>
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/MyStadium/views/header.php"); ?>


      <?php


include("../bdd/config.php");

if(isset($_SESSION['user'])){
     
      $query = 'SELECT * from reservation';

      if($_SESSION['user']=='utilisateur'){
          $query = 'SELECT * from reservation where res_user='. $_SESSION['user']['id'];
      }
      $results = $pdo->query($query);
      $result = $results->fetchAll();
}    
       ?>

<table>
  <tr>
    <th>Name</th>
    <th>Date debut </th>
    <th>Date fin </th>
    <th>Terrain</th>
    <th>Prix / €</th>
  </tr>

  <?php foreach($result as $key => $val){?>
  <tr>
    <td><?php echo $val['res_name'] ?></td>
    <td><?php echo $val['res_date_debut'] ?></td>
    <td><?php echo $val['res_date_fin'] ?></td>
    <td><?php echo $val['id_1'] ?></td>
    <td><?php echo $val['res_prix'] ?></td>

  </tr>

  <?php } 
  ?>

</table>


  <?php include($_SERVER['DOCUMENT_ROOT'] . "/MyStadium/views/footer.php"); ?>
</body>
</html>