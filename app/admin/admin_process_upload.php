<?php session_start(); ?>
<?php include '../controllers/connect.php'; ?>

<?php 

	$product = $_POST['name'];
	$id = $_POST['choose'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	
	if (isset($_POST['submit'])) {
		$file = $_FILES['file'];
		// print_r($file);
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 1000000) {
					$fileNameNew = uniqid('', true). ".". $fileActualExt;
					$fileDestination = '../assets/images/uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					

					$sql = "INSERT items (name, price, description, img_path, category_id)
					VALUES('$product', '$price', '$description', '$fileDestination', '$id')";

					$result = mysqli_query($conn,$sql);	

					if ($result) {
						header("Location: admin_add_item.php?success");
					} else {
						echo mysqli_error($result);
					}
				} else {
					echo "file is too big";
				}
			} else {
				echo "there was an error uploading";
			}
		} else {
			echo "cant upload this file type";
		}
	}

?>