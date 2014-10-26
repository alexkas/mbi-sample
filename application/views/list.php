<a href="/addresses/add_address" class="btn btn-default pull-right">Add Address</a>
<h1>Address Book</h1>
<hr>

<? if ($this->session->flashdata('message')) { ?>
<div class="alert alert-success"><?=$this->session->flashdata('message')?></div>
<? } ?>

<? if (count($addresses)) { ?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<? foreach ($addresses as $row) { ?>
		<tr>
			<td>
				<a href="/addresses/edit_address/<?=$row['id']?>"><?=$row['last_name']?>, <?=$row['first_name']?></a>
			</td>
			<td><?=$row['address']?></td>
			<td><?=$row['city']?></td>
			<td><?=$row['state']?></td>
			<td><?=$row['zip']?></td>
			<td class="buttons">
				<a href="/addresses/edit_address/<?=$row['id']?>" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
				<a href="/addresses/delete_address/<?=$row['id']?>" class="btn btn-danger btn-xs delete" title="Delete"><i class="fa fa-bomb fa-fw"></i></a>
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>
<? } else { ?>
<div class="alert alert-warning">
	<p>There are no addresses to display!</p>
	<p><a href="/addresses/add_address">Click here</a> to add one.</p>
</div>
<? } ?>

<script type="text/javascript">
$(function() {

	$('a.delete').on('click', function(e) {
		var conf = confirm("Are you sure you want to delete this address?");
		if (!conf) e.preventDefault();
	});

});
</script>