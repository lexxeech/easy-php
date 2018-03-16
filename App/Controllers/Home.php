<?php
namespace App\Controllers;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * @api {get} / Home
     * @apiName Home
     * @apiGroup Home
     * @apiSampleRequest /
     */
    public function indexAction()
    {
        View::renderStatic('index.html');
    }

}
