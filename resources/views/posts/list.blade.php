@extends('..layouts.app')

@section('content')
<div class="container" style="margin-top:30px">
  <div class="row bg-gray justify-center text-center">
	<h1 class="">List Post</h1>
  </div>
</div>

<div class="container" style="margin-top:30px">
    <div class="row justify-content-left">
		
		<a type="button" class="btn btn-primary" href="{{ route('posts.create') }}" title="New">
			Create new post
		</a>
		
		<div>

		@if (session('status'))

			<div class="alert alert-success" style="margin-top:30px;">x

			  {{ session('status') }}

			</div>

		@endif

		@if($errors->any())

			<div class="alert alert-warning" style="margin-top:30px;">x

			  {{$errors->first()}}

			</div>

		@endif

		<table class="table table-bordered mt-8">

			<thead>

				<tr>

					<th>Title</th>

					<th>Creation</th>

					<th>Author</th>

					<th>Status</th>

					<th>Actions</th>

				</tr>

			</thead>

			<tbody>

				@foreach($posts as $post)

				<tr>

					<td>{{ $post->title }}</td>

					<td>{{ $post->created_at->format('j F, Y') }}</td>

					<td>{{ $post->user->name }}</td>

					<td>
						@if ($post->is_draft)
							<div class="text-red">In draft</div>
						@else
							<div class="text-green">Published</div>
						@endif
					</td>

					<td>

						<a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post) }}" title="Edit">Edit</a>

						<a class="btn btn-danger btn-sm delete-post" href="{{ route('posts.destroy', $post) }}" title="Delete" data-id="{{$post->id}}">Delete</a>
						
						<form id="posts.destroy-form-{{$post->id}}" action="{{ route('posts.destroy', $post) }}" method="POST" class="hidden">
							{{ csrf_field() }}
							@method('DELETE')
						</form>

					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

	</div>

	</div>
</div>
<script>

    var delete_post_action = document.getElementsByClassName("delete-post");

    var deleteAction = function(e) {
        event.preventDefault();
        var id = this.dataset.id;
        if(confirm('Are you sure?')) {
            document.getElementById('posts.destroy-form-' + id).submit();
        }
        return false;
    }

    for (var i = 0; i < delete_post_action.length; i++) {
        delete_post_action[i].addEventListener('click', deleteAction, false);
    }
</script>
@endsection
