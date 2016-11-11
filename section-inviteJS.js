/**
 * 
 */

function onLoadBody_section_invite() {
	$('#id_section_invite').affix({
		offset: {
			top: $('header').height()
		}
	});
	$('#id_section_invite').on('affixed.bs.affix', onAffixed_invite);
	$('#id_section_invite').on('affixed-top.bs.affix', onAffixedTop_invite);
}

function onAffixed_invite() {
	if($(window).width() < 768)
		$('#id_img_section_fab_invite').hide();
	$('#id_section_invite_space').height($('#id_section_invite').height());
}

function onAffixedTop_invite() {
	if($(window).width() < 768)
		$('#id_img_section_fab_invite').show();
	$('#id_section_invite_space').height('0px');
}