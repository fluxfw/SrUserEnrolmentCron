<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\SrUserEnrolment\Utils\SrUserEnrolmentTrait;

/**
 * Class ilSrUserEnrolmentCronPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrUserEnrolmentCronPlugin extends ilCronHookPlugin
{

    use SrUserEnrolmentTrait;

    const PLUGIN_ID = "srusrenrcron";
    const PLUGIN_NAME = "SrUserEnrolmentCron";
    const PLUGIN_CLASS_NAME = ilSrUserEnrolmentPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * ilSrUserEnrolmentCronPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstances() : array
    {
        return self::srUserEnrolment()->jobs()->factory()->newInstances();
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstance(/*string*/ $a_job_id)/*: ?ilCronJob*/
    {
        return self::srUserEnrolment()->jobs()->factory()->newInstanceById($a_job_id);
    }
}
