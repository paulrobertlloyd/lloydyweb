<?php
	require($_SERVER['DOCUMENT_ROOT'].'/_inc/functions.inc.php');

	$pageTitle 	= '<$MTEntryTitle remove_html="1" encode_php="1"$>';
	$section 	= 'blog';
	//$onLoad	= ' onload="individualArchivesOnLoad(commenter_name)"';
?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/doctype.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/head.inc.php'); ?>
	<script type="text/javascript" src="<$MTBlogURL$>_js/mt.js"></script>
<MTIfCommentsAccepted>
	<script type="text/javascript">
		<!--
		// coComment entry-specific variables
		var postURL = "<$MTEntryPermalink$>";
		var postTitle = "<$MTEntryTitle$>";
		
		// Get Commenter Name
		addLoadEvent(individualArchivesOnLoad(commenter_name));
		//-->
	</script>
</MTIfCommentsAccepted>
	<MTEntryPrevious><link rel="prev" href="<$MTEntryPermalink$>" title="<$MTEntryTitle encode_html="1"$>" /></MTEntryPrevious>
	<MTEntryNext><link rel="next" href="<$MTEntryPermalink$>" title="<$MTEntryTitle encode_html="1"$>" /></MTEntryNext>

	<$MTEntryTrackbackData$>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/branding.inc.php'); ?>
			<div id="content-primary" class="hfeed<MTIfCategory name="Review"> hreview</MTIfCategory>">
				<div class="hentry" id="entry-<$MTEntryID$>">
<MTIfCategory name="Review">
					<h1 class="entry-title item">Review: <span class="fn"><$MTEntryTitle encode_html="1" widont="1"$></span></h1>
	<MTElse>				
					<h1 class="entry-title"><span><$MTEntryTitle encode_html="1" widont="1"$></span></h1>
	</MTElse>
</MTIfCategory>
					<ul class="entry-info">
						<li><abbr class="published" title="<$MTEntryDate format="%y-%m-%dT%H:%M:%S"$><$MTBlogTimezone$>"><$MTEntryDate format="%e %b %Y"$></abbr></li>
						<li><a href="<$MTEntryPermalink$>" rel="bookmark">Permalink</a></li>
						<MTIfPingsActive><li><a href="#trackback">TrackBacks (<$MTEntryTrackbackCount$>)</a></li></MTIfPingsActive>
						<MTIfCommentsActive><li><strong><a href="#comments">Comments (<$MTEntryCommentCount$>)</a></strong></li></MTIfCommentsActive>
					</ul>
					<div class="entry-content">
<MTIfNonEmpty tag="EntryBody">
						<div class="summary">
<$MTEntryBody smarty_pants="1" widont="1"$>
						</div>
</MTIfNonEmpty>
<MTIfNonEmpty tag="EntryMore">
						<div id="more<MTIfCategory name="Review"> class="description"</MTIfCategory>">
<$MTEntryMore smarty_pants="1" widont="1"$>
						</div>
</MTIfNonEmpty>
					</div>
				</div><!--/.hentry-->

<MTIfPingsActive>
				<div id="trackback">
					<h3>TrackBack</h3>
					<MTIfPingsAccepted><p id="trackback-url">TrackBack URL for this entry: <$MTEntryTrackbackLink$></p></MTIfPingsAccepted>
				<MTPings>
					<MTPingsHeader><p>Listed below are links to weblogs that reference <a href="<$MTEntryPermalink$>"><$MTEntryTitle$></a>:</p></MTPingsHeader>
					<dl class="trackback" id="ping-<$MTPingID$>">
						<dt>&raquo; <a rel="nofollow" href="<$MTPingURL$>"><$MTPingTitle$></a> from <$MTPingBlogName$>, on <a href="#ping-<$MTPingID$>"><abbr class="published" title="<$MTPingDate format="%y-%m-%dT%H:%M:%S"$><$MTBlogTimezone$>"><$MTPingDate$></abbr></a>...</dt>
						<dd>
							<p><$MTPingExcerpt$> <a rel="nofollow" href="<$MTPingURL$>">[Read More]</a></p>
						</dd>
					</dl>
					<MTPingsFooter></MTPingsFooter>
				</MTPings>
				</div><!--/#trackback-->
</MTIfPingsActive>

