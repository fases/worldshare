
<?php
App::uses('Component','Controller');
	class UploadComponent extends Component{
		public function upload($data = null){
			if(!empty($data)){
				$filename = $data['name'];
				$file_tmp_name = $data['tmp_name'];
				$dir = WWW_ROOT.'files'.DS.'anexos';
				$allowed = array('jpg','png','pdf','mp3','mp4');
				if(!in_array(substr(strrchr($filename, '.'), 1), $allowed)){
					throw new NotFoundException('Erro ao Anexar arquivo',1);
				}elseif(is_uploaded_file($file_tmp_name)){
					move_uploaded_file($file_tmp_name,$dir.DS.$filename);
				}
			}
		}
	}
?>