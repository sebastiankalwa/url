<?php
ini_set('display_errors', 'On');
require_once(__DIR__.'/../lib/bootstrap.php');

/**
 * Check that dot segments are removed from a normalised URL
 *   
 */
class DotSegmentNormalisationTest extends AbstractUrlTest {   
    
    public function testSingleOrDoubleDotPathIsRemoved() {      
        $this->setInputAndExpectedOutputUrls(array(
            'http://www.example.com' => 'http://www.example.com/',
            'http://www.example.com/..' => 'http://www.example.com/',
            'http://www.example.com/.' => 'http://www.example.com/',
            'http://www.example.com/a/b/c/./../../g' => 'http://www.example.com/a/g/',
            'http://www.example.com/mid/content=5/../6' => 'http://www.example.com/mid/6/',
            'http://www.example.com/./././././././././././././././' => 'http://www.example.com/',
            'http://www.example.com/../../../../../../' => 'http://www.example.com/',            
        ));
        
        $this->runInputToExpectedOutputTests();
    }   
}