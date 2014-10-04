<?php

/* Name: kannel.php
 * Description: Contains functions for using Kannel services.
 * Author: Erasmo Aguilera
 * Date: October 2, 2014
 */

namespace consvett\util\kannel;

function send_sms($phone_number, $message)
{
    $url = '/cgi-bin/sendsms?username=ucss'
            . '&password=pcss'
            . '&charset=UCS-2&coding=2'
            . "&to={$phone_number}"
            . '&text=' . urlencode(iconv('utf-8', 'ucs-2', $message));
    file('http://190.4.63.91:13013' . $url);
}
