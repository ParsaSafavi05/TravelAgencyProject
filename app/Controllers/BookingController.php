<?php
use App\Http\BaseController;

class BookingController extends BaseController{
    public function index()
    {
        return $this->view('booking/index', ['']);
    }
}