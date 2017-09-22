<?php
/********************************************************************************
* This script is brought to you by Vasplus Programming Blog.
* Website: www.vasplus.info
* Email: info@vasplus.info
*********************************************************************************/

include "config.php"; //Database Connection

if(isset($_POST['vpv_search_box']) && !empty($_POST['vpv_search_box']))
{
	$search_term = strip_tags($_POST['vpv_search_box']);
	
	$search_for_people = mysql_query("select * from `auto_search_people` where `username` like '%".mysql_real_escape_string($search_term)."%' and `identification` = '".mysql_real_escape_string("normal")."' order by `id` desc limit 4");
	
	if(mysql_num_rows($search_for_people) > 0)
	{
		?>
        <li class="vpb_titles"><span class="text">People</span></li>
        <?php
		while($get_people_found = mysql_fetch_array($search_for_people))
		{
			if(empty($get_people_found['photo']))
			{
				$avatar = 'photos/avatar.gif';
			}
			else
			{
				$avatar = 'photos/'.strip_tags($get_people_found['photo']);
			}
			?>
            
            <li>
                <a href="javascript:void(0);" onclick="clickable('<?php echo strip_tags($get_people_found['id']); ?>','<?php echo strip_tags($get_people_found['username']); ?>','<?php echo strip_tags($get_people_found['fullname']); ?>');">
                
                    <img src="<?php echo $avatar; ?>" width="50" height="50" border="0" />
                    <span class="text"><?php echo strip_tags($get_people_found['fullname']); ?></span>
                    <span class="category"><?php echo strip_tags($get_people_found['location']); ?></span>
                    
                </a>
            </li>
            <?php
		}
		$search_for_pages = mysql_query("select * from `auto_search_people` where `username` like '%".mysql_real_escape_string($search_term)."%' and `identification` = '".mysql_real_escape_string("page")."' order by `id` desc limit 2");
		
		
		if(mysql_num_rows($search_for_pages) > 0)
		{
			?>
            <li class="vpb_titles"><span class="text">Pages</span></li>
            <?php
			while($get_pages_found = mysql_fetch_array($search_for_pages))
			{
				if(empty($get_pages_found['photo']))
				{
					$avatar = 'photos/avatar.gif';
				}
				else
				{
					$avatar = 'photos/'.strip_tags($get_pages_found['photo']);
				}
				?>
				
				<li>
					<a href="javascript:void(0);" onclick="clickable('<?php echo strip_tags($get_pages_found['id']); ?>','<?php echo strip_tags($get_pages_found['username']); ?>','<?php echo strip_tags($get_pages_found['fullname']); ?>');">
                    
						<img src="<?php echo $avatar; ?>" width="50" height="50" border="0" />
						<span class="text"><?php echo strip_tags($get_pages_found['fullname']); ?></span>
						<span class="category"><?php echo strip_tags($get_pages_found['location']); ?></span>
                        
					</a>
				</li>
				<?php
			}
		}
		else
		{
			//Do nothing as our major reason for seaching are people and not pages
		}
		?>
        <li class="more">
             <a href="javascript:void(0);" onclick="alert('This is only a demonstration and so, no link is added to this. Thanks...');">
             
                <span class="text">See more result for <?php echo $search_term; ?> <img src="images/vpb_arrow.png" alt="" border="0"></span>
                <span class="category">Displaying top <?php echo mysql_num_rows($search_for_people)+mysql_num_rows($search_for_pages); ?> results</span>
                
            </a>
        </li>
        <?php
	}
	else
	{
		$search_for_pages = mysql_query("select * from `auto_search_people` where `username` like '%".mysql_real_escape_string($search_term)."%' and `identification` = '".mysql_real_escape_string("page")."' limit 6");
		
		
		if(mysql_num_rows($search_for_pages) > 0)
		{
			?>
            <li class="vpb_titles"><span class="text">Pages</span></li>
            <?php
			while($get_pages_found = mysql_fetch_array($search_for_pages))
			{
				if(empty($get_pages_found['photo']))
				{
					$avatar = 'photos/avatar.gif';
				}
				else
				{
					$avatar = 'photos/'.strip_tags($get_pages_found['photo']);
				}
				?>
				
				<li>
					<a href="javascript:void(0);" onclick="clickable('<?php echo strip_tags($get_pages_found['id']); ?>','<?php echo strip_tags($get_pages_found['username']); ?>','<?php echo strip_tags($get_pages_found['fullname']); ?>');">
                    
						<img src="<?php echo $avatar; ?>" width="50" height="50" border="0" />
						<span class="text"><?php echo strip_tags($get_pages_found['fullname']); ?></span>
						<span class="category"><?php echo strip_tags($get_pages_found['location']); ?></span>
                        
					</a>
				</li>
				<?php
			}
			?>
            <li class="more">
             <a href="javascript:void(0);" onclick="alert('This is only a demonstration and so, no link is added to this. Thanks...');">
             
                <span class="text">See more result for <?php echo $search_term; ?> <img src="images/vpb_arrow.png" alt="" border="0"></span>
                <span class="category">Displaying top <?php echo mysql_num_rows($search_for_pages); ?> results</span>
                
             </a>
            </li>
            <?php
		}
		else
		{
			?>
         	<li class="more">
                <a href="javascript:void(0);">
                    <span class="text">No result found for <?php echo $search_term; ?></span>
                    <span class="category">Please search for others words instead...</span>
                </a>
            </li>
            <?php
		}
	}
}
?>