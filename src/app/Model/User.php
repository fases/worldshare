<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Comment $Comment
 * @property Publication $Publication
 * @property Rating $Rating
 * @property Teacher $Teacher
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
 public $name = 'User';
     public function beforeSave($options = array()) {
       if (isset($this->data[$this->alias]['password'])) {
         $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
       }
     return true;
 }

 public $validate = array(
 		'email' => array(
 			'email' => array(
 				'rule' => array('email'),
 				//'message' => 'Your custom message here',
 				//'allowEmpty' => false,
 				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
 		'password' => array(
 			'notBlank' => array(
 				'rule' => array('notBlank'),
 				//'message' => 'Your custom message here',
 				//'allowEmpty' => false,
 				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
 		'name' => array(
 			'email' => array(
 				'rule' => array('notBlank'),
 				//'message' => 'Your custom message here',
 				//'allowEmpty' => false,
 				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
 		'phone' => array(
 			'notBlank' => array(
 				'rule' => array('notBlank'),
 				//'message' => 'Your custom message here',
 				//'allowEmpty' => false,
 				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
		'address' => array(
 			'notBlank' => array(
 				'rule' => array('notBlank'),
 				//'message' => 'Your custom message here',
 				//'allowEmpty' => false,
 				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
 		'registration' => array(
 			'datetime' => array(
 				'rule' => array('datetime'),
 				//'message' => 'Your custom message here',
 				//'allowEmpty' => false,
 				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
 		'role' => array(
 			'numeric' => array(
 				'rule' => array('numeric'),
 				//'message' => 'Your custom message here',
 				//'allowEmpty' => false,
 				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
 	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Publication' => array(
			'className' => 'Publication',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Rating' => array(
			'className' => 'Rating',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Teacher' => array(
			'className' => 'Teacher',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
