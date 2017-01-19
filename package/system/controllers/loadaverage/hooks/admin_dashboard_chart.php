<?php
/******************************************************************************/
//                                                                            //
//                             InstantMedia 2017                              //
//	 		     https://instantvideo.ru/, support@instantvideo.ru            //
//                               written by Fuze                              //
//                     https://instantvideo.ru/copyright.html                 //
//                                                                            //
/******************************************************************************/
class onLoadaverageAdminDashboardChart extends cmsAction {

	public function run(){

        return array(
            'id' => 'users',
            'title' => LANG_LOADAVERAGE_CONTROLLER,
            'sections' => array(
                'peaks' => array(
                    'title' => LANG_LOADAVERAGE_PEAKS,
                    'table' => 'load_average_peak',
                    'key'   => 'date_pub'
                )
            )
        );

    }

}
