<?php
	require 'php/header.php';
	$pageTitle = "Add or Edit A CV Entry";

	require 'php/library.php';
	MySQLConnection('localhost','dmckechn','7hr58jh5','dmckechn');
	
	$queryCats = "SELECT * FROM categories";
	$returnCats = mysql_query($queryCats);

	$queryEntryList = "SELECT p_id,name,description,date,type,author FROM posts AS cvposts";
	$returnEntryList = mysql_query($queryEntryList);

	$queryExistingCats = "SELECT * FROM categories";
	$returnExistingCats = mysql_query($queryExistingCats);

	$queryDeleteList = "SELECT p_id,name,description,date,type,author FROM posts AS cvdelete";
	$returnDeleteList = mysql_query($queryDeleteList);

	if(isset($_POST['entrysubmitted'])){
		AddEntry($_POST);
	}

	if(isset($_POST['entryupdated'])){
		UpdateEntry($_POST);
	}

	if(isset($_POST['entrydeleted'])){
		DeleteEntry($_POST);
	}
	
?>
<div id="contentwrapper">
	<div id="submit">
		<h2>Add a CV entry</h2>
		<form action="login.php" method="POST" name="formsubmitentry">
			<table>
				<tr>
					<td class="formlabel"><h3>Name</h3></td>
					<td class="formelement"><input type="text" name="name" id="name" /></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Author</h3></td>
					<td class="formelement"><input type="text" name="author" id="author" /></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Date</h3></td>
					<td class="formelement"><input type="date" name="date" /></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Category</h3></td>
					<td class="formelement"><select name="type" id="type" value="Type" size="1">
						<option value="default" id="default" selected disabled></option>
						<option value="addnew" id="addnew">Add new category</option>
						<?php
							FetchList($returnCats,'c_id','kind');
						?>
					</select></td>
				<tr>
					<td class="formlabel"><h3>New Category</h3></td>
					<td class="formelement"><input type="text" name="enternew" id="enternew" /></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Description</h3></td>
					<td class="formelement"><textarea name="description" cols="40" rows="8"/></textarea></td>
				</tr>
				<tr>
					<td class="formlabel"><input type="hidden" name="entrysubmitted" value="entrysubmitted"/></td>
					<td class="formelement"><input type="submit" name="submitentry" value="Submit"/></td>
				</tr>
			</table>
		</form>
	</div>
	<h2>Update Existing Entries</h2>
	<div id="update">
		<form action="login.php" method="POST" name="formupdateentry">
			<table>
				<tr>
					<td class="formlabel"><h3>Select an entry</h3></td>
					<td class="formelement"><select name="entrylist" id="entrylist" size="1">
						<option value="default" id="default" selected disabled>Select an existing entry</option>
						<?php
							FetchList($returnEntryList,'p_id','name');
						?>
					</select></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Name</h3></td>
					<td class="formelement"><input type="text" name="newname" id="name" /></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Author</h3></td>
					<td class="formelement"><input type="text" name="newauthor" id="author" /></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Date</h3></td>
					<td class="formelement"><input type="date" name="newdate" /></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Category</h3></td>
					<td class="formelement"><select name="newtype" id="type" value="Type" size="1">
						<option value="default" id="default" selected disabled></option>
						<?php
							FetchList($returnExistingCats,'c_id','kind');
						?>
					</select></td>
				</tr>
				<tr>
					<td class="formlabel"><h3>Description</h3></td>
					<td class="formelement"><textarea name="newdescription" cols="40" rows="8"/></textarea></td>
				</tr>
				<tr>
					<td class="formlabel"><input type="hidden" name="entryupdated" value="entryupdated"/></td>
					<td class="formelement"><input type="submit" name="updateentry" value="Update"/></td>
				</tr>
			</table>
		</form>
	</div>
	<h2>Delete an Entry</h2>
	<div id="delete">
		<form action="login.php" method="POST" name="formdeleteentry">
			<table>
				<tr>
					<td class="formlabel"><h3>Select an entry</h3></td>
					<td class="formelement"><select name="deletelist" id="deletelist" size="1">
						<option value="default" id="default" selected disabled>Select an existing entry</option>
						<?php
							FetchList($returnDeleteList,'p_id','name');
						?>
					</select></td>
				</tr>
				<tr>
					<td class="formlabel"><input type="hidden" name="entrydeleted" value="entrydeleted"/></td>
					<td class="formelement"><input type="submit" name="deleteentry" value="Delete"/></td>
				</tr>
			</table>
	</div>
</div>
<?php
	require 'php/footer.php';
?>
