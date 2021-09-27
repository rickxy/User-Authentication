<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$UserName = $_POST['UserName'];
		$Pass = $_POST['Pass'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM traveluser WHERE UserName = :UserName");
			$stmt->execute(['UserName'=>$UserName]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
					if(($Pass == $row['Pass'])){
						if($row['State']){
						    $_SESSION['user'] = $row['UID'];
							header('location: ../index.php');
						}
						else{
							
							$_SESSION['admin'] = $row['UID'];
							header('location: ../management/');
						}		
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	header('location: index.php');

?>