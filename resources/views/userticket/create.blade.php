<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Booking Form HTML Template</title>
	<!-- Custom stlylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				
				<div class="row">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif
					@if (session('msg'))
						<div class="alert alert-danger">
							{{ session('msg') }}
						</div>
					@endif
					<div class="booking-form">
						<div class="booking-bg"></div>
						<form action="{{route('usesrticket.store')}}" method="POST">
						
                            @csrf
							<div class="form-header">
								<h2>Make your reservation</h2>
							</div>
                            <div class="form-group">
								<span class="form-label">Name</span>
								<input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="Enter your name" required >
								{{$errors->first('name')}}
							</div>
							
							<div class="form-group">
								<span class="form-label">Email</span>
								<input class="form-control" value="{{old('email')}}" name="email" type="email" placeholder="Enter your email" required class="@error('email') is-invalid @enderror">
									@error('email')
    								<div class="alert alert-danger">{{ $message }}</div>
									@enderror
							</div>
							<div class="form-group">
								<span class="form-label">Phone</span>
								<input class="form-control" value="{{old('phone')}}" name="phone" type="tel" placeholder="Enter your phone number"required>
							</div>
							<div class="form-group">
									<span class="form-label">Ticket Type</span>	
																					
											<select class="form-control" name="category_id" id="type" >						
											@if($normal_count >= 200 && $student_count >= 200)
											<option value="2"  id="2" disabled>{{$categories[1]->type}}	not avilabe now</option> 
											<option value="1"  id="1" disabled>{{$categories[0]->type}}	not avilabe now</option> 
											 @elseif($normal_count >= 200 && $student_count < 200)      									
											 <option value="1"  id="1" disabled>{{$categories[0]->type}} not avilabe now</option> 
											 <option value="2"  id="2" >{{$categories[1]->type}}</option> 	
											 @elseif($normal_count < 200 && $student_count >= 200)      								
											 <option value="1"  id="1" >{{$categories[0]->type}}</option> 
											 <option value="2"  id="2" disabled>{{$categories[1]->type}} not avilabe now</option> 	
											 @else     								
											 <option value="1"  id="1" >{{$categories[0]->type}}</option> 
											 <option value="2"  id="2" >{{$categories[1]->type}}</option> 
											 @endif							
											</select>
											
											<span class="select-arrow"></span>
							</div>
							<div class="form-btn">
								<button class="submit-btn" >Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>