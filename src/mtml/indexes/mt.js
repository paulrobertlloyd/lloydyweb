// Copyright (c) 1996-1997 Athenia Associates.
// http://www.webreference.com/js/
// License is granted if and only if this entire
// copyright notice is included. By Tomer Shiran.

function setCookie (name, value, expires, path, domain, secure) {
	var curCookie = name + "=" + escape(value) + (expires ? "; expires=" + expires : "") +
		(path ? "; path=" + path : "") + (domain ? "; domain=" + domain : "") + (secure ? "secure" : "");
	document.cookie = curCookie;
}

function getCookie (name) {
	var prefix = name + '=';
	var c = document.cookie;
	var nullstring = '';
	var cookieStartIndex = c.indexOf(prefix);
	if (cookieStartIndex == -1)
		return nullstring;
	var cookieEndIndex = c.indexOf(";", cookieStartIndex + prefix.length);
	if (cookieEndIndex == -1)
		cookieEndIndex = c.length;
	return unescape(c.substring(cookieStartIndex + prefix.length, cookieEndIndex));
}

function deleteCookie (name, path, domain) {
	if (getCookie(name))
		document.cookie = name + "=" + ((path) ? "; path=" + path : "") +
			((domain) ? "; domain=" + domain : "") + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
}

function fixDate (date) {
	var base = new Date(0);
	var skew = base.getTime();
	if (skew > 0)
		date.setTime(date.getTime() - skew);
}

function rememberMe (f) {
	var now = new Date();
	fixDate(now);
	now.setTime(now.getTime() + 365 * 24 * 60 * 60 * 1000);
	now = now.toGMTString();
	if (f.author != undefined)
	   setCookie('mtcmtauth', f.author.value, now, '/', '', '');
	if (f.email != undefined)
	   setCookie('mtcmtmail', f.email.value, now, '/', '', '');
	if (f.url != undefined)
	   setCookie('mtcmthome', f.url.value, now, '/', '', '');
}

function forgetMe (f) {
	deleteCookie('mtcmtmail', '/', '');
	deleteCookie('mtcmthome', '/', '');
	deleteCookie('mtcmtauth', '/', '');
	f.email.value = '';
	f.author.value = '';
	f.url.value = '';
}

function hideDocumentElement(id) {
	var el = document.getElementById(id);
	if (el) el.style.display = 'none';
}

function showDocumentElement(id) {
	var el = document.getElementById(id);
	if (el) el.style.display = 'block';
}

var commenter_name;

function individualArchivesOnLoad(commenter_name) {
<MTIfCommentsAccepted><MTElse>
	hideDocumentElement('add_comment');
</MTElse></MTIfCommentsAccepted>
<MTIfPingsAccepted><MTElse>
	hideDocumentElement('trackback-url');
</MTElse></MTIfPingsAccepted>
<MTIfRegistrationAllowed>
<MTIfRegistrationRequired>
	if (commenter_name) {
		hideDocumentElement('name-email');
		showDocumentElement('comments-text');
		showDocumentElement('comments-preview');
		showDocumentElement('comments-post');
	} else {
		hideDocumentElement('comments-details');
		hideDocumentElement('comments-text');
		hideDocumentElement('comments-preview');
		hideDocumentElement('comments-post');
	}
<MTElse> // comments are allowed but not required
	if (commenter_name) {
		hideDocumentElement('name-email');
	} else {
		showDocumentElement('name-email');
	}
</MTElse>
</MTIfRegistrationRequired>
</MTIfRegistrationAllowed>

	if (document.add_comment) {
		if (!commenter_name && (document.add_comment.email != undefined) &&
			(mtcmtmail = getCookie("mtcmtmail")))
			document.add_comment.email.value = mtcmtmail;
		if (!commenter_name && (document.add_comment.author != undefined) &&
			(mtcmtauth = getCookie("mtcmtauth")))
			document.add_comment.author.value = mtcmtauth;
		if (document.add_comment.url != undefined && 
			(mtcmthome = getCookie("mtcmthome")))
			document.add_comment.url.value = mtcmthome;
		if (document.add_comment["bakecookie"]) {
			if (mtcmtauth || mtcmthome) {
				document.add_comment.bakecookie.checked = true;
			} else {
				document.add_comment.bakecookie.checked = false;
			}
		}
	}
}

function writeTypeKeyGreeting(commenter_name, entry_id) {
<MTIfRegistrationAllowed>
	if (commenter_name) {
		document.write('<p class="typekey">Thanks for signing in, ' + commenter_name +
		  '. Now you can comment. '+
		  '(<a href="<$MTRemoteSignOutLink static="1"$>&entry_id=' + entry_id + '">sign out</a>)</p>');
	} else {
<MTIfRegistrationRequired>
		document.write('<p class="typekey">You are not signed in. You need to be registered to comment on this site. '+
		  '<a href="<$MTRemoteSignInLink static="1"$>%26entry_id=' + entry_id + '">Sign in</a></p>');
<MTElse>
		document.write('<p class="typekey">If you have a TypeKey identity, you can '+
		  '<a href="<$MTRemoteSignInLink static="1"$>%26entry_id=' + entry_id + '">sign in</a> '+
		  'to use it here.</p>');
</MTElse>
</MTIfRegistrationRequired>
	}
</MTIfRegistrationAllowed>
}

<MTIfRegistrationAllowed>
if ('<$MTCGIHost exclude_port="1"$>' != '<$MTBlogHost exclude_port="1"$>') {
	document.write('<script src="<$MTCGIPath$><$MTCommentScript$>?__mode=cmtr_name_js"></script>');
} else {
	commenter_name = getCookie('commenter_name');
}
</MTIfRegistrationAllowed>



