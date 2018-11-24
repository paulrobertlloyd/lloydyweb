<?php
	require($_SERVER['DOCUMENT_ROOT'].'/_inc/functions.inc.php');

	$pageTitle 	= 'Archive: <$MTArchiveTitle encode_php="1"$>';
	$section 	= 'blog';
?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/doctype.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/head.inc.php'); ?>
	<MTArchivePrevious><link rel="prev" href="<$MTArchiveLink$>" title="<$MTArchiveTitle encode_html="1"$>" /></MTArchivePrevious>
	<MTArchiveNext><link rel="next" href="<$MTArchiveLink$>" title="<$MTArchiveTitle encode_html="1"$>" /></MTArchiveNext>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/branding.inc.php'); ?>
			<div id="content-primary" class="hfeed">
				<p class="intro">Monthly Archive</p>
				<h1><span><$MTArchiveTitle$></span></h1>

				<MTEntries sort_by="created_on" sort_order="ascend">
<$MTInclude module="entrysummary.mt"$>
				</MTEntries>
			</div><!--/#content-primary-->
               
			<div id="content-secondary">
				<div class="module month">
					<h4>About <$MTArchiveDate format="%B %Y"$></h4>
					<p>This page contains all entries posted to the blog during <strong><$MTArchiveDate format="%B %Y"$></strong>. They are listed from oldest to newest.</p>
					<ul class="navigation">
						<MTArchivePrevious><li class="prev"><a href="<$MTArchiveLink$>" title="Previous Month"><$MTArchiveTitle$></a></li></MTArchivePrevious>
						<MTArchiveNext><li class="next"><a href="<$MTArchiveLink$>" title="Following Month"><$MTArchiveTitle$></a></li></MTArchiveNext>
					</ul>
				</div><!--/.module-->
			</div><!--/#content-secondary-->

			<div id="content-tertiary">
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-recententries.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-categories.inc.php'); ?>
			</div><!--/#content-tertiary-->
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/navigation.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/siteinfo.inc.php'); ?>