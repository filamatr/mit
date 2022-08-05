<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Baccalauréat</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 
   <div class="container">
    <div class="row mt-5">
       <table class="table table-bordered">
         <thead>
            <tr>
               <th>Num</th>
               <th>Nom et prénoms</th>
               <th>Annee</th>
            </tr>
         </thead>
         <tbody>
            <?php if($bacs): ?>
            <?php foreach($bacs as $bac): ?>
            <tr>
               <td><?php echo $bac['num_bacc']; ?></td>
               <td><?php echo $bac['nom_prenoms']; ?></td>
               <td><?php echo $bac['annee']; ?></td>
            </tr>
           <?php endforeach; ?>
           <?php endif; ?>
         </tbody>
       </table>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <?php if ($pager) :?>
              <?php $pagi_path='bac'; ?>
              <?php $pager->setPath($pagi_path); ?>
              <?= $pager->links() ?>
              <?php endif ?>        
             </div> 
          </div>
        </div>
    </div>
  </div>
</div> 
</body>
</html>