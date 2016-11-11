<section id="id_section_form" class="background-light-grey">
	<div class="container">
		<form id="id_form_invitation" oninput="onInputFormInvitation_section()" >
			<div class="form-group">
				<label for="id_input_url_query">URL Query</label>
				<input type="text" class="form-control" id="id_input_url_query" placeholder="URL Query">
			</div>
			<div class="form-group">
				<label for="id_input_name">Nama Lengkap</label>
				<input type="text" class="form-control" id="id_input_name" placeholder="Nama Lengkap">
			</div>
			<div class="form-group">
				<label for="id_input_written_name">Nama Yang Tertulis</label>
				<input type="text" class="form-control" id="id_input_written_name" placeholder="Nama yg Tertulis">
			</div>
			<div class="form-group">
				<label for="id_input_place">Tempat</label>
				<input type="text" class="form-control" id="id_input_place" placeholder="Tempat">
			</div>
			<div class="form-group">
				<label for="id_input_category">Kategori</label>
				<input type="text" class="form-control" id="id_input_category" placeholder="Kategori">
			</div>
			<div class="form-group">
				<label for="id_input_confirmation">Konfirmasi</label>
				<select class="form-control" id="id_input_confirmation" placeholder="Konfirmasi">
					<option value=""></option>
					<option value="0">Tak Ada Konfirmasi</option>
					<option value="1">Akan Hadir</option>
					<option value="2">Berhalangan Hadir</option>
				</select>
			</div>
			<input id="id_button_invitation_clear" type="button" class="btn btn-default" onclick="onClickButtonClearForm_section()" value="Bersihkan" >
			<input id="id_button_invitation_delete" type="button" class="btn btn-danger" onclick="onClickButtonDeleteInvitation_section()" value="Hapus" >
			<input id="id_button_invitation_submit" type="button" class="btn btn-primary" onclick="onClickButtonSubmitInvitation_section()" value="Submit" >
		</form>
	</div>
</section>

<?php 
	include_once("server-side/searchInvitations.php");

	/* Get Invitations */
	$invitations = searchInvitations($DB, '', '', '', '', '', '', '');
?>
<section id="id_section_table" class="background-light-grey">
	<div class="container">
		<div class="row">
			<div class="table-responsive">
				<table id="id_table_invitations" class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Kategori</th>
							<th>Nama</th>
							<th>Nama Undangan</th>
							<th>Tempat</th>
							<th>Konfirmasi</th>
							<th style="display:none;">URL Query</td>
							<th>URL</th>
						</tr>
					</thead>
					<tbody id="id_tbody_invitation_list">
						<?php for($i = 0; $i < count($invitations); $i++) { ?>
						<tr id="id_tr_invitation" onclick="onClickTrInvitation_section(<?php echo $i; ?>)">
							<td><?php echo $invitations[$i]['invitation_category']; ?></td>
							<td><?php echo $invitations[$i]['invitation_name']; ?></td>
							<td><?php echo $invitations[$i]['invitation_written_name']; ?></td>
							<td><?php echo $invitations[$i]['invitation_place']; ?></td>
							<td><?php echo $invitations[$i]['invitation_confirmation']; ?></td>
							<td style="display:none;"><?php echo $invitations[$i]['invitation_url_query']; ?></td>
							<td>
								<a href="http://wedding.atnic.co/farid_ria/?<?php echo $invitations[$i]['invitation_url_query']; ?>">
									wedding.atnic.co/farid_ria/?<span id="id_span_url_query"><?php echo $invitations[$i]['invitation_url_query']; ?></span>
								</a>
							</td>
						</tr>
						<?php }; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>