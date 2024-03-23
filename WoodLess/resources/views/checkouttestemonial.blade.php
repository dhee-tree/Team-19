@extends('layouts.base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
@endsection

@section('content')
	<div class="container pt-5">
		<div class="wrapper">
			<h3>How was your expereince with us ?</h3>
			<form action="{{ route('submit.testimonial') }}" method="POST">
				@csrf
				<div class="rating">
					<input type="number" name="rating" hidden>
					<i class='bx bx-star star' style="--i: 0;"></i>
					<i class='bx bx-star star' style="--i: 1;"></i>
					<i class='bx bx-star star' style="--i: 2;"></i>
					<i class='bx bx-star star' style="--i: 3;"></i>
					<i class='bx bx-star star' style="--i: 4;"></i>
				</div>
				<textarea name="opinion" cols="30" rows="5" placeholder="Description"></textarea>
				<div class="btn-group">
					<button type="submit" class="btn btn-submit">Submit</button>
					<button class="btn btn-cancel">Cancel</button>
				</div>
				@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
			</form>
		</div>
	</div>
@endsection

@section('js')
    <script src="{{ asset('js/review.js') }}"></script>
@endsection