<? if($render_type == 'cities'){ ?>
	<? foreach($data as $data){ ?>
		<option value="<?= $data->ad ?>"><?= $data->ad ?></option>
	<? } ?>
<? } ?>