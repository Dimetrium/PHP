<?php
require_once 'config.php';
require_once LIB;

$echo='';
if ( isset($_POST['submit'])) 
{

	if ( uploadFile() )
	{
		$echo.=SUCCESS.'<br>';

	}
	else
	{
		$echo.=FAIL.'<br>';
	}
}	
else
{
	if ( isset($_REQUEST['delete'])) 
	{
		if ($_REQUEST['delete']=='success')
		{
			$echo.=DELETED.'<br>';
		}
		elseif ($_REQUEST['delete']=='fail')
		{
			$echo.=ER_DEL.'<br>';
		}
		elseif(deleteFile($_REQUEST['delete']))
		{
			header ("Location: index.php?delete=success");
			exit();
		}
		else
		{
			header ("Location: index.php?delete=fail");
			exit();
		}
	}
}	
$files=genreTable();


if (isset($files))
{
	if (count($files)!=0)
	{
		$echo="
			<table>
			<tr>
			<td>N</td>
			<td width='60'>Name</td>
			<td width='40'>Size</td>
			<td width='40'></td>
			</tr>
			";
		$i=1;

		foreach ($files as $key=>$value)
		{
			$echo.="<tr><td>
				$i
				</td><td>
				$key
				</td><td>
				$value
				</td><td><a href='index.php?delete=".$i."'>
				delete
				</a></td><td>
				</tr>";
			$i++;
		}

	}
	else
	{
		$echo.=NO_FILES;
	}
}
else
{
	$echo.=NO_FILES;
}

require_once TEMPLATE;
?>