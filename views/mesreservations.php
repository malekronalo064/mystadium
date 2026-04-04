<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/mesreservations.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <title>MyStadium</title>
    <style>body { font-family: 'Roboto', 'Segoe UI', Arial, sans-serif; }</style>
</head>

    <body>
    <!-- Style global géré par index.css -->
    
    <?php include(__DIR__ . "/header.php"); ?>


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

  <?php if (!empty($result) && is_array($result)) {
    foreach($result as $key => $val){?>
  <tr>
    <td><?php echo $val['res_name'] ?></td>
    <td><?php echo $val['res_date_debut'] ?></td>
    <td><?php echo $val['res_date_fin'] ?></td>
    <td><?php echo $val['id_1'] ?></td>
    <td><?php echo $val['res_prix'] ?></td>

  </tr>


    <?php }
  } else {
    echo "<tr><td colspan='5' style='text-align:center;color:#c62828;'>Aucune réservation trouvée.</td></tr>";
  }
  ?>

</table>


  <?php include($_SERVER['DOCUMENT_ROOT'] . "/MyStadium/views/footer.php"); ?>
</body>
</html>