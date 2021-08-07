<?php 
	/**
	 * 
	 */
	namespace Classes;
	class Game
	{
		private $con;
		function __construct()
		{
			$this->con = getCon();
		}
		public function show(){
			view('game');
		}
		public function getEditoralQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from editorial where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}

		public function getSportsQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from sports where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
		
		public function getTechnologyQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from technology where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
		
		public function getTrailerQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from trailer where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}

		public function checkResponse()
		{   
			$table = $_POST['database'];
			$sql = $this->con->prepare("SELECT * from $table where id = ? and answer = ? LIMIT 1");
			$sql->execute([$_POST['ques_id'], intval($_POST['option'])]);

			if ($sql->rowCount()){
				$result = $sql->fetch(\PDO::FETCH_ASSOC);
				$data = array('result' => true, 'marks' => $result['level']);
				echo json_encode($data);
			}
			
			else{
				$data = array('result' => false, 'marks' => 0);
				echo json_encode($data);
			}


		}
	}