<?php
/*
 *  $Id: codeCoverageMain.php 49493 2006-04-08 00:16:04Z hkodungallur $
 *  
 *  Copyright(c) 2004-2006, SpikeSource Inc. All Rights Reserved.
 *  Licensed under the Open Software License version 2.1
 *  (See http://www.spikesource.com/license.html)
 */
?>
<?php
    /**
     * This file should be executed with following command
     * Linux:
     *   $ (export PHPCOVERAGE_HOME=/path/to/phpcoverage/src; php codeCoverageMain.php)
     * Windows: 
     *   > set PHPCOVERAGE_HOME=/path/to/phpcoverage/src
     *   > php codeCoverageMain.php
     *
     */

?>
<?php
    #require_once "phpcoverage.inc.php";
    define("PHPCOVERAGE_HOME", "/var/git/gus-dev/php/http/phpcoverage/src");
    require_once PHPCOVERAGE_HOME . "/CoverageRecorder.php";
    require_once PHPCOVERAGE_HOME . "/reporter/HtmlCoverageReporter.php";

    $reporter = new HtmlCoverageReporter("Code Coverage Report", "", "report");

    #$includePaths = array(".");
    #$excludePaths = array("codeCoverageMain.php", "test_driver.php");
    $includePaths = array("/var/git/gus-dev/php/http/system/application/controllers/" . $argv[1] . ".php");
    $excludePaths = array(""); 
    $cov = new CoverageRecorder($includePaths, $excludePaths, $reporter);
    $cov->startInstrumentation();
    #include "test_driver.php";
    include "/var/git/gus-dev/php/http/index.php";
    
    $cov->stopInstrumentation();

    $cov->generateReport();
    $reporter->printTextSummary();
?>
