<?php

/**
* 
*/
class UserModel extends Model
{
	
	public function Index()
	{
		return;
	}

	public function register()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



		$pass = md5($post['pass']);
		
		if($post['submit']){
			if($post['name'] == '' || $post['email'] == '' || $post['password']){
				Messages::setMsg('Please Fill in all fields', 'errors');
				return;
			}

			$this->query('INSERT INTO users(name, email, password) VALUES (:name, :email, :pass)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':pass', $pass);
			$this->execute();
			//Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: ' . ROOT_URL . 'users/login');
			}
		}
		return;
	}

	public function login()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$pass = md5($post['pass']);
		
		if($post['submit']){
			$this->query('SELECT * FROM users WHERE email=:email AND password=:pass');
			$this->bind(':email', $post['email']);
			$this->bind(':pass', $pass);
			$this->execute();

			$row = $this->single();
			//Verify
			if($row){
				// echo 'Logined!';
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
						"id" => $row['id'],
						'name' => $row['name'],
						'email' => $row['email']
					);
				// Redirect
				header('Location: ' . ROOT_URL . 'shares');
			} else{
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}
}