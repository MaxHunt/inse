<!DOCTYPE html>
<?php
include('header.php');
?>
		<header>			
			<h1><a href='wbt.php'>Work BreakDown Tree</a></h1>
		</header>
		<section class="main">
<div class="tree">
	<ul>
		<li>
			<a href="#">Cat Top</a>
			<ul>
				<li>
					<a href="#">Cat 1</a>
					<ul>
						<li>
							<a href="#">Cat 1.1</a>						
							<ul>
								<li>
									<a href="#">Cat 1.1.1</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Cat 1.2</a>
							<ul>
								<li>
									<a href="#">Cat 1.2.1</a>
								</li>
								<li>
									<a href="#">Cat 1.2.2</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Cat 2</a>
					<ul>
						<li><a href="#">Cat 2.1</a></li>
						<li>
							<a href="#">Cat 2.2</a>
							<ul>
								<li>
									<a href="#">Cat 2.1.1</a>
								</li>
								<li>
									<a href="#">Cat 2.1.2</a>
								</li>
								<li>
									<a href="#">Cat 2.1.3</a>
									<ul>
										<li>
											<a href="#">Cat 2.1.3.1</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#">Cat 2.3</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>
		</section>
<!DOCTYPE html>
<?php
include('footer.php');
?>