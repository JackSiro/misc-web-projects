<?php 
	include AS_THEME."as_header.php";
	$as_elecpost = as_get_option('as_elecpost');
	
	$database = new As_Dbconn();		
	$as_db_query = "SELECT * FROM as_elecpost ORDER BY elecpostid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
	$i = 0;
?>
	<div id="site_content">
	  <div id="content">
        <div>
		<br>
		  <h1>Cast Your Vote</h1> 
          <hr>
			<div class="main_content">
				<input type="hidden" name="allposts" value="<?php echo $database->as_num_rows( $as_db_query ) ?>" />
				<center>
					<div id="start_voting">
						<br>
						<h3>Click here to begin voting. You can only vote once!</h3>
						<a href="javascript:void(0);" onclick="startVoting();" ><img src="as_themes/start.png" /></a>
						<br>
					</div>
				</center>
				<div id="response_gif" style="display:none;">
					<center>
						<div style="background: #000; width:400px;">
						<h3><img src="as_themes/spinning.gif" align="absmiddle" alt="Working ... Patience Pays ..."> Working ... Patience Pays ... <img src="as_themes/spinning.gif" align="absmiddle" alt="Working ... Patience Pays ..."></h3></div>
					</center>
				</div>
		<?php foreach( $results as $row ) { 
			$postid = $row['elecpostid'];
			$post_query = "SELECT * FROM as_candidate WHERE candidate_post=".$postid." ORDER BY candidateid";
			$presults = $database->get_results( $post_query );
			$i = $i + 1; 
		?>
				<form id="Post_<?php echo $i ?>" method="post" style="display:none;">
					<h2><?php echo $i.'. '.$row['elecpost_title'].' ('.$row['elecpost_title'].')' ?></h2>
					<table class="tt_tb">
						<thead>
							<tr class="tt_tr">
								<th>Full Name</th>
								<th>Gender</th>
								<th>Post</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach( $presults as $prow ) { ?>
								<tr>
									<td><label><input type="radio" name="candidate" value="<?php echo $prow['candidateid'] ?>" required style="width:50px;"/> <?php echo $prow['candidate_name'] ?></label></td>
									<td><?php echo as_show_sex($prow['candidate_gender']) ?></td>
									<td><?php echo $row['elecpost_code'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<p style="padding-top: 15px"><span></span><input type="submit" id="submitBtn" onclick="submitVote(<?php echo $i ?>);"  name="VoteNow" value="Submit Vote"></p>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
