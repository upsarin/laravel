<?php  namespace LaravelShort\ShortLink\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelShort\ShortLink\Models\ShortLink;

class ShortLinkController extends Controller
{
     public function form(ShortLink $shortlinkModel)
    {
		$links = $shortlinkModel->getAllLinks();
        return view('short-link::form', ['links' => $links]);
	}
	
    public  function  create(ShortLink $shortlinkModel)
    {
		$responce = $shortlinkModel->saveLink(Request $request);
		if(Request::ajax())
		{
			echo json_encode($responce);
		} else {
			$links = $shortlinkModel->getAllLinks();
			return view('short-link::form', ['links' => $links, 'message' => $responce['message']]);
		}
    }

}