<MTIfCommentsActive>
				<div id="comments">
				<MTComments>
					<MTCommentsHeader>
					<h3>Comments</h3>
					<p><$MTEntryCommentCount$> responses so far. Go on, <a href="#add-comment">add yours</a>!</p>
					</MTCommentsHeader>
					<dl class="comment<MTSwitch value="[MTCommentEmail]"><MTSwCase value="paul.lloyd@fourtwo.net"> response</MTSwCase></MTSwitch>" id="comment-<$MTCommentID$>">
						<dt class="vcard"><img src="<$MTGravatar size="48" default="http://lloydyweb.paulrobertlloyd.com/_gfx/avatar.png"$>" class="photo" height="48" width="48" alt="<MTIfNonEmpty tag="CommentAuthorIdentity"><$MTCommentAuthorIdentity$>'s</MTIfNonEmpty> Gravatar" /><a href="#comment-<$MTCommentID$>" title="Permalink to this comment">#<$MTCommentOrderNumber$></a> On <abbr class="published" title="<$MTCommentDate format="%y-%m-%dT%H:%M:%S"$><$MTBlogTimezone$>"><$MTCommentDate$></abbr>, <span class="fn"><$MTCommentAuthorLink default_name="Anonymous" show_email="0"$><MTIfNonEmpty tag="CommentAuthorIdentity"><$MTCommentAuthorIdentity$></MTIfNonEmpty></span> said...</dt>
						<dd>
							<$MTCommentBody$>
						</dd>
					</dl>
					<MTCommentsFooter></MTCommentsFooter>
				</MTComments>
				</div><!--/#comments-->

				<MTEntryIfCommentsOpen> 
				<form method="post" action="<$MTCGIPath$><$MTCommentScript$>" id="add-comment" onsubmit="if (this.bakecookie.checked) rememberMe(this)">	
					<h4>Add Yours...</h4>
					<p><MTIfCommentsModerated>If you haven't commented here before, you may have to wait a little while before your comment gets published. </MTIfCommentsModerated>Your e-mail is required, but won't be published.<br />Show who you are with a <a href="http://gravatar.com/">Gravatar</a>!</p>
					<script type="text/javascript">
						<!--
						writeTypeKeyGreeting(commenter_name, <$MTEntryID$>);
						//-->
					</script>

					<fieldset id="comments-details">
						<legend>Contact Details</legend>
						<div id="name-email">
							<p class="comment-author"><label for="comment-author">Name:</label> <input id="comment-author" class="text" type="text" name="author" size="30" /> <em class="required">Required</em></p>
							<p class="comment-email"><label for="comment-email">Email Address:</label> <input id="comment-email" class="text" type="text" name="email" size="30" /> <em class="required">Required</em></p>
						</div>
						<p class="comment-url"><label for="comment-url">Website:</label> <input id="comment-url" class="text" type="text" name="url" size="30" /></p>
						<p class="comment-bake-cookie"><label for="comment-bake-cookie"><input id="comment-bake-cookie" name="bakecookie" class="checkbox" type="checkbox" onclick="if (!this.checked) forgetMe(document.comments_form)" value="1" /> Remember these details?</label></p>
					</fieldset>
			
					<fieldset id="comments-text">
						<legend>Comments</legend>
						<p class="comment-text"><label for="comment-text">Comment:</label> <textarea id="comment-text" name="text" rows="15" cols="50" onkeyup="textReload();"></textarea></p>
						<MTIfAllowCommentHTML>
							<p><em>You may use HTML tags for style</em></p>
						<MTElse>
							<p><em>Please use <a href="http://www.textism.com/tools/textile/">Textile</a> for any formatting as HTML is stripped out. A preview of your entry appears below.</em></p>
						</MTElse>	
						</MTIfAllowCommentHTML>
					</fieldset>

					<fieldset id="comments-preview">
						<legend>Comment Preview</legend>
						<div id="comment-text-display"></div>
					</fieldset>
					
					<p id="comments-post">
						<input type="hidden" name="static" value="1" />
						<input type="hidden" name="entry_id" value="<$MTEntryID$>" />
						<input type="image" id="comment-post" name="post" src="/_gfx/post-comment.gif" alt="Post Comment" />
					</p>
				</form>
				</MTEntryIfCommentsOpen>
				<MTIfCommentsAccepted><div id="cocomment-fetchlet"><!--script src="http://www.cocomment.com/js/enabler.js" type="text/javascript"></script--></div></MTIfCommentsAccepted>
</MTIfCommentsActive>
			</div><!--/#content-primary-->

			<div id="content-secondary">
