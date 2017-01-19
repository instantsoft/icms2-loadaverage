<?php
/******************************************************************************/
//                                                                            //
//                             InstantMedia 2017                              //
//	 		     https://instantvideo.ru/, support@instantvideo.ru            //
//                               written by Fuze                              //
//                     https://instantvideo.ru/copyright.html                 //
//                                                                            //
/******************************************************************************/
class loadaverage extends cmsFrontend {

    protected $useOptions = true;

    public function displayPeekError() {

        if (href_to('auth', 'login') != href_to_current()){
            if (!cmsUser::isAdmin()) {

                if (cmsUser::isLogged()){
                    cmsUser::addSessionMessage(LANG_LOGIN_ADMIN_ONLY, 'error');
                    cmsUser::logout();
                    $this->redirectToHome();
                }

                header('HTTP/1.0 503 Too busy, try again later');
                header('Status: 503 Too busy, try again later');

                $this->cms_template->setContext($this);

                return $this->cms_template->renderPlain('temporary_unavailable');

            }
        }

    }

    public function getCurrentloadAverage($sensor) {

        $la = sys_getloadavg();

        return round(100*($la[$sensor]/$this->options['cpu_count']));

    }

    public function fixOverload($current_load_average) {

        $model = new cmsModel();

        $model->insert('load_average_peak', array(
            'value'=>$current_load_average
        ));

        return $this;

    }

    public function sendEmail($emails, $current_load_average){

        $emails = explode(',', $emails);

        $letter_text = cmsCore::getLanguageTextFile('letters/temporary_unavailable');
        if (!$letter_text){ return false; }

        $letter_text = string_replace_keys_values($letter_text, array(
            'site'   => $this->cms_config->sitename,
            'host'   => $this->cms_config->host,
            'ip'     => $_SERVER['SERVER_ADDR'],
            'la'     => $current_load_average,
            'date'   => html_date(),
            'time'   => html_time()
        ));

        foreach ($emails as $email) {

            $mailer = new cmsMailer();

            $mailer->addTo($email);

            $letter_text = $mailer->parseSubject($letter_text);

            $mailer->setBodyHTML(nl2br($letter_text))->send();

            $mailer->clearTo()->clearAttachments();

        }

        return $this;

    }

}
