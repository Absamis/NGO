<?php
declare(strict_types=1);
$gender=$gender_err=$n_err=$s_err=$txt_err=$num_err=$ph_err=$em_err=$img_err=$vid_err="";
$name=array();
$email=array();
$select=array();
$number=array();
$phone=array();
$video = array();
$text=array();
$tmp=array();
$vtmp = array();
$image=array();
$name_err=array();
$select_err=array();
$number_err=array();
$phone_err=array();
$email_err=array();
$image_err=array();
$video_err = array();
$text_err=array();
try{
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST["submit"])){
		//Validate names
		if(isset($_POST["name"])){
			for($i=0;$i<=count($_POST['name'])-1;$i++){
				$input=trim(htmlspecialchars($_POST["name"][$i]));
				if(empty($input)){
					$name_err[$i]="This field is required";
				}
				else{
					$regex="/^[a-zA-Z\s]+$/";
					if(!preg_match($regex, $input)){
						$name_err[$i]="Enter a valid details";
					}else{
						$name[$i]=strtolower($input);
					}
				}
			}
			for($i=0;$i<=count($_POST['name'])-1;$i++){
				if(!empty($name_err[$i])){
					$n_err="error";
				}
			}
		}

		//validate email
		if(isset($_POST["email"])){
			for($i=0;$i<=count($_POST['email'])-1;$i++){
				$input=trim(htmlspecialchars($_POST["email"][$i]));
				if(empty($input)){
					$email_err[$i]="This field is required";
				}
				else{
					if(!filter_var($input, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\S+@\S+\.\S+$/")))){
	        			$email_err[$i] = "Please enter a valid email address.";
	    			}else{
	        			$email[$i]= $input;
	    			}
				}
			}
			for($i=0;$i<=count($_POST['email'])-1;$i++){
				if(!empty($email_err[$i])){
					$em_err="error";
				}
			}
		}
		//Gender validation
		if(isset($_POST["gender"])){
			//echo "DINEN";
			$input=trim(htmlspecialchars($_POST["gender"]));
			if(empty($input)){
				$gender_err="This field is required";
			}else{
				$gender=$input;
			}
		}
		//course code
		if(isset($_POST["code"])){
			$input=trim(htmlspecialchars($_POST["code"]));
			if(empty($input)){
				$code_err="This field is required";
			}else{
				$regex="/^[a-zA-Z]{3}[\s]{0,}[0-9]{3}$/";
				if(!preg_match($regex, $input)){
					$code_err="Enter a valid course code";
				}else{
					$code=strtolower($input);
				}
			}
		}
		//course title
		if(isset($_POST["title"])){
			$input=trim(htmlspecialchars($_POST["title"]));
			if(empty($input)){
				$title_err="This field is required";
			}else{
				$regex="/^\.+[0-9]{0,}$/";
				if(!preg_match($regex, $input)){
					$title_err="Enter a valid title";
				}else{
					$title=strtolower($input);
				}
			}
		}
		//Validate selections
		if(isset($_POST["select"])){
			for($i=0;$i<=count($_POST["select"])-1;$i++){
				$input=trim(htmlspecialchars($_POST["select"][$i]));
				if(empty($input)){
					$select_err[$i]="This field is required";
				}else{
						$select[$i]=strtolower($input);
				}
			}
			for($i=0;$i<=count($_POST['select'])-1;$i++){
				if(!empty($select_err[$i])){
					$s_err="error";
				}
			}
		}
		//Validate numbers
		if(isset($_POST["number"])){
			for($i=0;$i<=count($_POST["number"])-1;$i++){
				$input=trim(htmlspecialchars($_POST["number"][$i]));
				if(empty($input)){
					$number_err[$i]="This field is required";
				}else{
					$regex="/^[0-9]+$/";
					if(!preg_match($regex, $input)){
						$number_err[$i]="Enter a valid number";
					}else{
						$number[$i]=$input;
					}
				}
			}
			for($i=0;$i<=count($_POST['number'])-1;$i++){
				if(!empty($number_err[$i])){
					$num_err="error";
				}
			}
		}
		if(isset($_POST["text"])){
			for($i=0;$i<=count($_POST["text"])-1;$i++){
				$input=trim(htmlspecialchars($_POST["text"][$i]));
				if(empty($input)){
					$text_err[$i]="This field is required";
				}else{
					$text[$i]=strtolower($input);
				}
			}
			for($i=0;$i<=count($_POST['text'])-1;$i++){
				if(!empty($text_err[$i])){
					$txt_err="error";
				}
			}
		}
		//Phne validation
		if(isset($_POST["phone"])){
			for($i=0;$i<=count($_POST['phone'])-1;$i++){
				$input=trim(htmlspecialchars($_POST["phone"][$i]));
				if(empty($input)){
					$phone_err[$i]="This field is required";
				}
				else{
					$regex="/^[0][0-9]{10}$/";
					if(!preg_match($regex, $input)){
						$phone_err[$i]="Enter a valid Phone number";
					}else{
						$phone[$i]=strtolower($input);
					}
				}
			}
			for($i=0;$i<=count($_POST['phone']) - 1;$i++){
				if(!empty($phone_err[$i])){
					$ph_err="error";
				}
			}
		}
		//Validate image upload
		if(isset($_FILES["photo"])){
			for($i = 0; $i < count($_FILES["photo"]["name"]); $i++){
				if(!empty($_FILES["photo"]["name"][$i])){
					$filename=$_FILES["photo"]["name"][$i];
					$filetype=$_FILES["photo"]["type"][$i];
					$tmp[$i]=$_FILES["photo"]["tmp_name"][$i];
					$img_ext=array("jpg"=>"image/jpg", "png"=>"image/png", "jpeg"=>"image/jpeg", "webp"=>"image/webp");
					$extension=pathinfo($filename, PATHINFO_EXTENSION);
					if(array_key_exists($extension, $img_ext)){
						if(in_array($filetype, $img_ext)){
							$image[$i]=$filename;
						}else
							$image_err[$i]="Invalid image file";
					}
					else
						$image_err[$i]="Upload image File only";
				}
				else
					$image_err[$i]="Upload a photo";
			}
			for($i=0;$i< count($_FILES["photo"]["name"]);$i++){
				if(!empty($image_err[$i])){
					$img_err="error";
				}
			}
		}

		//Validate video uploa
		if(isset($_FILES["video"])){
			for($i = 0; $i < count($_FILES["video"]["name"]); $i++){
				if(!empty($_FILES["video"]["name"][$i])){
					$filename=$_FILES["video"]["name"][$i];
					$filetype=$_FILES["video"]["type"][$i];
					$vtmp[$i]=$_FILES["video"]["tmp_name"][$i];
					$img_ext=array("mp4"=>"video/mp4", "3gp"=>"video/3gp");
					$extension=pathinfo($filename, PATHINFO_EXTENSION);
					if(array_key_exists($extension, $img_ext)){
						if(in_array($filetype, $img_ext)){
							$video[$i]=$filename;
						}else
							$video_err[$i]="Invalid Video file";
					}
					else
						$video_err[$i]="Upload Video only";
				}
				else
					$video_err[$i]="Upload a Video";
			}
			for($i=0;$i< count($_FILES["video"]["name"]);$i++){
				if(!empty($video_err[$i])){
					$vid_err="error";
				}
			}
		}
	}
}else{
		
}
}catch(Exception $e){
	echo $e;
}
function generateKey(string $path, string $prefix, string $suffix, int $length){
	try{
		if(file_exists($path)){
			$mfile = fopen($path, "a+");
			$seen = false;
			while(!$seen){
				$seen = true;
				$key = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $length);
				while(!feof($mfile)){
					if(fgets($mfile) == $key){
						$seen = false;
						break;
					}
				}
			}
			$key = $prefix.$key.$suffix;
			fwrite($mfile, $key."\r\n");
			fclose($mfile);
			return $key;
		}
		else{
			return false;
		}
	}
	catch(Exception $e){
		die("Error occured");
		return false;
	}
}
?>