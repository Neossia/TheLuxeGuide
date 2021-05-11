<script>
	(function($) {
		$(document).ready(function(){
			$("#checkAll").click(function(){
				$("#edit-").find('input:checkbox').not(this).prop('checked', this.checked);
			});

		});	
	})(this.jQuery);
</script>

<b>Click this to check all default values: </b>
<input type="checkbox" id="checkAll">Check All
<?php print drupal_render_children($form);?>