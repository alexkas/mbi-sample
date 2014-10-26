<?
$states = array('AL'=>'ALABAMA', 'AK'=>'ALASKA', 'AZ'=>'ARIZONA', 'AR'=>'ARKANSAS', 'CA'=>'CALIFORNIA', 'CO'=>'COLORADO', 'CT'=>'CONNECTICUT', 'DE'=>'DELAWARE', 'DC'=>'DISTRICT OF COLUMBIA', 'FL'=>'FLORIDA', 'GA'=>'GEORGIA', 'HI'=>'HAWAII', 'ID'=>'IDAHO', 'IL'=>'ILLINOIS', 'IN'=>'INDIANA', 'IA'=>'IOWA', 'KS'=>'KANSAS', 'KY'=>'KENTUCKY', 'LA'=>'LOUISIANA', 'ME'=>'MAINE', 'MD'=>'MARYLAND', 'MA'=>'MASSACHUSETTS', 'MI'=>'MICHIGAN', 'MN'=>'MINNESOTA', 'MS'=>'MISSISSIPPI', 'MO'=>'MISSOURI', 'MT'=>'MONTANA', 'NE'=>'NEBRASKA', 'NV'=>'NEVADA', 'NH'=>'NEW HAMPSHIRE', 'NJ'=>'NEW JERSEY', 'NM'=>'NEW MEXICO', 'NY'=>'NEW YORK', 'NC'=>'NORTH CAROLINA', 'ND'=>'NORTH DAKOTA', 'OH'=>'OHIO', 'OK'=>'OKLAHOMA', 'OR'=>'OREGON', 'PA'=>'PENNSYLVANIA', 'PR'=>'PUERTO RICO', 'RI'=>'RHODE ISLAND', 'SC'=>'SOUTH CAROLINA', 'SD'=>'SOUTH DAKOTA', 'TN'=>'TENNESSEE', 'TX'=>'TEXAS', 'UT'=>'UTAH', 'VT'=>'VERMONT', 'VA'=>'VIRGINIA', 'WA'=>'WASHINGTON', 'WV'=>'WEST VIRGINIA', 'WI'=>'WISCONSIN', 'WY'=>'WYOMING');
?>

<h1><?=ucwords(str_replace("_", " ", $this->uri->segment(2)))?></h1>
<hr>
<form method="post">
	<div class="row">
		<div class="col-md-6 form-group">
			<label for="first_name">First Name</label>
			<input type="text" class="form-control" name="first_name" id="first_name" <? if (isset($address)) { ?>value="<?=$address['first_name']?>"<? } ?>>
		</div>
		<div class="col-md-6 form-group">
			<label for="last_name">Last Name</label>
			<input type="text" class="form-control" name="last_name" id="last_name" <? if (isset($address)) { ?>value="<?=$address['last_name']?>"<? } ?>>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" name="address" id="address" <? if (isset($address)) { ?>value="<?=$address['address']?>"<? } ?>>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 form-group">
			<label for="city">City</label>
			<input type="text" class="form-control" name="city" id="city" <? if (isset($address)) { ?>value="<?=$address['city']?>"<? } ?>>
		</div>
		<div class="col-md-4 form-group">
			<label for="state">State</label>
			<select class="form-control" name="state" id="state">
				<option value="">-</option>
				<? foreach ($states as $abbr => $state) {
				 	$selected = (isset($address) && $address['state'] == $abbr) ? 'selected' : ''; ?>
				<option value="<?=$abbr?>" <?=$selected?>><?=ucwords(strtolower($state))?></option>
				<? } ?>
			</select>
		</div>
		<div class="col-md-4 form-group">
			<label for="zip">Zip</label>
			<input type="text" class="form-control" name="zip" id="zip" <? if (isset($address)) { ?>value="<?=$address['zip']?>"<? } ?>>
		</div>
	</div>
	<br>
	<input type="submit" class="btn btn-primary">
</form>