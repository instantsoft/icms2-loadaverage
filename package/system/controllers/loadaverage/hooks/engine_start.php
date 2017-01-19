<?php
/******************************************************************************/
//                                                                            //
//                             InstantMedia 2017                              //
//	 		     https://instantvideo.ru/, support@instantvideo.ru            //
//                               written by Fuze                              //
//                     https://instantvideo.ru/copyright.html                 //
//                                                                            //
/******************************************************************************/
class onLoadaverageEngineStart extends cmsAction {

    public function run(){

        if(!function_exists('sys_getloadavg')){ return true; }

        if(empty($this->options['max_load'])){ return true; }

        $current_load_average = $this->getCurrentloadAverage($this->options['sensor']);

        $overload_lock_file = $this->cms_config->cache_path.'is_temporary_unavailable_overload';
        $email_lock_file    = $this->cms_config->cache_path.'is_temporary_unavailable_email_me';

        $is_fixed = file_exists($overload_lock_file);

        if($current_load_average >= $this->options['max_load']){

            // фиксируем перегруз один раз
            if(!$is_fixed){
                $this->fixOverload($current_load_average);
                fclose(fopen($overload_lock_file,'x'));
            }

            // уведомлять по email
            if(isset($this->options['action'][1]) && !empty($this->options['email']) && !file_exists($email_lock_file)){

                $this->sendEmail($this->options['email'], $current_load_average);

                fclose(fopen($email_lock_file,'x'));

            }

            // блокировать сайт
            if(isset($this->options['action'][0])){
                $this->displayPeekError();
            }

            return true;

        }

        if($is_fixed){
            @unlink($overload_lock_file);
        }

        return true;

    }

}
