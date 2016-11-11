/**
 * 
 */

function onLoadBody() {
	initElements();
	
	onLoadBody_header();
	if(typeof onLoadBody_section_invite == 'function')onLoadBody_section_invite();
	if(typeof onLoadBody_section_bride == 'function')onLoadBody_section_bride();
	if(typeof onLoadBody_section_opening == 'function')onLoadBody_section_opening();
	if(typeof onLoadBody_section_confirmation == 'function')onLoadBody_section_confirmation();
	if(typeof onLoadBody_section_bonus == 'function')onLoadBody_section_bonus();
	if(typeof onLoadBody_section_event == 'function')onLoadBody_section_event();
}

function initElements() {

}

function createXmlHttpRequestObject() {
	var xmlHttp;

	if (window.ActiveXObject) {
		try {
			xmlHttp = new ActiveXObject("Microsofot.XMLHTTP");
		} catch (e) {
			xmlHttp = false;
		}
	} else {
		try {
			xmlHttp = new XMLHttpRequest();
		} catch (e) {
			xmlHttp = false;
		}
	}

	if (!xmlHttp) {
		alert("Could not create XML Object");
	} else {
		return xmlHttp;
	}
}
