<?php
	
	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$UserName = $_POST['UserName'];
		$Pass = $_POST['Pass'];
		$Password = $_POST['Password'];

		$_SESSION['UserName'] = $UserName;

		if($Pass != $Password){
			$_SESSION['error'] = 'Passwords did not March';
			header('location: register.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM traveluser WHERE UserName=:UserName");
			$stmt->execute(['UserName'=>$UserName]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email Already Exists';
				header('location: register.php');
			}
			else{
				$DateJoined = date('Y-m-d');
				$State = 1;

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO traveluser (UserName, Pass,State, DateJoined, DateLastModified ) VALUES (:UserName, :Pass ,:State ,:DateJoined, :DateJoined)");
					$stmt->execute(['UserName'=>$UserName, 'Pass'=>$Pass, 'State'=>$State, 'DateJoined'=>$DateJoined , 'DateLastModified'=>$DateJoined]);
					$userid = $conn->lastInsertId();
					$_SESSION['success'] = 'Account created successfully';
					header('location: index.php');

				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up Signup Form First';
		header('location: register.php');
	}

?>