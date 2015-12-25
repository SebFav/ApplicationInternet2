<?php

App::uses('Building', 'Model');

class BuildingTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.building',
        'app.user',
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Building = ClassRegistry::init('Building');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Building);

        parent::tearDown();
    }

    public function testProcessImageUploadWithImage() {
        $valide = $this->Building->processImageUpload(10);
        $this->assertTrue($valide);
    }

    public function testIsOwnedByUserOwnBuilding() {
        $valide = $this->Building->isOwnedBy(10, 1);

        $this->assertTrue($valide);
    }

    public function testIsOwnedByUserNotOwnBuilding() {
        $valide = $this->Building->isOwnedBy(10, 2);

        $this->assertFalse($valide);
    }

    public function testValidationTelephonePasValide() {
        $postData = array(
            'building_name' => 'Test Building',
            'building_description' => 'Test',
            'building_address' => '123 Test',
            'building_manager' => 'Johnny Test',
            'building_phone' => 'abcdefghi',
            'building_img' => '',
            'user_id' => '1'
        );
        $result = $this->Building->save($postData);
        $invalidFields = $this->Building->invalidFields();

        $this->assertFalse($result);
    }

    public function testValidationTelephoneValide() {
        $postData = array(
            'building_name' => 'Test Building',
            'building_description' => 'Test',
            'building_address' => '123 Test',
            'building_manager' => 'Johnny Test',
            'building_phone' => '1234567890',
            'building_img' => '',
            'user_id' => '1'
        );

        $result = $this->Building->save($postData);
        $invalidFields = $this->Building->invalidFields();
        $this->assertEqual($result, array('Building' => array(
                'building_name' => 'Test Building',
                'building_description' => 'Test',
                'building_address' => '123 Test',
                'building_manager' => 'Johnny Test',
                'building_phone' => '1234567890',
                'building_img' => '',
                'user_id' => '1'
        )));
    }

    public function testValidationNomPasvide() {
        $postData = array(
            'building_name' => 'Test Building',
            'building_description' => 'Test',
            'building_address' => '123 Test',
            'building_manager' => 'Johnny Test',
            'building_phone' => '1234567890',
            'building_img' => '',
            'user_id' => '1'
        );

        $result = $this->Building->save($postData);
        $invalidFields = $this->Building->invalidFields();

        $this->assertEqual($result, array('Building' => array(
                'building_name' => 'Test Building',
                'building_description' => 'Test',
                'building_address' => '123 Test',
                'building_manager' => 'Johnny Test',
                'building_phone' => '1234567890',
                'building_img' => '',
                'user_id' => '1'
        )));
    }

    public function testValidationNomvide() {
        $postData = array(
            'building_name' => '',
            'building_description' => 'Test',
            'building_address' => '123 Test',
            'building_manager' => 'Johnny Test',
            'building_phone' => '1234567890',
            'building_img' => '',
            'user_id' => '1'
        );
        $result = $this->Building->save($postData);
        $invalidFields = $this->Building->invalidFields();

        $this->assertFalse($result);
    }

    public function testFormWithEmptyFile() {
        // Build the data to save along with an empty file

        $data = array('Building' => array(
                'building_name' => 'Test Building',
                'building_description' => 'Test',
                'building_address' => '123 Test',
                'building_manager' => 'Johnny Test',
                'building_phone' => '1234567890',
                'user_id' => '1',
                'building_img' => array(
                    'name' => '',
                    'type' => '',
                    'tmp_name' => '',
                    'error' => 4,
                    'size' => 0,
                )
        ));




        $anciendata = array('Contact' => array(
                'building_name' => 'Test Building',
                'building_description' => 'Test',
                'building_address' => '123 Test',
                'building_manager' => 'Johnny Test',
                'building_phone' => '1234567890',
                'user_id' => '1',
                'id' => '11',
                'building_img' => array(
                    'name' => '',
                    'type' => '',
                    'tmp_name' => '',
                    'error' => 4,
                    'size' => 0,
                )
        ));

        // Attempt to save
        $result = $this->Building->save($data);



        // Test successful insert
        $this->assertArrayHasKey('Building', $result);
        // Get the count in the DB
        $result = $this->Building->find('count', array(
            'conditions' => array(
                'Building.building_name' => 'Test Building',
                'Building.building_description' => 'Test',
                'Building.building_address' => '123 Test',
                'Building.building_manager' => 'Johnny Test',
                'Building.building_phone' => '1234567890',
                'Building.user_id' => '1',
                'Building.id' => '11',
            ),
        ));

        // Test DB entry
        $this->assertEqual($result, 1);
    }

    public function testFormWithValidFile() {
        // Create a stub for the Contact Model class
        $stub = $this->getMockForModel('Building', array('is_uploaded_file', 'move_uploaded_file'));

        // Always return TRUE for the 'is_uploaded_file' function
        $stub->expects($this->once())
                ->method('is_uploaded_file')
                ->will($this->returnValue(TRUE));
        // Copy the file instead of 'move_uploaded_file' to allow testing
        $stub->expects($this->once())
                ->method('move_uploaded_file')
                ->will($this->returnCallback('copy'));

        $data = array('Building' => array(
                'building_name' => 'Test Building',
                'building_description' => 'Test',
                'building_address' => '123 Test',
                'building_manager' => 'Johnny Test',
                'building_phone' => '1234567890',
                'user_id' => '1',
                'id' => '11',
                'building_img' => array(
                    'name' => 'TestFile.jpg',
                    'type' => 'image/jpeg',
// modified with windows DS backslash
                    'tmp_name' => 'F:\UniformServer\UniServerZ\tmp\TestFile.jpg',
// original from tutorial
//    				'tmp_name' => ROOT.DS.APP_DIR.DS.'Test'.DS.'Case'.DS.'Model'.DS.'TestFile.jpg',
                    'error' => (int) 0,
                    'size' => (int) 845941
                )
        ));



        // Build the data to save along with a sample file
        $Anciandata = array('Contact' => array(
                'name' => 'Johnny Test',
                'email' => 'test@test.com',
                'message' => 'Test File Upload',
                'filename' => array(
                    'name' => 'TestFile.jpg',
                    'type' => 'image/jpeg',
// modified with windows DS backslash
                    'tmp_name' => 'F:\UniformServer\UniServerZ\tmp\TestFile.jpg',
// original from tutorial
//    				'tmp_name' => ROOT.DS.APP_DIR.DS.'Test'.DS.'Case'.DS.'Model'.DS.'TestFile.jpg',
                    'error' => (int) 0,
                    'size' => (int) 845941
                )
        ));

        // Attempt to save
        $result = $stub->save($data);
        debug($result);
        die();
        // Test successful insert
        $this->assertArrayHasKey('Building', $result);

        // Get the count in the DB
        $entryCount = $this->Building->find('count', array(
            'conditions' => array(
                'Building.building_name' => 'Test Building',
                'Building.building_description' => 'Test',
                'Building.building_address' => '123 Test',
                'Building.building_manager' => 'Johnny Test',
                'Building.building_phone' => '1234567890',
                'Building.user_id' => '1',
                'Building.id' => '11',
                'building_img' => 'uploads/TestFile.jpg'
            )
        ));
// debug($result); debug($entryCount); die();
        // Test DB entry
        $this->assertEqual($entryCount, 1);

        // Test uploaded file exists
        $this->assertFileExists(WWW_ROOT . 'uploads' . DS . 'TestFile.jpg');
    }

    public function testFormWithInvalidFile() {
        // Create a stub for the Contact Model class
        $stub = $this->getMock('Building', array('is_uploaded_file', 'move_uploaded_file'));

        // Always return TRUE for the 'is_uploaded_file' function
        $stub->expects($this->any())
                ->method('is_uploaded_file')
                ->will($this->returnValue(TRUE));
        // Copy the file instead of 'move_uploaded_file' to allow testing
        $stub->expects($this->any())
                ->method('move_uploaded_file')
                ->will($this->returnCallback('copy'));

        // Build the data to save along with a sample file
        $data = array('Building' => array(
                'building_name' => 'Test Building',
                'building_description' => 'Test',
                'building_address' => '123 Test',
                'building_manager' => 'Johnny Test',
                'building_phone' => '1234567890',
                'user_id' => '1',
                'building_img' => array(
                    'name' => 'TestFile.txt',
                    'type' => 'text/plain',
                    'tmp_name' => 'F:\UniformServer\UniServerZ\tmp\TestFile.txt',
                    'error' => 0,
                    'size' => 19,
                )
        ));

        // Attempt to save
        $result = $stub->save($data);

        // Test failure
        $this->assertFalse($result);

        // Test uploaded file does not exists
        $this->assertFileNotExists(WWW_ROOT . 'uploads' . DS . 'TestFile.txt');
    }

}
