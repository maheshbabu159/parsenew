<?php

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;

class ParseTestHelper
{
    public static function setUp()
    {
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        date_default_timezone_set('UTC');
        ParseClient::initialize(
            'c7zDsWfuzQ3XvtcJdFwNl9MPA3gsT4CY5O1SqwqZ',
            'ObATz7iXqrhwP4Wgicn5A0vAGao8KIzQz3W9op8G',
            'iVO6PR4Bwg57takNWArXphExtQvhzxFMIbfdCCOY'
        );
    }

    public static function tearDown()
    {
    }

    public static function clearClass($class)
    {
        $query = new ParseQuery($class);
        $query->each(
            function (ParseObject $obj) {
                $obj->destroy(true);
            }, true
        );
    }
}
