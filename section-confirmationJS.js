/**
 * 
 */

var id_div_confirmation_modal;
var id_textarea_confirmation_message; 
 
var id_button_confirmation_yes;
var id_button_confirmation_no;

var id_p_confirmation_reply;

function onLoadBody_section_confirmation() {
	initElements_section_confirmation();
}

function onClickConfirmationYes_section_confirmation() {
	var urlQuery = window.location.search;
	urlQuery = urlQuery.replace('?', '');
	
	setConfirmationInvitation_section_confirmation(urlQuery, 1);
}

function onClickConfirmationNo_section_confirmation() {
	var urlQuery = window.location.search;
	urlQuery = urlQuery.replace('?', '');
	
	setConfirmationInvitation_section_confirmation(urlQuery, 2);
}

function onClickSaveMessage_section_confirmation() {
	var urlQuery = window.location.search;
	urlQuery = urlQuery.replace('?', '');
	
	replaceContentMessage_section_confirmation(urlQuery, id_textarea_confirmation_message.value);
}

function initElements_section_confirmation() {
	id_div_confirmation_modal = document.getElementById('id_div_confirmation_modal');
    id_textarea_confirmation_message = document.getElementById('id_textarea_confirmation_message');
	
	id_button_confirmation_yes = document.getElementById('id_button_confirmation_yes');
	id_button_confirmation_no = document.getElementById('id_button_confirmation_no');
	
	id_p_confirmation_reply = document.getElementById('id_p_confirmation_reply')
}

/* --- Ajax to set confirmation value --*/

function setConfirmationInvitation_section_confirmation(urlQuery, confirmation) {
	var xmlHttp = createXmlHttpRequestObject();
	
	if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
		preAjaxSetConfirmationInvitation_section_confirmation();
		
		xmlHttp.open("POST", "server-side/XMLSetConfirmationInvitation.php", true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.onreadystatechange = function() {
			if (xmlHttp.readyState == 4) {
				if (xmlHttp.status == 200) {
					postAjaxSetConfirmationInvitation_section_confirmation(xmlHttp.responseXML);
				}
			}
		};
		xmlHttp.send("url_query=" + urlQuery + "&confirmation=" + confirmation);
	} else {
		setTimeout(function() {
			setConfirmationInvitation_section_confirmation(urlQuery, confirmation);
		}, 1000);
	}
}

function preAjaxSetConfirmationInvitation_section_confirmation() {
	id_button_confirmation_yes.disabled = true;
	id_button_confirmation_no.disabled = true;
}

function postAjaxSetConfirmationInvitation_section_confirmation(responseXML) {
	var xmlData = responseXML.documentElement.getElementsByTagName("invitation");
	var confirmation = xmlData[0].getElementsByTagName("invitation_confirmation")[0].firstChild.nodeValue;
	
	if(confirmation == 1) {
		id_button_confirmation_yes.className = "btn btn-block text-center background-dark-pink text-light-pink";
		id_button_confirmation_no.className  = "btn btn-block text-center background-light-grey text-dark-grey";
		id_p_confirmation_reply.innerHTML = "Terima kasih atas konfirmasi kehadirannya, <br />Kami tunggu kehadiran Bapak/Ibu/Saudara/i di Jogja";
	}
	else if(confirmation == 2) {
		id_button_confirmation_yes.className = "btn btn-block text-center background-light-grey text-dark-grey";
		id_button_confirmation_no.className  = "btn btn-block text-center background-dark-pink text-light-pink";
		id_p_confirmation_reply.innerHTML = "Terima kasih atas konfirmasi kehadirannya, <br />Mohon doa restunya";
	}
	
	id_button_confirmation_yes.disabled = false;
	id_button_confirmation_no.disabled = false;
	
	$(id_div_confirmation_modal).modal('show');
}

/* ----------------------------------------------------------------- */

/* --- Ajax to get notification whether there is new access or request -- */

function replaceContentMessage_section_confirmation(urlQuery, content) {
	var xmlHttp = createXmlHttpRequestObject();

	if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
		preAjaxReplaceContentMessage_section_confirmation();
		
		xmlHttp.open("POST", "server-side/XMLReplaceContentMessage.php", true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.onreadystatechange = function() {
			if (xmlHttp.readyState == 4) {
				if (xmlHttp.status == 200) {
					postAjaxReplaceContentMessage_section_confirmation(xmlHttp.responseXML);
				}
			}
		};
		xmlHttp.send("url_query=" + urlQuery + "&content=" + content);
	} else {
		setTimeout(function() {
			replaceContentMessage_section_confirmation(urlQuery, content);
		}, 1000);
	}
}

function preAjaxReplaceContentMessage_section_confirmation() {
	
}

function postAjaxReplaceContentMessage_section_confirmation(responseXML) {
	var xmlData = responseXML.documentElement.getElementsByTagName("message");
	var content = xmlData[0].getElementsByTagName("message_content")[0].firstChild.nodeValue;
	
	id_textarea_confirmation_message.value = content;
	
	$(id_div_confirmation_modal).modal('hide');
}

/* ----------------------------------------------------------------- */