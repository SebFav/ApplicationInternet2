<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'text';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'apartment_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'association_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
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
        'text' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Apartment' => array(
            'className' => 'Apartment',
            'foreignKey' => 'apartment_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Association' => array(
            'className' => 'Association',
            'foreignKey' => 'association_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
       public function getAssociationNames($term = null) {
        if (!empty($term)) {
            $associationNames = $this->Association->find('list', array(
                'conditions' => array(
                )
            ));
                     
        return true;
        }
        return false;
    }

}
