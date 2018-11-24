<?php
	require($_SERVER['DOCUMENT_ROOT'].'/_inc/functions.inc.php');

	//$pageTitle 	= 'The top is a very lonely place to be. Gravity doesn\'t help either...';
	$pageTitle 	= 'A little nonsense, now and then, is relished by the wisest men';
	$section 	= 'home';
?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/doctype.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/head.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/branding.inc.php'); ?>
			<div id="content-primary" class="hfeed">
<MTEntries lastn="1">
				<div class="hentry" id="entry-<$MTEntryID$>">
					<h1 class="entry-title"><a href="<$MTEntryPermalink$>"><$MTEntryTitle widont="1"$></a></h1>
					<ul class="entry-info">
						<li><a href="<$MTEntryPermalink$>" rel="bookmark"><abbr class="published" title="<$MTEntryDate format="%y-%m-%dT%H:%M:%S"$><$MTBlogTimezone$>"><$MTEntryDate format="%e %b %Y"$></abbr></a></li>
						<MTIfNonEmpty tag="EntryAuthorDisplayName"><!--li>Author: <address class="vcard author"><a class="url fn" href="<$MTEntryAuthorURL$>"><$MTEntryAuthorDisplayName$></a></address></li--></MTIfNonEmpty>
						<MTIfPingsActive><li><a href="<$MTEntryPermalink$>#trackback">TrackBacks (<$MTEntryTrackbackCount$>)</a></li></MTIfPingsActive>
						<MTIfCommentsActive><li><strong><a href="<$MTEntryPermalink$>#comments">Comments (<$MTEntryCommentCount$>)</a></strong></li></MTIfCommentsActive>
					</ul>
					<div class="entry-content">
<$MTEntryBody smarty_pants="1" widont="1"$>
<MTIfNonEmpty tag="EntryMore" convert_breaks="0"><p class="entry-more"><a href="<$MTEntryPermalink$>#more">Continue reading &#8220;<$MTEntryTitle$>&#8221;</a></p></MTIfNonEmpty>
					</div>
				</div><!--/.hentry-->
</MTEntries>
			</div><!--/#content-primary-->

			<div id="content-secondary">
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-aboutme.inc.php'); ?>
			</div><!--/#content-secondary-->
			
			<div id="content-tertiary">
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-recententries.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-categories.inc.php'); ?>
			</div><!--/#content-tertiary-->
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/navigation.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/siteinfo.inc.php'); ?>