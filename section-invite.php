<?php if($isInvitation) { ?>
<section id="id_section_invite">
	<div id="id_div_section_invite" class="container">
		<div class="row">
			<div id="id_div_section_fab_invite" class="col-sm-2">
				<img id="id_img_section_fab_invite" src="res/fab_invite.png?<?php echo $version ?>">
			</div>
			<div id="id_div_section_name" class="col-sm-10 text-left">
				<div id="id_div_section_name_content" class="hidden-xs">
					<h4 class="text-dark-grey" style="margin-bottom: 5px">Undangan Spesial untuk</h4>
					<h3 class="text-dark-pink" style="margin-top: 5px">
						<?php echo $invitation['invitation_name']; ?> 
						<small><span class="text-dark-grey">di</span></small> 
						<?php echo $invitation['invitation_place']; ?> 
					</h3>
				</div>
				<div id="id_div_section_name_content" class="visible-xs-block">
					<h5 class="text-dark-grey" style="margin-bottom: 5px">Undangan Spesial untuk</h5>
					<h4 class="text-dark-pink" style="margin-top: 5px">
						<?php echo $invitation['invitation_written_name']; ?> 
						<small><span class="text-dark-grey">di</span></small> 
						<?php echo $invitation['invitation_place']; ?> 
					</h4>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="id_section_invite_space">
</div>
<?php }?>