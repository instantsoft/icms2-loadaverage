<?php
/******************************************************************************/
//                                                                            //
//                             InstantMedia 2017                              //
//	 		     https://instantvideo.ru/, support@instantvideo.ru            //
//                               written by Fuze                              //
//                     https://instantvideo.ru/copyright.html                 //
//                                                                            //
/******************************************************************************/
class formLoadaverageOptions extends cmsForm {

    public function init() {

        $cpu_count = get_cpu_count();

        return array(

            array(
                'type' => 'fieldset',
                'childs' => array(

                    new fieldNumber('max_load', array(
                        'title'   => LANG_LA_MAX_LOAD,
                        'units'   => '%',
                        'hint'    => LANG_LA_MAX_LOAD_HINT,
                        'default' => 90
                    )),

                    new fieldString('cpu_count', array(
                        'title'   => LANG_LA_CPU_COUNT,
                        'hint'    => LANG_LA_CPU_COUNT_HINT,
                        'suffix'  => ($cpu_count ? html_bool_span('<span title="' . LANG_LA_AUTO_PATH_CLICK . '" class="auto_copy tooltip" data-path="' . $cpu_count . '">' . LANG_LA_AUTO_PATH . ' ' . $cpu_count . '</span>', true) : html_bool_span(LANG_LA_NO_AUTO_PATH, false)),
                        'default' => ($cpu_count ? $cpu_count : 1),
                        'rules'   => array(
                            array('number'),
                            array('min', 1)
                        )
                    )),

                    new fieldList('sensor', array(
                        'title' => LANG_LA_SENSOR,
                        'items' => array(
                            LANG_LA_SENSOR1,
                            LANG_LA_SENSOR5,
                            LANG_LA_SENSOR15
                        ),
                        'default' => 2
                    )),

                    new fieldList('action', array(
                        'title'       => LANG_LA_ACTION,
                        'is_multiple' => true,
                        'items'       => array(
                            LANG_LA_ACTION0,
                            LANG_LA_ACTION1
                        ),
                        'default' => array(0)
                    )),

                    new fieldString('email', array(
                        'title' => LANG_LA_EMAIL,
                        'hint'  => LANG_LA_EMAIL_HINT,
                        'rules' => array(
                            array('email')
                        )
                    ))

                )
            )

        );

    }

}

function get_cpu_count(){
    if(!function_exists('exec') || !function_exists('sys_getloadavg')){
        return false;
    }
    $buffer = array();
    $err    = '';
    $result = exec("grep -P '^physical id' /proc/cpuinfo|wc -l", $buffer, $err);
    if($err !== 127){
        if(!isset($buffer[0])){
            $buffer[0] = $result;
        }
        $b = mb_strtolower($buffer[0]);
        if(mb_strstr($b,'error') || mb_strstr($b,' no ') || mb_strstr($b,'not found') || mb_strstr($b,'No such file or directory')){
            return false;
        }
    } else {
        return false;
    }
    return (int)$buffer[0];
}
