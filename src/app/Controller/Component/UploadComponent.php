<?php
App::uses('Component','Controller');
	class UploadComponent extends Component{
		public function upload($data = null,$user_id = null){
			if(!empty($data)){
				$pos = strpos($data['name'], '.');              
                $formato = substr($data['name'],$pos,strlen($data['name'])-1);
                $filename = $user_id.$formato;
				$file_tmp_name = $data['tmp_name'];
				$dir = WWW_ROOT.'img'.DS.'anexos';
				$allowed = array('png','jpg','jpeg');
				if(!in_array(substr(strrchr($filename, '.'), 1), $allowed)){
					throw new NotFoundException('Erro ao Anexar arquivo',1);
				}elseif(is_uploaded_file($file_tmp_name)){
					move_uploaded_file($file_tmp_name,$dir.DS.$filename);
				}
                return $filename;
			}
		}
	}
?>