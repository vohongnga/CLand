<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ContactModel;

class AdminContactController extends Controller
{
    public function __construct(ContactModel $contactModel)
    {
    	$this->contactModel = $contactModel;
    }
    public function index()
    {
    	$itemsCon = $this->contactModel->getItems();
    	return view('admin.contact.index',compact('itemsCon'));	
    }
}
