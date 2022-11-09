<?php

namespace Coquardcyr\Linepay\Tests\Unit;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use ReflectionObject;

abstract class TestCase extends PHPUnitTestCase
{
    protected $config;

    protected function setUp(): void {
        parent::setUp();

        if ( empty( $this->config ) ) {
            $this->loadTestDataConfig();
        }

    }

    public function configTestData() {
        if ( empty( $this->config ) ) {
            $this->loadTestDataConfig();
        }

        return isset( $this->config['test_data'] )
            ? $this->config['test_data']
            : $this->config;
    }

    protected function loadTestDataConfig() {
        $obj      = new ReflectionObject( $this );
        $filename = $obj->getFileName();

        $this->config = $this->getTestData( dirname( $filename ), basename( $filename, '.php' ) );
    }

    /**
     * Gets the test data, if it exists, for this test class.
     *
     * @param string $dir      Directory of the test class.
     * @param string $filename Test data filename without the .php extension.
     *
     * @return array array of test data.
     */
    protected function getTestData( $dir, $filename ) {
        if ( empty( $dir ) || empty( $filename ) ) {
            return [];
        }

        $dir = str_replace( [ 'Integration', 'Unit' ], 'Fixtures', $dir );
        $dir = rtrim( $dir, '\\/' );
        $testdata = "$dir/{$filename}.php";

        return is_readable( $testdata )
            ? require $testdata
            : [];
    }
}