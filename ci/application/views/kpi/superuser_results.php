<div id="user-contents" class="contents">
	<div class="accountlist">
		<?php
			if ($active) {
				echo form_open('deactivate_results');
				echo "<h2>Currently active result: ".$active[0]['results_name']."</h2>";
				echo "<input type='hidden' name='active' value='".$active[0]['results_id']."'></input>";
				echo "<button type='submit'".($end_result ? '' : ' disabled' ).">End ".$active[0]['results_name']." Result</button>";
			}
			else {
				echo "<h2>No active result</h2>";
				echo $this->session->flashdata('errors');
				echo form_open('activate_results');
				echo "<label>Result name<label>";
				echo "<input type='text' name='results_name'></input>";
				echo "<button>Activate Result</button>";
				echo form_close();
			}
		?>
	</div>
</div>



<!--<a href="delete_account?q='.$account_item->user_id.'">-->