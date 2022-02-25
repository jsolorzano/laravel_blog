@extends('..layouts.app')

@section('content')
<div class="container" style="margin-top:30px">
  <div class="row bg-gray justify-center text-center">
	<h1 class="">{{$post->title}}</h1>
  </div>
</div>
<div class="container" style="margin-top:30px">
    <div class="row justify-center">
        <div class="max-w-4xl text-justify">
            {{$post->body}}
        </div>
    </div>
</div>

<div class="container" style="margin-top:30px">
    <div class="row justify-content-left">
		@guest
		<div class="alert alert-info">You must be logged in to write comments</div>
		@else
		<div class="col-md-8">
            <div class="card">
                <div class="card-header">Add comment</div>
                <div class="card-body">
					<form action="{{ route('comments.store') }}" method="post">
						@csrf
						<textarea class="form-control border rounded" name="comment" placeholder="Write your comment here" required>{{ old('comment') }}</textarea>
						<input type="hidden" name="post_id" value="{{$post->id}}">
						<input type="submit" value="SEND" class="btn btn-primary cursor-pointer font-bold border rounded text-white">
						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						@if($errors->any())
						<div class="alert alert-warning">
							{{$errors->first()}}
						</div>
						@endif
					</form>
				</div>
            </div>
        </div>
		@endguest
	</div>
</div>

<div class="container" style="margin-top:10px">
  <div class="row bg-gray justify-center text-center">
	<h3 class="py-4 text-3xl border-solid border-gray border-b-2">Comments</h3>
  </div>
</div>

<div class="container">
    <div class="row justify-start text-left rounded">
		@foreach($post->comments as $comment)
		<div class="bg-white border col-md-12 py-4">
			<div class="header justify-between">
				<div>
					<strong>By {{$comment->user->name}}</strong>
				</div>
				<div>
					<i>{{$comment->created_at->format('j F, Y')}}</i>
				</div>
			</div>
			<div class="text-lg">{{$comment->comment}}</div>
		</div>
		<br>
		@endforeach
    </div>
</div>
@endsection
