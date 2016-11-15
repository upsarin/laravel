 <script src="{{ asset('/vendor/short-link/js/short-link.js') }}"></script>.
  <link href="{{ asset('/vendor/short-link/css/short-link.css') }}" rel='stylesheet' type='text/css'>
  
  
			<div class="panel panel-default">
                <div class="panel-heading">
                    New Link
                </div>

                <div class="panel-body">
                   
                    

                    <!-- New Link Form -->
                    <form action="{{route('short-link-create')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Link URL -->
                        <div class="form-group">
                            <label for="link_url" class="col-sm-3 control-label">Original Link</label>

                            <div class="col-sm-6">
                                <input type="text" name="orig_url" id="link_url" class="form-control" value="">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="submit" class="btn btn-default" id="submitForm" value="Create Short Link" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			
			 <!-- Display Validation Errors -->
			@if ($responce['message'] && $responce['message'] != "")
				<div id="error_mess" class="alert alert-success">{{ $responce['message'] }}</div>
			@else

				
			<div class="panel panel-default">	
					<div class="panel-heading">
                        Short Links list
                    </div>
				
                    

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Short Link</th>
                                <th></th>
                                <th>Original Link</th>
                            </thead>
				@if (count($links) > 0)
                            <tbody  id="linkList">
                                @foreach ($links as $link)
                                    <tr>
                                        <td>
                                           <a target="_blank" href="{{ $link->orig_url }}">{{ $link->short_url }}</a>
                                        </td>
                                        <td>
											&nbsp; -- > &nbsp;
                                        </td>
										<td>
											{{ $link->orig_url }}
                                        </td>
                                    </tr>
                                @endforeach

				@else
									<tr id="noResult"> 
										<td>
											No links, sorry, but u will be the first.
										</td>
										<td>
										</td>
										<td>
										</td>
									</tr>
                @endif
							</tbody>
                        </table>
                    </div>
			</div>
</div>	