// This function is from Jeff Minard
// http://www.creatimation.net/
// Adapted from code by Stuart Langridge at http://www.kryogenix.org/
 
// live comment preview  - comment body
function superTextile(s) {
    var r = s;
    // quick tags first
    qtags = [['\\*', 'strong'],
             ['\\?\\?', 'cite'],
             ['\\+', 'ins'],  //fixed
             ['~', 'sub'],   
             ['\\^', 'sup'], // me
             ['@', 'code']];
    for (var i=0;i<qtags.length;i++) {
        ttag = qtags[i][0]; htag = qtags[i][1];
        re = new RegExp(ttag+'\\b(.+?)\\b'+ttag,'g');
        r = r.replace(re,'<'+htag+'>'+'$1'+'</'+htag+'>');
    }
    // underscores count as part of a word, so do them separately
    re = new RegExp('\\b_(.+?)_\\b','g');
    r = r.replace(re,'<em>$1</em>');
	
	//jeff: so do dashes
    re = new RegExp('[\s\n]-(.+?)-[\s\n]','g');
    r = r.replace(re,'<del>$1</del>');

    // links
    re = new RegExp('"\\b(.+?)\\(\\b(.+?)\\b\\)":([^\\s]+)','g');
    r = r.replace(re,'<a href="$3" title="$2">$1</a>');
    re = new RegExp('"\\b(.+?)\\b":([^\\s]+)','g');
    r = r.replace(re,'<a href="$2">$1</a>');

    // images
    re = new RegExp('!\\b(.+?)\\(\\b(.+?)\\b\\)!','g');
    r = r.replace(re,'<img src="$1" alt="$2">');
    re = new RegExp('!\\b(.+?)\\b!','g');
    r = r.replace(re,'<img src="$1">');
    
    // block level formatting
	
		// Jeff's hack to show single line breaks as they should.
		// insert breaks - but you get some....stupid ones
	    re = new RegExp('(.*)\n([^#\*\n].*)','g');
	    r = r.replace(re,'$1<br />$2');
		// remove the stupid breaks.
	    re = new RegExp('\n<br />','g');
	    r = r.replace(re,'\n');
	
    lines = r.split('\n');
    nr = '';
    for (var i=0;i<lines.length;i++) {
        line = lines[i].replace(/\s*$/,'');
        changed = 0;
        if (line.search(/^\s*bq\.\s+/) != -1) { line = line.replace(/^\s*bq\.\s+/,'\t<blockquote>')+'</blockquote>'; changed = 1; }
		
		// jeff adds h#.
        if (line.search(/^\s*h[1-6]\.\s+/) != -1) { 
	    	re = new RegExp('h([1-6])\.(.+)','g');
	    	line = line.replace(re,'<h$1>$2</h$1>');
			changed = 1; 
		}
		if (line.search(/^\s*\*\s+/) != -1) { line = line.replace(/^\s*\*\s+/,'\t<liu>') + '</liu>'; changed = 1; } // * for bullet list; make up an liu tag to be fixed later
        if (line.search(/^\s*#\s+/) != -1) { line = line.replace(/^\s*#\s+/,'\t<lio>') + '</lio>'; changed = 1; } // # for numeric list; make up an lio tag to be fixed later
        if (!changed && (line.replace(/\s/g,'').length > 0)) line = '<p>'+line+'</p>';
        lines[i] = line + '\n';
    }
    // Second pass to do lists
    inlist = 0; 
	listtype = '';
    for (var i=0;i<lines.length;i++) {
        line = lines[i];
        if (inlist && listtype == 'ul' && !line.match(/^\t<liu/)) { line = '</ul>\n' + line; inlist = 0; }
        if (inlist && listtype == 'ol' && !line.match(/^\t<lio/)) { line = '</ol>\n' + line; inlist = 0; }
        if (!inlist && line.match(/^\t<liu/)) { line = '<ul>' + line; inlist = 1; listtype = 'ul'; }
        if (!inlist && line.match(/^\t<lio/)) { line = '<ol>' + line; inlist = 1; listtype = 'ol'; }
        lines[i] = line;
    }
    r = lines.join('\n');
	// jeff added : will correctly replace <li(o|u)> AND </li(o|u)>
    r = r.replace(/li[o|u]>/g,'li>');

    return r;
}

function textReload() { 
    var commentString = document.getElementById('comment-text').value;
	var con = superTextile(commentString);
    document.getElementById('comment-text-display').innerHTML = con;
}

// live comment preview - author
function authorReload() {
	var NewText = document.getElementById("comment-author").value;
	var DivElement = document.getElementById("comment-author-display");
	DivElement.innerHTML = NewText;
}

// live comment preview - gravatar
function gravatarReload() {
	var newEmail = document.getElementById("comment-email").value;
	var emailElement = document.getElementById("comment-email-display");
	var md5 = hex_md5(newEmail);
	emailElement.src="http://www.gravatar.com/avatar.php?gravatar_id="+md5+"&amp;size=32";
}

// coComment global variables
var blogTool = "Movable Type";
var blogURL = "<$MTBlogURL$>";
var blogTitle = "LloydyWeb <$MTBlogName$>";
var commentAuthorFieldName = "author";
var commentAuthorLoggedIn = "false";
var commentFormID = "add_comment";
var commentTextFieldName = "text";
var commentButtonName = "post";