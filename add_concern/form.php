<?php
@$fb_name = $_GET['name'];
@$fb_id = $_GET['fb_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Share a concern</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<script type="text/javascript" src="view.js"></script>
	<script type="text/javascript" src="calendar.js"></script>
	<script type="text/javascript" src="validate.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	
	<!--..form container starts here...-->	 
	<div id="form_container">
		
		<!--....heading.....-->
		<h1><a>Share a concern</a></h1>
		
		<!--.....form starts here....-->
		<form id="form_316650" class="appnitro" name="register"  method="post" enctype="multipart/form-data" action="success.php" onsubmit="return validate();">
					<div class="form_description">
					<h2>IEEE SIGHT initiative</h2>
					<p>Click, comment and share. Create awareness about humanitarian concerns.</p>
					</div>	
					
					
			<!--...form members as unordered list...-->		
			<ul >
			
					<h2>Concern details</h2>
					<!--....concern_title.....-->
					<li id="li_1" >
						<label class="description" for="element_1">Concern Title: </label>
						<div>
							<input id="element_1" name="concern_title" class="element text medium" type="text" maxlength="20" value=""/> 
						</div> 
					</li>		

					<!--....concern_desc.....-->
					<li id="li_1" >
						<label class="description" for="element_1">Concern Desctiption: </label>
						<div>
							<textarea id="element_1" name="concern_desc" class="element text medium" value="" rows="4" cols="20"> 
							</textarea>
						</div> 
					</li>	

					<!--....concern_soln.....-->
					<li id="li_1" >
						<label class="description" for="element_1">Suggestions for solution: </label>
						<div>
							<textarea id="element_1" name="concern_soln" class="element text medium"  value="" rows="4" cols="20"> 
							</textarea>
						</div> 
					</li>

					<!--....concern_cost.....-->
					<li id="li_1" >
						<label class="description" for="element_1">Estimated cost: </label>
						<div>
							<input id="element_1" name="estimate_cost" class="element text medium" type="text" maxlength="20" value=""/> INR
						</div> 
					</li>

				<!--.....Image upload....-->
					<li id="li_10" >
						<label class="description" for="element_10">Upload image </label>
						<div>
							<input id="element_10_1" name="upload" class="element" type="file" value="" />
						</div> 
					</li>

					<h2>Reporter details</h2>
					<!--....name.....-->
					<li id="li_1" >
						<label class="description" for="element_1">Name: </label>
						<div>
							<input id="element_1" name="fb_name" class="element text medium" type="text" maxlength="20" value="<?php echo $fb_name;?>"/> 
						</div> 
					</li>		
					
					
					<!--.....username....-->
					<li id="li_2" >
						<label class="description" for="element_2">SIGHT Username: </label>
						<div>
							<input id="element_2" name="uname" class="element text medium" type="text" maxlength="20" value=""/> 
						</div> 
					</li>
					
					<!--....section.....-->
					<li id="li_11" >
						<label class="description" for="element_11">IEEE Section: </label>
						<div>
							<select class="element select medium" id="element_11" name="section"> 
							<option value="" selected="selected"></option>
                                                        <option value="A" >Section A</option>
                                                        <option value="B" >Section B</option>
                                                        <option value="C" >Section C</option>
                         	</select>
						</div> 
					</li>

					<!--....sb.....-->
					<li id="li_11" >
						<label class="description" for="element_11">IEEE SB: </label>
						<div>
							<select class="element select medium" id="element_11" name="sb"> 
							<option value="" selected="selected"></option>
                                                        <option value="A" >SB A</option>
                                                        <option value="B" >SB B</option>
                                                        <option value="C" >SB C</option>
                         	</select>
						</div> 
					</li>
                  
					<!--.....Ready to volunteer....-->
					<li id="li_10" >
						<label class="description" for="element_10">Are you ready to volunteer? </label>
						<span>
							<input id="element_10_1" name="ready_volunteer" class="element checkbox" type="radio" value="1" />
							<label class="choice" for="element_10_1">Yes</label>
							<input id="element_10_2" name="ready_volunteer" class="element checkbox" type="radio" value="0" />
							<label class="choice" for="element_10_2">No</label>
						</span> 
					</li>

					<!--.....Do you have a team?....-->
					<li id="li_10" >
						<label class="description" for="element_10">Do you have a team?</label>
						<span>
							<input id="element_10_1" name="ready_team" class="element checkbox" type="radio" value="1" />
							<label class="choice" for="element_10_1">Yes</label>
							<input id="element_10_2" name="ready_team" class="element checkbox" type="radio" value="0" />
							<label class="choice" for="element_10_2">No</label>
						</span> 
					</li>
					
					
					<!--...submit......-->
					<li class="buttons">
						<input type="hidden" name="form_id" value="316650" />			    
						<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
					</li>
			<!--....unordered list ends here.....-->
			</ul>

		<!--....hidden fb id.....-->
			<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>" /> 

		<!--....form ends here.....-->
		</form>	
		
		<!--....footer.....-->
		<div id="footer">
			Powered by<a href="http://www.ieee.org">IEEE</a>
		</div>
		<!--....footer ends here.....-->
		
		</div>
		<!--....container ends here.....-->
	
		<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
