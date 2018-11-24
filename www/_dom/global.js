// Allow multiple events onLoad
function addLoadEvent(func) {
	var oldonload = window.onload;
		if (typeof window.onload != 'function') {
			window.onload = func;
		} else {
			window.onload = function() {
			oldonload();
			func();
		}
	}
}

// Cloak e-mail addresses
function emailCloak() {
	if (document.getElementById) {
		var alltags = document.all? document.all : document.getElementsByTagName("*");
		for (i=0; i < alltags.length; i++) {
			if (alltags[i].className == "emailCloak") {
				var oldText = alltags[i].firstChild;
				var emailAddress = alltags[i].firstChild.nodeValue;
				var user = emailAddress.substring(0, emailAddress.indexOf("("));
				var website = emailAddress.substring(emailAddress.indexOf(")")+1, emailAddress.length);
				var newText = user+"@"+website;
				var a = document.createElement("a");
				a.href = "mailto:"+newText;
				var address = document.createTextNode(newText);
				a.appendChild(address);
				alltags[i].replaceChild(a,oldText);
			}
		}
	}
}
addLoadEvent(emailCloak);

// Play with the Search Input (and add Safari Magic if we like too!)
var DEF_VAL   = "Search"; // Default Value
var isSafari = (navigator.userAgent.indexOf("AppleWebKit") !=-1); // Detecting not only Safari but WebKit-based browsers

function init() {
	if (!document.getElementById) return;
		var theSearchField = document.getElementById('search-input');
		if (isSafari) {
			// Changing type to 'search' from 'text'
			// and inserting 'autosave,' 'results,' 'placeholder' values for Safari and WebKit-based browsers
			// theSearchField.setAttribute('type', 'search');
			// theSearchField.setAttribute('autosave', 'saved.data');
			// theSearchField.setAttribute('results', '5');
			theSearchField.setAttribute('placeholder', DEF_VAL);
		} else {
			// Doing the 'Live Search'-displaying-&-hiding-stuff for non-WebKit-based browsers
			theSearchField.onfocus    = focusSearch;
			theSearchField.onblur     = blurSearch;
		if (theSearchField.value=='') theSearchField.value = DEF_VAL;
		}
	}
addLoadEvent(init);

function focusSearch() {
	if (this.value==DEF_VAL) {
		this.value = '';
	}
}

function blurSearch() {
	if (this.value=='') {
		this.value = DEF_VAL;
	}
}
