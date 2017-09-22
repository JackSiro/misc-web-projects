<?php include "templates/include/header.php" ?>
	<div id="content">
   	  
		<div style="height:32px"></div>
		<h1>Schools Online List.</h1>
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		<table class="tt_tb" border='1' style="border:1px solid #a46738;">
        <tr class="tt_tr">
          <th>School Name</th>
          <th>County</th>
          <th>Sub-county</th>
          <th>Location</th>
          <th>Code</th>
          <th>Created</th>
          <th>Action</th>
        </tr>
		
<?php foreach ( $results['schools'] as $school ) { ?>
 
        <tr onclick="location='admin.php?school=<?php echo $school->code?>'">
          <td><?php echo $school->schoolname ?></td>
		  <td><?php echo $school->county?></td>
		  <td><?php echo $school->subcounty?></td>
		  <td><?php echo $school->location?></td>
		  <td><?php echo $school->code?></td>
		  <td><?php echo date('j/m/Y', $school->created)?></td>
		 <td><a href="admin.php?action=editSchool&amp;code=<?php echo $school->code?>">Edit School</a></td>		  
        </tr>

<?php } ?>

      </table>
		<div style="clear: both; height: 30px;"></div>
    <a href="admin.php?action=newSchool"><h1>Add a new School</h1></a>
	<br>
    </div>
    <div style="height:5px"></div>
  <?php include "templates/include/footer.php" ?>