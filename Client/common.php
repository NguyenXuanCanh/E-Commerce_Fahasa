<?php
function isLogined()
{
	if (empty($_SESSION['userId']))
		return false;
	return true;
}
