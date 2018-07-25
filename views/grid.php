<?php
  use Core\library\Path as Path;
  view('searchBar',['cols'=>$searchCols]);
?>
  <table class="table table-dark" >
  <thead>
    <tr>
    <th scope="col">#</th>
    <?php foreach( $cols as $key=> $val) : ?>
      <th scope="col"><?= $val ?></th>
    <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>   
    <?php foreach( $vals as $key=> $cels): ?>
    <tr>
      <th scope="row"><?= $key + 1 ?></th>
      <?php foreach( $cols as $keyc => $val):  ?>
        <?php if(isset($link) && $keyc ==0 ):?>
        <td><a href="<?= $link ?><?= $cels[$keyc] ?>"><?=$cels[$keyc]?> </a></td>
        <?php else: ?>    
          <td> <?= $val== 'Data Hora' ?  implode('/',array_reverse(explode('-',explode(' ',$cels[$keyc])[0]))).' '. explode(' ',$cels[$keyc])[1] : $cels[$keyc] ?> </td>
        <?php endif; ?>
      <?php endforeach; ?>  
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>
</div>



