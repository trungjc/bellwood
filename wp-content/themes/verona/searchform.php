<form class="search" id="search-form" action="<?php echo home_url(); ?>/" method="get">

	<fieldset>

		<input class="fade" name="s" id="s" type="text" onfocus="if(this.value=='Type Here to Search') this.value='';" onblur="if(this.value=='') this.value='Type Here to Search';" value="Type Here to Search" />
		
		<input class="searchbutton" type="submit" value="Search" />

	</fieldset>

</form>