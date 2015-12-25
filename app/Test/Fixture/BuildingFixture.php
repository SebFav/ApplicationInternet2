<?php

class BuildingFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
        'building_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'building_description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'building_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'building_manager' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'building_phone' => array('type' => 'string', 'null' => false, 'default' => null,'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'building_img' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'created' => array('type' => 'date', 'null' => false, 'default' => null),
        'modified' => array('type' => 'date', 'null' => false, 'default' => null),
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
            'id' => '10',
            'building_name' => 'test',
            'building_description' => 'test',
            'building_address' => 'test',
            'building_manager' => 'test',
            'building_phone' => '1234567899',
            'building_img' => 'uploads/TestFile.jpg',
            'user_id' => '1',
            'created' => '2015-10-08',
            'modified' => '2015-10-23'
        ),
    );

}
