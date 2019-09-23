<?php

require_once __DIR__ . "/../../../../UIComponent/UserInterfaceHook/SrUserEnrolment/vendor/autoload.php";
require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\SrUserEnrolment\Job\Job;
use srag\Plugins\SrUserEnrolment\Utils\SrUserEnrolmentTrait;
use srag\RemovePluginDataConfirm\SrUserEnrolment\PluginUninstallTrait;

/**
 * Class ilSrUserEnrolmentCronPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrUserEnrolmentCronPlugin extends ilCronHookPlugin
{

    use PluginUninstallTrait;
    use SrUserEnrolmentTrait;
    const PLUGIN_ID = "srusrenrcron";
    const PLUGIN_NAME = "SrUserEnrolmentCron";
    const PLUGIN_CLASS_NAME = ilSrUserEnrolmentPlugin::class;
    const REMOVE_PLUGIN_DATA_CONFIRM = false;
    const REMOVE_PLUGIN_DATA_CONFIRM_CLASS_NAME = SrUserEnrolmentRemoveDataConfirm::class;
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
     * @return string
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @return ilCronJob[]
     */
    public function getCronJobInstances() : array
    {
        return [new Job()];
    }


    /**
     * @param string $a_job_id
     *
     * @return ilCronJob|null
     */
    public function getCronJobInstance(/*string*/ $a_job_id)/*: ?ilCronJob*/
    {
        switch ($a_job_id) {
            case Job::CRON_JOB_ID:
                return new Job();

            default:
                return null;
        }
    }


    /**
     * @inheritdoc
     */
    protected function deleteData()/*: void*/
    {
        // Nothing to delete
    }
}
