<?php
// 	$div = '#rating'.$ratings['Rating']['publication_id'];
// 	 echo $this->Js->submit('Gostei', array('url' => array('controller' => 'ratings',
//                                             'action' => 'add',$ratings['Rating']['publication_id']),
//                                                         'update' => $div,'class' => 'btn btn-info btn-xs'));
	foreach ($ratings as $rating) {
		echo $rating['Rating']['id'];
	}
         ?>
                  <button class='btn btn-primary btn-xs'><i class='fa fa-share'></i> Post completo</button> 
        <?php 
            echo $this->Js->writeBuffer(array('cache' => FALSE));
        ?>                                                   
