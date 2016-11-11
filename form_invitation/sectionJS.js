/**
 * 
 */

var id_input_url_query;
var id_input_name;
var id_input_written_name;
var id_input_place;
var id_input_category;
var id_input_confirmation;

var id_button_invitation_clear;
var id_button_invitation_delete;
var id_button_invitation_submit;

var	id_table_invitations;
var id_span_url_query;

function onLoadBody_section() {
	initElements_section();
	
}

var onInputFormInvitationTimeout;
function onInputFormInvitation_section() {
	clearTimeout(onInputFormInvitationTimeout);
	onInputFormInvitationTimeout = setTimeout(function(){
		var urlQuery = id_input_url_query.value;
		var category = id_input_category.value;
		var name = id_input_name.value;
		var writtenName = id_input_written_name.value;
		var place = id_input_place.value;
		var confirmation = id_input_confirmation.value;
		
		searchInvitations_section(urlQuery, category, name, writtenName, place, confirmation);
	}, 500);
}

function onClickButtonClearForm_section() {
	id_input_url_query.value = '';
	id_input_name.value = '';
	id_input_written_name.value = '';
	id_input_place.value = '';
	id_input_category.value = '';
	id_input_confirmation.value = '';
	
	onInputFormInvitation_section();
}

function onClickButtonDeleteInvitation_section() {
	var urlQuery = id_input_url_query.value;
	
	if(confirm('Anda akan menghapus ' + urlQuery + '.'))
		deleteInvitationByUrlQuery_section(urlQuery);
}

function onClickButtonSubmitInvitation_section() {
	var urlQuery = id_input_url_query.value;
	var category = id_input_category.value;
	var name = id_input_name.value;
	var writtenName = id_input_written_name.value;
	var place = id_input_place.value;
	var confirmation = id_input_confirmation.value;
	
	if(confirmation == '')
		confirmation = 0;
	
	replaceInvitation_section(urlQuery, category, name, writtenName, place, confirmation);
}

function onClickTrInvitation_section(row) {
	id_input_url_query.value = id_table_invitations.rows[row+1].cells[5].innerHTML;
	id_input_name.value = id_table_invitations.rows[row+1].cells[1].innerHTML;
	id_input_written_name.value = id_table_invitations.rows[row+1].cells[2].innerHTML;
	id_input_place.value = id_table_invitations.rows[row+1].cells[3].innerHTML;
	id_input_category.value = id_table_invitations.rows[row+1].cells[0].innerHTML;
	id_input_confirmation.value = id_table_invitations.rows[row+1].cells[4].innerHTML;
	
	onInputFormInvitation_section();
}

function initElements_section() {
	id_input_url_query 		= document.getElementById('id_input_url_query');
	id_input_name			= document.getElementById('id_input_name');
	id_input_written_name	= document.getElementById('id_input_written_name');
	id_input_place			= document.getElementById('id_input_place');
	id_input_category		= document.getElementById('id_input_category');
	id_input_confirmation	= document.getElementById('id_input_confirmation');
	
	id_button_invitation_clear	= document.getElementById('id_button_invitation_clear');
	id_button_invitation_delete = document.getElementById('id_button_invitation_delete');
	id_button_invitation_submit = document.getElementById('id_button_invitation_submit');
	
	id_table_invitations	= document.getElementById('id_table_invitations');
	id_span_url_query		= document.getElementById('id_span_url_query');
}

/* --- Ajax to search invitations --*/

function searchInvitations_section(urlQuery, category, name, writtenName, place, confirmation) {
	var xmlHttp = createXmlHttpRequestObject();
	
	if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
		preAjaxSearchInvitations_section();
		
		xmlHttp.open("POST", "server-side/XMLSearchInvitations.php", true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.onreadystatechange = function() {
			if (xmlHttp.readyState == 4) {
				if (xmlHttp.status == 200) {
					postAjaxSearchInvitations_section(xmlHttp.responseXML);
				}
			}
		};
		xmlHttp.send("url_query=" + urlQuery +
					 "&category=" + category +
					 "&name=" + name +
					 "&written_name=" + writtenName +
					 "&place=" + place +
					 "&confirmation=" + confirmation);
	} else {
		setTimeout(function() {
			searchInvitations_section(urlQuery, category, name, writtenName, place, confirmation);
		}, 1000);
	}
}

function preAjaxSearchInvitations_section() {
	
}

