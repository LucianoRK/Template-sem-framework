<?php

class CONFIG {
    /*
     * General
     */
    static $PROJECT_NAME 	= "NOME DO PROJETO";
    static $TIMEZONE 		= 'America/Sao_Paulo';
    static $MASTER_PASSWD 	= 'ProjetO@1425';
    /*
     * Login
     */
    static $LOGIN_COOKIE_LIFETIME 		= 86400;
    static $LOGIN_MAX_FAILED_ATTEMPTS 	= 3;
    static $LOGIN_NUMBER_ATTEMPS_DELAY 	= 5;
    static $LOGIN_SLEEP_BASE_DELAY 		= 2;
    static $LOGIN_FAILED_ATTEMPTS_RANGE	= 15; // em minutos 
    static $LOGIN_RECAPTCHA 			= FALSE;
    static $LOGIN_CAPTCHA_SECRET 		= '6Lf0Lq8UAAAAADIQg3e_6G-X1FQfJc__n-5DP-Pf';
    /*
     * Mail
     */
    static $MAIL_USERNAME 	= '';
    static $MAIL_PASSWORD 	= '';
    static $MAIL_SMPT 		= '';
    static $MAIL_PORT 		= 465;
    static $MAIL_PROTOCOL 	= 'ssl';
    /*
     * Database
     */
    static $DATABASE_HOST 	= 'ilumemais.mysql.dbaas.com.br';
    static $DATABASE_USER 	= 'ilumemais';
    static $DATABASE_PASSWD = 'InfoDmz616';
    static $DATABASE_NAME 	= 'ilumemais';

}
