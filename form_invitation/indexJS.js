/**
 * 
 */

function onLoadBody() {
	initElements();
	
	if(typeof onLoadBody_section== 'function')onLoadBody_section();
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