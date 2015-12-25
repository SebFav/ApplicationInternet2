<?php

class AssociationFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'nom' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => '1',
            'nom' => 'Remax'
        ),
        array(
            'id' => '2',
            'nom' => 'Duproprio'
        ),
        array(
            'id' => '3',
            'nom' => 'Century21'
        ),
        array(
            'id' => '4',
            'nom' => 'Sutton'
        ),
        array(
            'id' => '5',
            'nom' => 'Other'
        ),
    );

}
