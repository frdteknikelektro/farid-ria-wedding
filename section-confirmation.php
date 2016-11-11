<?php
	
	include_once("server-side/getMessageByUrlQuery.php");
	
	if($isInvitation) {
		$name = $invitation['invitation_name'];
		$category = $invitation['invitation_category'];
		$confirmation = $invitation['invitation_confirmation'];
		$message = getMessageByUrlQuery($DB, $urlQuery);
	}
?>
<div class="modal fade" id="id_div_confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Silahkan tulis pesan disini</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message-text" class="control-label">Pesan:</label>
            <textarea class="form-control" id="id_textarea_confirmation_message" rows="7"><?php echo $message['message_content']; ?></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Lewati</button>
        <button type="button" class="btn btn-primary" onclick="onClickSaveMessage_section_confirmation()">Simpan Pesan</button>
      </div>
    </div>
  </div>
</div>
<section id="id_section_confirmation">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h4 class="text-dark-pink text-center" style="margin-top: 0px">Tak ada yang lebih berkesan dari
					kehadiran Bapak/Ibu/Saudara/i <br class="hidden-xs" />
					pada acara syukuran sederhana kami untuk turut <br class="hidden-xs" />
					merayakan serta memberikan doa restunya</h4>
			</div>
		</div>
		<?php if($isInvitation && ($category != $name)) { ?>
		<div id="id_div_confirmation_buttons" class="row">
			<div class="col-sm-6 text-center">
				<button id="id_button_confirmation_yes" onclick="onClickConfirmationYes_section_confirmation()"
						class="btn btn-block text-center 
						<?php if($confirmation == 2) echo 'background-light-grey text-dark-grey'; else echo 'background-dark-pink text-light-pink';?>">
					Akan hadir
				</button>
			</div>
			<div class="col-sm-6 text-center">
				<button id="id_button_confirmation_no" onclick="onClickConfirmationNo_section_confirmation()"
						class="btn btn-block text-center 
						<?php if($confirmation == 1) echo 'background-light-grey text-dark-grey'; else echo 'background-dark-pink text-light-pink';?>">
					Berhalangan hadir
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<p id="id_p_confirmation_reply" class="text-dark-pink text-center" style="margin-top: 10px;margin-bottom: 0px">
				<?php if($confirmation != 0) { ?>
					Terima kasih atas konfirmasi kehadirannya, <br />
					<?php if($confirmation == 1) { ?>
					Kami tunggu kehadiran Bapak/Ibu/Saudara/i di Jogja</p>
					<?php } else if($confirmation == 2) { ?>
					Mohon doa restunya</p>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</section>