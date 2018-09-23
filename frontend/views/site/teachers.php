<?php

use yii\helpers\Html;

?>


<div class="container">
<section id="whitespace">
    <h1>Викладачі кафедри IСПР</h1>
    <h3>Кафедра інтелектуальних систем прийняття рішень</h3>
    <br>

<?php foreach($teachers as $k): ?>
  <div class="col-lg-4">
      <div class="team">
            <div class="hatpic">
            <?php if($k->image): ?>
                <img src="/teachers/<?= $k->image?>" width="100%" height="100%" alt="фото"/>
                <?php endif; ?>
            </div>
            <div class="topic">
            
                <p><?= $k->Teacher_FIO ?></p>
                <?php if($k->fixationByRankTeacher->ranks->Rank_name != NULL): ?>
                <span class="ranks"><?= $k->fixationByRankTeacher->ranks->Rank_name ?><br></span> 
                <?php else: ?>
                <span> &mdash; </span> <br>
                <?php endif ?>  
                <a href="#"><?= $k->fixationByPositionTeacher->pos->Position_name ?></a>
              
          </div>
      </div></div>
      <?php endforeach?>

    
</section>
</div>