<MTIfNonEmpty tag="EntryExcerpt">
	<MTKeyValues source="[MTEntryExcerpt]">
		<MTIfCategory name="Review">
					<div class="module">
			<MTIfCategory name="Music">
						<h4>Album Details</h4>
						<dl class="details">
							<dt>Artist:</dt>
							<dd><MTKeyValue key="artist"></dd>
							<dt>Produced by:</dt>
							<dd><MTKeyValue key="other"></dd>
							<dt>Label:</dt>
							<dd><MTKeyValue key="label"></dd>
			</MTIfCategory>
			<MTIfCategory name="Films">
						<h4>Film Details</h4>
						<dl class="details">
							<dt>Directed by:</dt>
							<dd><MTKeyValue key="artist"></dd>
							<dt>Staring:</dt>
							<dd><MTKeyValue key="other"></dd>
							<dt>Certificate:</dt>
							<dd><img src="/blog/_gfx/reviews/cert-<MTKeyValue key="cert">.gif" alt="<MTKeyValue key="cert">" /></dd>
							<dt>Studio:</dt>
							<dd><MTKeyValue key="label"></dd>
			</MTIfCategory>
			<MTIfCategory name="Live">
							<dt>Performing:</dt>
							<dd><MTKeyValue key="artist"><MTIfKeyExists key="support"><br /><MTKeyValue key="support"></MTIfKeyExists></dd>
							<dt>Venue:</dt>
							<dd><MTKeyValue key="other"></dd>
			</MTIfCategory>
			<MTIfCategory name="Books">
						<h4>Book Details</h4>
						<dl class="details">
							<dt>Author:</dt>
							<dd><MTKeyValue key="artist"></dd>
							<dt>Published by:</dt>
							<dd><MTKeyValue key="label"></dd>
							<dt>Pages:</dt>
							<dd><MTKeyValue key="other"></dd>
							<dt>ISBN:</dt>
							<dd><MTKeyValue key="asin"></dd>
			</MTIfCategory>
							<dt>Rating:</dt>
							<dd><abbr class="rating" title="<MTKeyValue key="rating">"><img src="/blog/_gfx/reviews/rate-<MTKeyValue key="rating">.gif" alt="<MTKeyValue key="rating">&#47;10" /></abbr></dd>
						</dl>
					</div>
		</MTIfCategory>
	</MTKeyValues>
</MTIfNonEmpty>
<MTIfNonEmpty tag="EntryExcerpt">
	<MTKeyValues source="[MTEntryExcerpt]">
		<MTIfKeyExists key="asin">
						<div class="module purchase">
							<h4>Shop with Amazon.co.uk</h4>
							<p><a href="http://www.amazon.co.uk/exec/obidos/ASIN/<MTKeyValue key="asin">/lloydyweb/"><$MTEntryTitle encode_html="1"$></a></p>
						</div>
		</MTIfKeyExists>
	</MTKeyValues>
</MTIfNonEmpty>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-aboutme.inc.php'); ?>
				<div class="module">
					<h4>About this entry</h4>
					<p>This entry was written on <abbr class="published <MTIfCategory name="Review">dtreviewed</MTIfCategory>" title="<$MTEntryDate format="%y-%m-%dT%H:%M:%S"$><$MTBlogTimezone$>"><$MTEntryDate format="%e %b %Y"$>, <$MTEntryDate format="%l:%M %p"$></abbr> and is filled under <MTEntryCategories glue=", "><a href="<$MTCategoryArchiveLink$>" rel="tag"><$MTCategoryLabel$></a></MTEntryCategories>.</p>
<MTEntryIfTagged>
					<p>It has the following tags:</p>
					<ul class="tags">
						<MTEntryTags><li><a href="http://technorati.com/tag/<$MTTagName$>" rel="tag"><$MTTagName$></a></li></MTEntryTags>
					</ul>
</MTEntryIfTagged>
				</div><!--/.module-->

				<!--div class="module">
					<h4>Spread the word!</h4>
					<p>Like what you've read? Don't keep it to yourself, tell the world!</p>
					<ul>
						<li class="digg"><a href="http://digg.com/submit?phase=2&#38;url=<$MTEntryPermalink encode_url="1"$>&#38;title=<$MTEntryTitle encode_url="1"$>">Digg It!</a></li>
						<li class="delicious"><a href="http://del.icio.us/post/?v=3&#38;url=<$MTEntryPermalink encode_url="1"$>&#38;title=<$MTEntryTitle encode_url="1"$>">Add to your Del.icio.us bookmarks</a></li>
					</ul>
				</div--><!--/.module-->
			</div><!--/#content-secondary-->
			
			<div id="content-tertiary">
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-recententries.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-categories.inc.php'); ?>
			</div><!--/#content-tertiary-->
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/navigation.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/siteinfo.inc.php'); ?>