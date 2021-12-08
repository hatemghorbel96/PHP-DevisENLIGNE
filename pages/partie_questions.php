
<div class="devis">
			<?php
			$c=1;
			$choix=$_POST["menu"];

			$res=$devis->lesquestions($choix);
			if($res)
			{
				$nb=1;
				foreach ($res as $q)
				{
				?>
					<div class="question<?php echo $nb; ?>">
						<h1><?php echo $q[2];?></h1>
						<?php
		
		
						$leschoix=explode("/",$q[3]);
		
						switch($q[4])
						{
							case "radio":for($i=0;$i<count($leschoix);$i++)
								{if ($leschoix[$i]=="Autres     " )
									{?><input id='<?php echo "Autrerep$c";?>' type='radio' name=<?php echo 'reponce'.$nb; ?> value="<?php echo $leschoix[$i]?htmlspecialchars($leschoix[$i]):'';?>" /><?php echo "$leschoix[$i]<br>";?>
								<script>$(document).ready(function(){
										$(".Autrerep<?php echo $c;?>").click(function(){
											.("question<?php echo $nb; ?>").hide();
										});
										$("#autre<?php echo $c;?>").click(function(){
											$(".autre<?php echo $c; $ques=$nb+1;?>").hide();
											$(".question<? echo $ques;?>").show("slow");
										});
									});</script>
										<?php echo "<div class='autre$c'><input type='text' name='reponce' placeholder='Autres'><br><input type='button' id='autre$c' value='Suivant'></div><br>";
										
									}
								else{
									echo "<input type='radio' id='rep$c' name='reponce$nb' value='$leschoix[$i]'>$leschoix[$i]";
								}
									$c++;
								}break;

							case "textarea":echo "<textarea  name='reponce$nb'></textarea><br><input type='button' id='rep$c' value='Suivant' /> ";$c++;break;
							case "text":echo "<input  type='text' name='reponce$nb' /><br><input type='button' id='rep$c' value='Suivant' /> ";$c++;break;
							case "checkbox": for($i=0;$i<count($leschoix);$i++)
									{
									if ($leschoix[$i]=="Autre" || $leschoix[$i]=="Autres")
										echo "Autre : <input  type='text' name='reponceA$nb' />";
									else
									{
										$name='reponce'.$nb.'[]';
										
											echo "<input type='checkbox' name=$name value='$leschoix[$i]'>$leschoix[$i]<br>";
									}
									}
									echo"<br><input type='button' id='rep$c' value='Suivant' /> ";$c++;break;
			
						}
						$nb++;
						?>
				
					</div>
		
				<?php
			}
		}
				?>
			</div>

