				<MTIfArchiveTypeEnabled type="Category">
				<div class="module categories">
<?php if ($section != 'sitemap'): ?>
					<h4>Categories</h4>
<?php endif; ?>
					<MTTopLevelCategories>
					<ul class="navigation">
					<MTIfNonZero tag="MTCategoryCount">
						<li><a href="<$MTCategoryArchiveLink$>" title="<$MTCategoryDescription$>"><MTCategoryLabel></a>/<$MTCategoryCount$>
						<MTElse>
						<li><MTCategoryLabel>
						</MTElse>
					</MTIfNonZero>
						</li>
					</ul>
					</MTTopLevelCategories>
				</div><!--/.module-->
				</MTIfArchiveTypeEnabled>
