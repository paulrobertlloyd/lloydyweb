<?php
	require($_SERVER['DOCUMENT_ROOT'].'/_inc/functions.inc.php');

	$pageTitle 	= 'Category: <$MTArchiveTitle encode_php="1"$>';
	$section 	= 'blog';
?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/doctype.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/head.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/branding.inc.php'); ?>
			<div id="content-primary" class="hfeed">
				<p class="intro">Category Archive</p>
				<h1><span><$MTArchiveTitle$></span></h1>
				<MTEntries sort_by="created_on" sort_order="descend">
<$MTInclude module="entrysummary.mt"$>
				</MTEntries>
			</div><!--/#content-primary-->

			<div id="content-secondary">
				<div class="module">
					<h4>About the entries in this category</h4>
					<p><$MTCategoryDescription$></p>
				</div>
			</div><!--/#content-secondary-->

			<div id="content-tertiary">
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-recententries.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/mod-categories.inc.php'); ?>
			</div><!--/#content-tertiary-->
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/navigation.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/siteinfo.inc.php'); ?>