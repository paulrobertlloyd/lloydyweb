<?php
	require($_SERVER['DOCUMENT_ROOT'].'/_inc/functions.inc.php');

	$pageTitle 	= '<$MTBlogName encode_html="1"$>';
	$section 	= 'archive';
?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/doctype.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/head.inc.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/_inc/branding.inc.php'); ?>
			<div id="content-primary">
				<h1><span>Blog Archive</span></h1>
				
				<ul class="navigation">
<MTArchiveList archive_type="Monthly">
					<li><a href="<$MTArchiveLink$>"><$MTArchiveTitle encode_html="1"$></a>/<MTArchiveCount></li>		
</MTArchiveList>
				</ul>
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