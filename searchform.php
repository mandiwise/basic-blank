<form action="<?php bloginfo('siteurl'); ?>" class="searchform" method="get">
	<label for="s" class="screen-reader">Search for:</label>
	<input type="text" name="s" class="s" value="Type and hit enter to search" onfocus="if (this.value == 'Type and hit enter to search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type and hit enter to search';}" />
	<input type="submit" value="Search" class="searchsubmit" />
</form>