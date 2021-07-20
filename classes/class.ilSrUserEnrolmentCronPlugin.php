<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\SrUserEnrolment\Utils\SrUserEnrolmentTrait;

/**
 * Class ilSrUserEnrolmentCronPlugin
 */
class ilSrUserEnrolmentCronPlugin extends ilCronHookPlugin
{

    use SrUserEnrolmentTrait;

    const PLUGIN_CLASS_NAME = ilSrUserEnrolmentPlugin::class;
    const PLUGIN_ID = "srusrenrcron";
    const PLUGIN_NAME = "SrUserEnrolmentCron";
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * ilSrUserEnrolmentCronPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


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
     * @inheritDoc
     */
    public function getCronJobInstance(/*string*/ $a_job_id) : ?ilCronJob
    {
        return self::srUserEnrolment()->jobs()->factory()->newInstanceById($a_job_id);
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
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }
}
