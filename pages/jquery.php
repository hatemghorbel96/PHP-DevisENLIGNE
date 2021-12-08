	<script>
		$(document).ready(function(){
			$(".Fin").hide();
			<?php 
				$n=$devis->nbquestion($_POST['menu']);
				for($j=2;$j<=$n;$j++)		
				{
					?>
					$(".question<?php echo $j; ?>").hide();
				<?php
				}
				$t=array();
				for($i=0;$i<$n;$i++)
					$array[$i]=$devis->getNbRep($_POST['menu'],$i);
				
				$nbtot=0;
				for($i=0;$i<$n;$i++)
					$nbtot+=$array[$i];
				
				
				
				
				$x=1;
				for($i=0;$i<$n;$i++)
				{$j=1;
					while($j<=$array[$i])
					{
						?>
					
							$("#rep<?php echo $x; ?>").click(function(){
								$(".question<?php echo $i+1; ?>").hide();
								<?php if($i == $n-1)
									echo '$(".Fin").show("slow");';
								else
								{ $xx=$i+2;
								echo '$(".question'.$xx.'").show("slow");';
								}	
								 ?>
								
							});
						
						<?php
						$j++;$x++;
					}
				}
				
				?>
				
				
				
				
				
		});
	
	
	
	
	
	</script>