function postAjaxSearchInvitations_section(responseXML) {
	var xmlData = responseXML.documentElement.getElementsByTagName("invitation");
	var invitation = [];
	
	for (var i = 0; i < xmlData.length; i++) {
		invitation[i] = {
							invitation_url_query: xmlData[i].getElementsByTagName("invitation_url_query")[0].firstChild.nodeValue,
							invitation_category: xmlData[i].getElementsByTagName("invitation_category")[0].firstChild.nodeValue,
							invitation_name: xmlData[i].getElementsByTagName("invitation_name")[0].firstChild.nodeValue,
							invitation_written_name: xmlData[i].getElementsByTagName("invitation_written_name")[0].firstChild.nodeValue,
							invitation_place: xmlData[i].getElementsByTagName("invitation_place")[0].firstChild.nodeValue,
							invitation_confirmation: xmlData[i].getElementsByTagName("invitation_confirmation")[0].firstChild.nodeValue
						};
	}
	
	id_tbody_invitation_list.innerHTML = '';
	for (var i = 0; i < invitation.length; i++) {
		id_tbody_invitation_list.innerHTML +=
						'<tr id="id_tr_invitation" onclick="onClickTrInvitation_section(' + i + ')">' +
						'	<td>' + invitation[i]['invitation_category'] + '</td>' +
						'	<td>' + invitation[i]['invitation_name'] + '</td>' +
						'	<td>' + invitation[i]['invitation_written_name'] + '</td>' +
						'	<td>' + invitation[i]['invitation_place'] + '</td>' +
						'	<td>' + invitation[i]['invitation_confirmation'] + '</td>' +
						'	<td class="hidden-xs">' + invitation[i]['invitation_url_query'] + '</td>' +
						'	<td>' + 
						'		<a href="http://wedding.atnic.co/farid_ria/?' + invitation[i]['invitation_url_query'] + '">' +
						'			wedding.atnic.co/farid_ria/?<span id="id_span_url_query">' + invitation[i]['invitation_url_query'] + '</span>' + 
						'		</a>' +
						'	</td>' + 
						'</tr>';
	}
}

/* ----------------------------------------------------------------- */

/* --- Ajax to delete invitation --*/

function deleteInvitationByUrlQuery_section(urlQuery) {
	var xmlHttp = createXmlHttpRequestObject();
	
	if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
		preAjaxDeleteInvitationByUrlQuery_section();
		
		xmlHttp.open("POST", "server-side/XMLDeleteInvitationByUrlQuery.php", true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.onreadystatechange = function() {
			if (xmlHttp.readyState == 4) {
				if (xmlHttp.status == 200) {
					postAjaxDeleteInvitationByUrlQuery_section(xmlHttp.responseXML);
				}
			}
		};
		xmlHttp.send("url_query=" + urlQuery);
	} else {
		setTimeout(function() {
			deleteInvitationByUrlQuery_section(urlQuery);
		}, 1000);
	}
}

function preAjaxDeleteInvitationByUrlQuery_section() {
	id_button_invitation_delete.disabled = true;
	id_button_invitation_submit.disabled = true;
}

function postAjaxDeleteInvitationByUrlQuery_section(responseXML) {
	var urlQuery = id_input_url_query.value;
	var category = id_input_category.value;
	var name = id_input_name.value;
	var writtenName = id_input_written_name.value;
	var place = id_input_place.value;
	var confirmation = id_input_confirmation.value;
	
	searchInvitations_section(urlQuery, category, name, writtenName, place, confirmation);
	id_button_invitation_delete.disabled = false;
	id_button_invitation_submit.disabled = false;
}

/* ----------------------------------------------------------------- */

/* --- Ajax to replace invitation --*/

function replaceInvitation_section(urlQuery, category, name, writtenName, place, confirmation) {
	var xmlHttp = createXmlHttpRequestObject();
	
	if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
		preAjaxReplaceInvitation_section();
		
		xmlHttp.open("POST", "server-side/XMLReplaceInvitation.php", true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.onreadystatechange = function() {
			if (xmlHttp.readyState == 4) {
				if (xmlHttp.status == 200) {
					postAjaxReplaceInvitation_section(xmlHttp.responseXML);
				}
			}
		};
		xmlHttp.send("url_query=" + urlQuery +
					 "&category=" + category +
					 "&name=" + name +
					 "&written_name=" + writtenName +
					 "&place=" + place +
					 "&confirmation=" + confirmation);
	} else {
		setTimeout(function() {
			replaceInvitation_section(urlQuery, category, name, writtenName, place, confirmation);
		}, 1000);
	}
}

function preAjaxReplaceInvitation_section() {
	id_button_invitation_delete.disabled = true;
	id_button_invitation_submit.disabled = true;
}

function postAjaxReplaceInvitation_section(responseXML) {
	var urlQuery = id_input_url_query.value;
	var category = id_input_category.value;
	var name = id_input_name.value;
	var writtenName = id_input_written_name.value;
	var place = id_input_place.value;
	var confirmation = id_input_confirmation.value;
	
	searchInvitations_section(urlQuery, category, name, writtenName, place, confirmation);
	id_button_invitation_delete.disabled = false;
	id_button_invitation_submit.disabled = false;
}

/* ----------------------------------------------------------------- */