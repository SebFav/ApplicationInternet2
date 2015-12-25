<?php

App::uses('AppModel', 'Model');

class Apartment extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'apt_number';

    /*     * public Function beforeSave($options = array()) {
      $resulat = $this->Network->findByTitle('networkName');
      if (isset($resulat->data[$this->alias]['id'])) {

      }
      } */

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'apt_number' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'content' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'building_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//        'getNetworksNames' => array(
//               'rule' => 'getNetworkNames',
//               'message' => 'Something went wrong processing your file',
//               // 'allowEmpty' => TRUE,
//           ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Building' => array(
            'className' => 'Building',
            'foreignKey' => 'building_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'apartment_id',
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
    public $hasAndBelongsToMany = array(
        'Tag' => array(
            'className' => 'Tag',
            'joinTable' => 'apartments_tags',
            'foreignKey' => 'apartment_id',
            'associationForeignKey' => 'tag_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'building_id' => $user)) !== false;
    }

}
