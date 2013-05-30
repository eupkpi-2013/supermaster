<div id="user-contents" class="contents">
  <div id="user-kpimenu" class="accordion menu lefted">
		<?php foreach ($iscu as $iscu_item): 
			$url = $iscu_item['iscu'];
			echo "<a href='superuser_assign?iscu=".$url."'><div><h3>".$iscu_item['iscu']."</h3>";
			echo "</div></a>";
		endforeach; 
		?>
	</div>	
	<div id="user-inside" class="inside">
		<?php
		//print_r('<pre>');print_r($metric);print_r('</pre>');
		echo $this->session->flashdata('errors');
		if (!empty($active)) echo "<h2>Currently active result: ".$active[0]['results_name']."</h2><p>Assigning IS/CUs to KPIs is not allowed.";
		else if (empty($_GET['iscu']) || !in_array(array('iscu'=>$_GET['iscu']), $iscu)){
			echo "<h3>Choose from the left</h3>";
		} else {
			echo "<h3>".$_GET['iscu']."</h3>";

			echo form_open('assignISCU');
			echo "<ul class='indented-list'>";
			foreach ($kpi as $kpi_item): 
				echo "<li><input class='checklist' type='checkbox' name='kpi[]' value='".$kpi_item['kpi_id']."'>KPI: &nbsp".$kpi_item['kpi_name']."</input>";
				echo "<ul class='indented-list'>";
					foreach ($subkpi as $subkpi_item): 
						if($subkpi_item['parent_kpi']==$kpi_item['kpi_id'])
						{
							echo "<li><input type='checkbox' name='subkpi[]' value=\"".$subkpi_item['kpi_id']."\">Sub-KPI: &nbsp".$subkpi_item['kpi_name']."</input>";
							echo "<ul class='indented-list'>";
							foreach ($metric as $metric_item): 	
								if($metric_item['kpi_id']==$subkpi_item['kpi_id'])
								{
									echo "<li><input type='checkbox' name='metric[]' value=\"".$metric_item['field_id']."\">Metric: &nbsp".$metric_item['field_name']."</input></li>"; 						
								}
							endforeach;
							echo "</ul></li>";
						}
					endforeach; 
				echo "</ul></li>";
			endforeach;
			echo "</ul>";
			echo "<input type='hidden' name='iscu' value='".$_GET['iscu']."'/>";
			echo "<button class='righted' onclick='submit()'>Save</button>";
			echo "</form>";
		}
		?>
	</div>
</div>
<script>
	$(function() {
      $('input[type="checkbox"]').change(function(e) {
      var checked = $(this).prop("checked"),
          container = $(this).parent(),
          siblings = container.siblings();
  
      container.find('input[type="checkbox"]').prop({
          indeterminate: false,
          checked: checked
      });
  
      function checkSiblings(el) {
          var parent = el.parent().parent(),
              all = true;
  
          el.siblings().each(function() {
              return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
          });
  
          if (all && checked) {
              parent.children('input[type="checkbox"]').prop({
                  indeterminate: false,
                  checked: checked
              });
              checkSiblings(parent);
          } else if (all && !checked) {
              parent.children('input[type="checkbox"]').prop("checked", checked);
              parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find('input[type="checkbox"]:checked').length > 0));
              checkSiblings(parent);
          } else {
              el.parents("li").children('input[type="checkbox"]').prop({
                  indeterminate: true,
                  checked: false
              });
          }
        }
    
        checkSiblings(container);
      });
    });
    </script>


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>