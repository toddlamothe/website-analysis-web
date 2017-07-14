<?php
/**
 * Created by: Yuriy Chabaniuk
 */


namespace App\Controllers;

use App\Core\Controller\Controller;


class ReportController extends Controller {

    public function hello() {

        return "<h1>Hooray</h1>";
    }

    public function report() {

        return $this->render('report', [
            'some' => 'Name'
        ]);
    }
}