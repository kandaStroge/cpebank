@extends('customer.layout')

@section('content')
{{ csrf_field() }}
<div class="row">
				
				<div class="col-lg-6 footer_col magic_fade_in" style="visibility: inherit; opacity: 1;">
					<div class="footer_about">
						
						
						
						<div class="contact_container">
							<form action="#" id="contact_form" class="contact_form">
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="contact_input " value="{{$user->fname}} {{$user->lname}}"  required="required" readonly>
									</div>
									<div class="col-md-6">
										<input type="email" class="contact_input " value ="{{$user->email}}"  required="required" readonly>
									</div>
								</div>
                                <div>
										<input type="text" class="contact_input" id="title"  placeholder="Title"  value =""  required="required" >
									</div>
								<div>
									<textarea class="contact_input contact_textarea"  id="message" placeholder="Message" required="required"></textarea>
								</div>
								<input type='button' class="contact_button" value="Send" onclick="sendIssue()">
							</form>
						</div>
					</div>
				</div>

				
				<div class="row">
			</div>
		</div>


<script>
    function sendIssue(){
        
        $.post(window.location, {
            _token: $("input[name='_token']").val(),
            title: $("#title").val(),
            description: $("#message").val(),
        }, function(result){
         document.location = document.location;
        });
    }
</script>

@endsection