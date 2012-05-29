<?php
# list_navigation
# ---
# the list navigation function allows users move through paginated lists 
# and provides counts with totals

function list_navigation( $listcount, $id=false )
{
	if($listcount == 0)
	{
		return;
	}

	# the id variable allows the function to output an id for
	# pagenavigation on the being invoked in different places on the page
	$begin = false; 
	if( empty($_GET['start']) )
	{
		$_GET['start'] = 0;
		$begin = true;
	}
	
	if( ( $_GET['count'] + $_GET['start'] ) > $listcount )
		 $end = $listcount;
	else
		 $end = $_GET['count'] + $_GET['start'];	
	?>
	<div class="pagenavigation"<?php print $id ? ' id="'.$id.'"' : '' ?>>
	<div class="pagecount">Displaying <?php print $_GET['start'] + 1 ?>-<?php print $end ?> of <?php print $listcount ?></div>
	<div class="pagenav"><?php
	
	$base_url = !empty($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL']: $_SERVER['SCRIPT_NAME'];
	
	if( $_GET['start'] > 1 )
	{
		$prev_start = $_GET['start'] - $_GET['count'];
		if( true )
		{
			$array = array('start'=>$prev_start);
			$get_string = get_string( $array );
			echo "<a href='{$base_url}{$get_string}'>&#171; Prev</a>";
		}
	}
	else
		echo '<span class="deactivated">&#171; Prev </span>';
	
	//added code for page numbers
	$page_count = ceil($listcount / $_GET['count']);
	$new_start = 0; 
	for($i = 1; $i <= $page_count; $i++)
	{
		$array = array('start'=>$new_start);
		$get_string = get_string( $array );
		if ($new_start <= $listcount) 
		{
			echo ' <a href="'.$base_url.$get_string.'">'.$i.'</a> ';
			$new_start = $new_start + $_GET['count'];
		}
	}
		
	if( $_GET['count']+$_GET['start'] < $listcount )
	{
		$next_start = $_GET['count'] + $_GET['start'];
		$array = array( 'start' => $next_start );
		$get_string = get_string( $array );
		echo "<a href='{$get_string}'>Next &#187;</a>";
	}
	else
		echo '<span class="deactivated">Next &#187;</span>';
	
	?></div>
	<div style="clear:both;"></div>
	</div>
	<?php
}
