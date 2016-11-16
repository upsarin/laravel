<?php  namespace LaravelShort\ShortLink\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelShort\ShortLink\Models\ShortLink;

class ShortLinkController extends Controller
{
	
     public function index(ShortLink $shortlinkModel)
    {
		
        return view('short-link::index');
	}
	
    public  function  create(ShortLink $shortlinkModel)
    {
		$responce = $shortlinkModel->saveLink(Request $request);
		
    }

}