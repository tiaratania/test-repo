<?php
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase {
    public function testValidSearchTerm() {
        require 'path/to/your/app.php';  // Adjust path as needed
        $this->assertTrue(is_valid_search_term('example'));
    }

    public function testInvalidSearchTerm() {
        $this->assertFalse(is_valid_search_term('<script>'));
    }
}