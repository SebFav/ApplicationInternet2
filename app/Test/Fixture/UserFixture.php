<?php

class UserFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
        'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'role' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'created' => array('type' => 'date', 'null' => false, 'default' => null),
        'modified' => array('type' => 'date', 'null' => false, 'default' => null),
        'confirm' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
            'username' => 'admin',
            'password' => '$2a$10$QIfQAz6hOEo.yIibVONBmOixxVkKqc8x0mdPTvg9lg.89Xl1xtvLa',
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'created' => '2015-09-20',
            'modified' => '2015-09-20',
            'confirm' => ''
        ),
        array(
            'id' => '2',
            'username' => 'utilisateur1',
            'password' => '$2a$10$QIfQAz6hOEo.yIibVONBmOixxVkKqc8x0mdPTvg9lg.89Xl1xtvLa',
            'role' => 'admin',
            'email' => 'a@a.com',
            'created' => '2015-09-10',
            'modified' => '2015-09-10',
            'confirm' => ''
        ),
        array(
            'id' => '3',
            'username' => 'utilisateur2',
            'password' => '$2a$10$QIfQAz6hOEo.yIibVONBmOixxVkKqc8x0mdPTvg9lg.89Xl1xtvLa',
            'role' => 'utilisateur',
            'email' => 'b@b.com',
            'created' => '2015-09-10',
            'modified' => '2015-09-10',
            'confirm' => ''
        ),
    );

}
