				<div class="hentry" id="entry-<$MTEntryID$>">
					<h3 class="entry-title"><a href="<$MTEntryPermalink$>"><$MTEntryTitle encode_html="1" widont="1"$></a></h3>
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
				</div>
