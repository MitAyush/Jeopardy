<?php 

	/**
	 * 
	 */
	namespace Classes\Models;
	class UserModel
	{

		public function registerUser($data)
		{
			$con = getCon();
			$data['first'] = ucfirst($data['first']);
			$data['last'] = ucfirst($data['last']);

			$sql = "INSERT INTO users (first_name,last_name,username,password,email) VALUES (?,?,?,?,?)";
			$stmt= $con->prepare($sql);
			$stmt->execute(
				[$data['first'],
				$data['last'],
				$data['username'],
				password_hash($data['password'], PASSWORD_DEFAULT),
				$data['email']]
			);

			$_SESSION['username'] = $data['username'];
			$_SESSION['name'] = $data['first'] ."  ". $data['last'];
		}

		public function login()
		{
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where username = ?");
			$sql->execute([$_POST['username']]);

			if ($sql->rowCount() > 0) {
			  	// output data of each row
				$rows = $sql->fetchAll(\PDO::FETCH_ASSOC);
				
				if (password_verify($_POST['password'], $rows[0]['password'])) {

					$_SESSION['username'] = $rows[0]['username'];
					$_SESSION['name'] = $rows[0]['first_name']." ".$rows[0]['last_name'];
					
					return true;
				}
				
			} 
			return false;
		}

		public function isAdmin($username)
		{
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where username = ? and role = ? limit 1");
			$sql->execute([$username, 'admin']);
			return $sql->rowCount() > 0;
		}
	}