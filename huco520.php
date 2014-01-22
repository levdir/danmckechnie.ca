<?php 
	require 'php/header.php';
?>
<div id="contentwrapper">
	<h2>Special Feature</h2>
	<p>My message board's special feature will be a fluid, multi-platform design that displays beautifully whether you are browsing on a desktop, tablet, phone, or WiFi-enabled potato.</p>
	<p>My <strong>UPDATED SPECIAL FEATURE</strong> will be a simply backend for updating my CV; the CV page on this site is already a php document in anticipation of the development of this feature. I have removed the database schematic since it does not strictly apply to this new spec.</p>
	<hr />
	<h2>Palindrome Script</h2>
	<p>
		<form name="palindrome" action="huco520.php" method="post">
			<table>
				<tr>
					<td class="formlabel"><h3>Enter text to test here:</h3></td>
					<td class="formelement"><input type="text" name="testtext" /></td>
				</tr>
				<tr>
					<td class="formlabel"><input type="hidden" name="submitted" value="submitted" /></td>
					<td class="formelement"><input type="submit" value="Submit" /></td>
				</tr>
			</table>
		</form>
	</p>
	<p>
		<?php
			include("php/palindrome.php");
		?>
	</p>
</div>
<?php 
	require 'php/footer.php';
?>