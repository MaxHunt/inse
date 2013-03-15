<?php
include('header.php');
?>
<section class="main">
	<article>
		Add a record
		<form action="" method="POST">
			Name:<input type="text"/>
			Start Date:<input type="date"/>
			End Date:<input type="date"/>
			Duration:<input type="intger"/>
			Priority:<input type="intger"/>
			ProjectID:<input type="intger"/>
			ParentID:<input type="intger"/>
			<input type='submit' value='Add Record'/>
		</form>
	</article>
	<article>
		Add a Project
		<form action="" method="POST">
			Name:<input type="text"/>
			Creation Date:<input type="date"/>			
			<input type='submit' value='Add Project'/>
		</form>
	</article>
</section>
<?php
include('footer.php');
?>