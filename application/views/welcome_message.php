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
  			<th>Content</th>
  			<th>Time</th>
  			<th>&nbsp;</th>
  		</tr>
  		<?php if(count($messages) == 0 ){?>
			<tr><td colspan="4"><p > Oops,no any message here.</p></td></tr>
  		<?php }?>
  		<?php foreach($messages as $message){ ?>
  			<tr>
	  			<td>* <?=h($message["name"])?></td>
	  			<td><?=h($message["content"])?></td>
	  			<td><?=_display_date_with_fulldate_ms($message["createDate"])?></td>
	  			<td><a class="btn btn-default" href="<?=site_url("post/reply/".h($message["_id"]))?>">Reply</a></td>
	  		</tr>

			<?php if(isset($message["replied"])){?>
		  		<?php foreach($message["replied"] as $replied_message ){ ?>
	  			<tr>
		  			<td style="padding-left:20px;">+ <?=h($message["name"])?> Replied: </td>
		  			<td><?=h($message["content"])?></td>
		  			<td><?=_display_date_with_fulldate_ms($message["createDate"])?></td>
		  			<td> &nbsp; </td>
		  		</tr>
		  		<?php }?>
	  		<?php }?>
  		<?php }?>
	  </table>
	</div>
</div>

<?php include("_site_footer.php")?>