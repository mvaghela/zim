<?php 
		$last_msg_id=$_GET['last_msg_id'];
		$action=$_GET['action'];
		
		if($action <> "get")
		{ ?>

<!-- infinite script -->
<script type="text/javascript">
				//alert("refresh");
				$(document).ready(function(){
					//alert("refresh");
					var lock=0;	
					//var calls = 0;
					function last_msg_funtionnew()
					{	
						//alert("func");
						//calls = calls + 1;
						//$("#calls_check").attr("width",calls);
						//alert("refresh");
						if(lock==1){
							return false;
						}
						lock=1;	
						//alert("lock="+lock);
						var ID=$(".message_box:last").attr("id");
						//alert(ID);
						//alert("refersh_second.php?action=get&last_msg_id="+ID);
						//$('div#last_msg_loader').html('<img src="images/loading1.gif">');
						//alert("loadMore.php?action=get&last_msg_id="+ID);
						$.post("refersh_second.php?action=get&last_msg_id="+ID,
					
						function(data){
							if (data != ""){
								lock=0;
								$(".message_box:last").after(data);
							}
							$('div#last_msg_loader').empty();
						});
					};
					
					$(window).scroll(function(){
						if ($(window).scrollTop() == $(document).height() - $(window).height()){

					/*$(window).scroll(function(){
						if (($(document).height()-300) <= ( $(window).height() + $(window).scrollTop())){*/
							last_msg_funtionnew();
						}
					});
				});
			</script>

<!-- infinite script end -->

<?php include("refersh_first.php"); ?>
<div id="last_msg_loader"></div>
<?php } 
		
		else
		{   
			include('refersh_second.php');		
		}
		?>
