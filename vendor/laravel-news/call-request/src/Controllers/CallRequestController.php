<?php  namespace LaravelNews\CallRequest\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelNews\CallRequest\Models\CallRequest;

class CallRequestController extends Controller
{
	public function form()
	{
		return view('call-request::form');
	}
    
    public function create(Request $request)
    {
			$links_orig = CallRequest::orderBy('id', 'desc')
				->where('orig_url', '=', $request->orig_url)
				->get();
				
			if(count($links_orig) > 0){
				$links_orig = $links_orig[0];
				$responce['orig_url'] = $links_orig->orig_url;
				$responce['short_url'] = $links_orig->short_url;
				$responce['message'] = "We already have that URL";
				$responce['repeat'] = "Y";
				
			} else {
				
				$link_array = explode("/", $request->orig_url);
				
				if($link_array[0] == "http:" || $link_array[0] == "https:"){
					$first_post_array = $link_array[0] ."//". $link_array[2];
					$end_post_array = "";
					
					foreach($link_array as $key => $val){
						
						if($key > 2){
							$end_post_array .= "/". $val;
						}
						
					}
					
				} else {
					$first_post_array = "http://". $link_array[0];
					$end_post_array = "";
					
					foreach($link_array as $key => $val){
						if($key != 0){
							$end_post_array .= "/". $val;
						}
					}
				}
				
				$first_part_link = $first_post_array;
				$second_part_link = md5($end_post_array. rand(0,9) ."foryou". rand(0,9) . date("YdmHis"));
			
				$edit_url = "http://". $_SERVER['HTTP_HOST'] ."/". substr($second_part_link, 0, 4);
					
				
				//check edit_url on exist
				$links_short = CallRequest::take('short_url')
					->where('short_url', '=', $edit_url)
					->get();
				
				//if exist, add one random symbol
				while(count($links_short) > 0){
					$edit_url .= substr($second_part_link, rand(11, 12), rand(12, 13));
					
					$links_short = CallRequest::take('short_url')
						->where('short_url', '=', $edit_url)
						->get();
				}
				
				$full_url = $first_part_link ."". $end_post_array;
				
				
				$new_link = new CallRequest;
				$new_link->orig_url = $full_url;
				$new_link->short_url = $edit_url;
				
				if($new_link->save()){
					$responce['orig_url'] = $full_url;
					$responce['short_url'] = $edit_url;
					$responce['message'] = 'Successful create another short link';
					$responce['repeat'] = false;
				} else {
					$responce['orig_url'] = false;
					$responce['short_url'] = false;
					$responce['message'] = 'Error';
					$responce['repeat'] = false;
				}
				
			}
			
		
			return json_encode($responce);
		
    }

}