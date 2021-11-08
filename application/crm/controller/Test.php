<?php


namespace app\crm\controller;


use think\Controller;
use think\Request;
use think\Session;

class Test extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $request = Request::instance();
        $this->param = $request->param();
    }
}