<?php include("_site_header.php")?>

<div class="container">

	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Message board</div>
	  <div class="panel-body">
	    <p> Left your message here. </p>
	  </div>

	  <!-- Table -->
	  <table class="table">
  		<tr>
  			<th>Poster</th>
  			<th>Time</th>
  			<th>Content</th>
  			<th>&nbsp;</th>
  		</tr>
  		<?php if(count($messages) == 0 ){?>
			<tr><td colspan="4"><p > Oops,no any message here.</p></td></tr>
  		<?php }?>
  		<?php foreach($messages as $message){ ?>
  			<tr>
	  			<td><?=h($message["name"])?></td>
	  			<td><?=_display_date_with_fulldate_ms($message["createDate"])?></td>
	  			<td><?=h($message["content"])?></td>
	  			<td><a class="btn btn-default" href="<?=site_url("post/reply/".h($message["_id"]))?>">Reply</a></td>
	  		</tr>
  		<?php }?>
	  </table>
	</div>
</div>

<?php include("_site_footer.php")?>