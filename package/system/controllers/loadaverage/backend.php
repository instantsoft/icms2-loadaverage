<?php
/******************************************************************************/
//                                                                            //
//                             InstantMedia 2017                              //
//	 		     https://instantvideo.ru/, support@instantvideo.ru            //
//                               written by Fuze                              //
//                     https://instantvideo.ru/copyright.html                 //
//                                                                            //
/******************************************************************************/
class backendLoadaverage extends cmsBackend {

    public $useDefaultOptionsAction = true;
    protected $useOptions = true;

    public function actionIndex(){
        $this->redirectToAction('options');
    }

    public function getCurrentloadAverage($sensor) {

        $la = sys_getloadavg();

        return round(100*($la[$sensor]/$this->options['cpu_count']));

    }

    public function actionClearSendEmail(){

        @unlink($this->cms_config->cache_path.'is_temporary_unavailable_email_me');

        cmsUser::addSessionMessage(LANG_LA_CLEAR_SUCCESS, 'success');

        $this->redirectToAction('options');

    }

    public function actionDeleteComponent(){

        $model = new cmsModel();

        $model->deleteController('loadaverage');

        $model->db->dropTable('load_average_peak');

        cmsUser::addSessionMessage(sprintf(LANG_CP_COMPONENT_IS_DELETED, LANG_LOADAVERAGE_CONTROLLER), 'success');

        $this->redirectTo('admin', 'controllers');

    }

}
