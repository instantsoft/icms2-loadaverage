<?php
/******************************************************************************/
//                                                                            //
//                             InstantMedia 2017                              //
//	 		     https://instantvideo.ru/, support@instantvideo.ru            //
//                               written by Fuze                              //
//                     https://instantvideo.ru/copyright.html                 //
//                                                                            //
/******************************************************************************/
class onLoadaverageAdminDashboardBlock extends cmsAction {

	public function run(){

        $l1   = $_l1  = $this->getCurrentloadAverage(0);
        $l5   = $_l5  = $this->getCurrentloadAverage(1);
        $l15  = $_l15 = $this->getCurrentloadAverage(2);

        if($l1 > 100){ $l1 = 100; }
        if($l5 > 100){ $l5 = 100; }
        if($l15 > 100){ $l15 = 100; }

        $css_file = $this->cms_template->getStylesFileName('loadaverage', 'backend');
        if ($css_file){ $this->cms_template->addCSS($css_file); }

        $html = $this->cms_template->renderInternal($this, 'admin_dashboard_block', array(
            'la' => array(
                $l1, $l5, $l15
            ),
            '_la' => array(
                $_l1, $_l5, $_l15
            )
        ));

        return array(
            'title' => LANG_LA_CURRENT,
            'html'  => $html
        );

    }

}
