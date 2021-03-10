<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Validation Assignment</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<?php
		if(isset($_POST['insert']) ){
			
			//Form Value Get

			$name	= $_POST['name'];
			$email	= $_POST['email'];
			$cell	= $_POST['cell'];
			$age 	= $_POST['age'];

			//Maths Solution Validateion

			$mathsolu= $_POST['mathsol'];
	
			
			//String Captcha Validateion

			$strsolus= $_POST['strcap'];

			//Profile Pictrue Validation

			$profpic = $_FILES['propic'];
			
			$pic_name = $profpic['name'];
			$Pic_temp_name = $profpic['tmp_name'];
			$pic_size = $profpic['size'];

			//Profile pic unique name

			$pro_pic_uni= time().rand(1, 99999)."_" . $pic_name;
			move_uploaded_file($Pic_temp_name, 'photos/' .$pro_pic_uni);

			//File upload Format

			$file_formate= explode('.', $pic_name);
			$file_form_last= end($file_formate);


			//File Size
			$pro_pic_size=$pic_size/1024;
			


			//Check Email
			$emailcheck= explode('@', $email);
			$prop_mail = end($emailcheck);

			$cellcheck = substr($cell, 0, 3);

			//Age Validateion

			$agefact= $age >=18 && $age <= 40;
			
			//Maths Solution Validateion

			$agefact= $age >=18 && $age <= 40;
			
			//String Captcha Validateion

			$agefact= $age >=18 && $age <= 40;


			if(empty($name)){
				$err ['name']=" *** Name is Required ";
			};
			if(empty($email)){
				$err ['email']=" *** Email is Required ";
			};

			if(empty($cell)){
				$err ['cell']=" *** Phone is Required ";
			};

			if(empty($age)){
				$err ['age']=" *** Age is Required ";
			};

			


		//Form Validation

		if(empty($name) || empty($email) || empty($cell) || empty($age)  ){
			$msg = "All Fields are Required";
		}  else if (filter_var($email, FILTER_VALIDATE_EMAIL)==false){
			$msg ="Sorry!! Invalid Email";
		}else if($prop_mail!='gmail.com'){
			$msg = "Sorry Email should be Gmail.com Only";

		}else if(in_array($cellcheck, ['017','018','019','016','014','013']) == false){
			$msg = "Please Enter a valid Bangladeshi Mobile Number";

		}else if(in_array($file_form_last, ['jpg','jpeg','png'])==false){
			$msg = "Please upload a Valid Image";
		}else if($pro_pic_size>500){
			$msg = "Maximum Image Size 500 KB Allowed";

		}else if($agefact==false){
			$msg = "Sorry You are Not Eligable to Signup this form - Age Fact";
		}else if($mathsolu!=14){
			$msg = "Invalid Captcha. Please Try Again";
		}else if($strsolus!="DHAKA"){
			$msg = "Invalid WORD. Please Try Again";
		}		
		else{
			$msg = "Your Data submitted Successfully";
		} 

		}

	?>

	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Registration Form</h2>

				<?php
				if(isset($msg)){

					echo $msg;
				}
					
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
						<?php
							if(isset($err['name'])){

							echo $err['name'];
							}
					
						?>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
						<?php
							if(isset($err['email'])){

							echo $err['email'];
							}
					
						?>
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
						<?php
							if(isset($err['cell'])){

							echo $err['cell'];
							}
					
						?>
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" type="text">
						<?php
							if(isset($err['age'])){

							echo $err['age'];
							}
					
						?>
					</div>
<!-- Math Solution System  -->

					<div class="form-group">
						<label for="">Enter The Value of : 5 + 9</label>
						<input name="mathsol" class="form-control" type="text">
						<?php
							if(isset($err['mathsol'])){

							echo $err['mathsol'];
							}
					
						?>
					</div>


<!-- Srting Captcha Solution System  -->

					<div class="form-group">
						<label for="">Write the word as it is : DHAKA</label>
						<input name="strcap" class="form-control" type="text">
						<?php
							if(isset($err['strcap'])){

							echo $err['strcap'];
							}
					
						?>
					</div>








					<div class="form-group">

						<div class="form-grou">
							
							<img id="profile_photo" src="" alt="">
						
						</div>

						<label for="">Profile Picture</label>
						<input name="propic" class="form-control" type="file">
						<?php
							if(isset($err['age'])){

							echo $err['age'];
							}
					
						?>
					</div>







					<div class="form-group">
						<input name="insert" class="btn btn-primary" type="submit" value="Submit Now">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<script>
		$('input[name="propic"]').change(function(e){
			let file_url = URL.createObjectURL(e.target.files[0]);

			$('img#profile_photo').attr('src', file_url);


		})
		
		</script>

</body>
</html>