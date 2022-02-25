@extends('..layouts.app')

@section('content')
<div class="container" style="margin-top:30px">
  <div class="row bg-gray justify-center text-center">
	<h1 class="">Edit Post</h1>
  </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post) }}">
                        @csrf
						@method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" class="form-control" type="text" name="title" value="{{ $post->title }}" placeholder="Write the title of the post" autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="body" name="body" placeholder="Write your post here" required>{{ $post->body }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="is_draft" class="col-md-4 col-form-label text-md-end">{{ __('Is draft') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="is_draft" value="0">
								@if (!$post->is_draft)
									<input type="checkbox" name="is_draft" value="1">
								@else
									<input type="checkbox" name="is_draft" value="1" checked>
								@endif 
								Is draft?
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SEND') }}
                                </button>
                            </div>
                        </div>
                        
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
