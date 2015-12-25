<?php

App::uses('Association', 'Model');

class AssociationTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.association'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Association = ClassRegistry::init('Association');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Association);

        parent::tearDown();
    }

    /**
     * testGetAssociationNames method
     *
     * @return void
     */
    public function testGetAssociationNamesWithOneLetterAndThreeHits() {
        $testAssociationNames = $this->Association->getAssociationNames("R");
        //  debug($testAssociationNames);die();
        $this->assertEqual($testAssociationNames, array("1" => "Remax"));
    }

    public function testGetAssociationNamesWithOneLetterAndOneHit() {
        $testAssociationNames = $this->Association->getAssociationNames("D");
        //  debug($testAssociationNames);die();
        $this->assertEqual($testAssociationNames, array("2" => "Duproprio"));
    }

    public function testGetAssociationNamesWithWrongLetterAndZeroHit() {
        $testAssociationNames = $this->Association->getAssociationNames("Z");
        //debug($testAssociationNames);die();
        $this->assertEqual($testAssociationNames, array());
    }

    public function testGetAssociationNamesWithTwoLetterAndOneHit() {
        $testAssociationNames = $this->Association->getAssociationNames("Su");
        //  debug($testAssociationNames);die();
        $this->assertEqual($testAssociationNames, array("4" => "Sutton"));
    }

    public function testGetAssociationNamesWithNoLetterAndZeroHit() {
        $testAssociationNames = $this->Association->getAssociationNames("");
        // debug($testAssociationNames);die();
        $this->assertFalse($testAssociationNames);
    }

}
