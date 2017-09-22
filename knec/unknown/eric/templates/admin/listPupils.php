<?php include "templates/include/header.php" ?>
	<div id="content">
   	  
		<div style="height:32px"></div>
		<h1>Pupils in session at <?php echo htmlspecialchars( $results['school']->schoolname )?>.</h1>
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		<table class="tt_tb" border='1' style="border:1px solid #a46738;">
        <tr class="tt_tr">
		<th>Rank</th>
		<th>Sch.Code</th>
          <th>Full Names</th>
          <th>Adm No</th>
          <th>Class</th>
          <th>Term</th>
          <th>Sex</th>
          <th>Mat</th>
          <th>Eng</th>
          <th>Kis</th>
          <th>Sci</th>
          <th>S/S</th>
          <th>CRE</th>
          <th>AVG</th>
          <th>TOTAL</th>
          <th>Joined</th>
        </tr>
<?php $i =1; ?>		
<?php foreach ( $results['pupils'] as $pupil ) { ?>

        <tr onclick="location='admin.php?action=putMarks&amp;admno=<?php echo $pupil->admno?>&amp;school=<?php echo $_GET['school']?>'">
          <td><?php echo $i++ ?></td>
		  <td><?php echo $pupil->code?></td>
		  <td><?php echo $pupil->firstname.' '.$pupil->secondname ?></td>
		  <td><?php echo $pupil->admno?></td>
		  <td><?php echo $pupil->pclass?></td>
		  <td><?php echo $pupil->pterm?></td>
		  <td><?php echo $pupil->sex?></td>
		  <td><?php echo $pupil->math?></td>
		  <td><?php echo $pupil->eng?></td>
		  <td><?php echo $pupil->kisw?></td>
		  <td><?php echo $pupil->sci?></td>
		  <td><?php echo $pupil->sos?></td>
		  <td><?php echo $pupil->cre?></td>
		  <td><?php echo $pupil->avrg?></td>
		  <td><?php echo $pupil->tot?></td>
		  <td><?php echo date('j/m/Y', $pupil->joined)?></td>  
        </tr>

<?php } ?>

      </table>
		<div style="clear: both; height: 30px;"></div>
    <a href="admin.php?action=newPupil&amp;school=<?php echo $_GET['school']?>"><h1>Add a new Pupil</h1></a>
	<br>
    </div>
    <div style="height:5px"></div>
  <?php include "templates/include/footer.php" ?>