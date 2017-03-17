<?php

function login()
{
	if(isset($_SESSION['USERNAME'])){
		return true;
	}
	else
	{
		return false;
	}
	
}

function refresh($url)
{
	echo '<meta http-equiv="refresh" content="0;URL='.$url.'" />';
}
?>