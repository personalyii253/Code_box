<script src="<?php echo base_url()?>/jquery-2.1.4.min.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
</head>
<body id="did">
	<table border=1>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php foreach($arr as $v):?>
		<tr>
			<td><?php echo $v['a_id']?></td>

			<td onclick="user(<?php echo $v['a_id']?>)">
				<input id="u<?php echo $v['a_id']?>" value="<?php echo $v['a_name']?>" onblur="co(<?php echo $v['a_id']?>)" type="text" style="display:none"/>
				<span id="r<?php echo $v['a_id']?>"><?php echo $v['a_name']?></span>
			<!-- <?php echo $v['a_name']?> -->
			</td>

			<td><?php echo $v['a_last']?></td>
		</tr>
		<?php endforeach;?>
	</table>
	<?php echo $page?>
</body>
</html>
<script type="text/javascript">
	//分页
	function fun(page){
		$.ajax({
		   type: "POST",
		   url: "<?php echo site_url('Welcome/index')?>",
		   data: "page="+page,
		   success:function(msg){
				$('#did').html(msg);
		   }
		})
	}
	//显示文本框隐藏span
	function user(a_id){
		$('#u'+a_id).show();
		$('#u'+a_id).focus();
		$('#r'+a_id).hide();
	}
	//修改
	function co(a_id){
		var vals=$('#u'+a_id).val();
		$.ajax({
		   type: "POST",
		   url: "<?php echo site_url('Welcome/up_xiu')?>",
		   data: "a_id="+a_id+"&&vals="+vals,
		   success:function(data){
				$('#r'+a_id).show();
				$('#u'+a_id).hide();
				$('#r'+a_id).html(vals);
		   }
		})
	}
</script>