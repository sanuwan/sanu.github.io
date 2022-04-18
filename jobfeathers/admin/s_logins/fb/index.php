<?php

require_once 'fb_function.php';
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );
require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/Entities/SignedRequest.php');
require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookSignedRequestFromInputHelper.php');
require_once( 'Facebook/FacebookCanvasLoginHelper.php');
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookOtherException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphUser.php');
require_once( 'Facebook/GraphSessionInfo.php' );

use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;
use Facebook\FacebookSession;
use Facebook\FacebookSignedRequestFromInputHelper;
use Facebook\FacebookCanvasLoginHelper;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;

/* PROCESS */

//1.Stat Session
session_start();
//2.Use app id,secret and redirect url
$app_id = '997273206982641';
$app_secret = '5dfc236fe8434982ff583d45cf69c760';
$redirect_url = 'http://localhost/jobsceylon/admin/s_logins/fb/index.php';

//3.Initialize application, create helper object and get fb sess
FacebookSession::setDefaultApplication($app_id, $app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);
$sess = $helper->getSessionFromRedirect();

//4. if fb sess exists echo name 
if (isset($sess)) {
    //create request object,execute and capture response
    $request = new FacebookRequest($sess, 'GET', '/me');

    // from response get graph object
    $response = $request->execute();
    $me = $response->getGraphObject();

    // use graph object methods to get user details
    $id = $me->getProperty('id');
    $name = $me->getProperty('name');

    $fb_function = new fb_login();

    echo $fb_function->check($id,$name);
} else {
    //else echo login
   // echo '<a href=' . $helper->getLoginUrl(array('email')) . '>Login with facebook</a>';
}
