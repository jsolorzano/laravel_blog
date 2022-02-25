@extends('..layouts.app')

@section('content')
<div class="container" style="margin-top:30px">
  <div class="row bg-gray justify-center text-center">
    <h2 class="py-4 text-3xl">About me</h2>
    <div class="flex text-justify justify-center">
        <div class="max-w-5xl px-2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate necessitatibus ullam commodi perferendis accusamus sint error sequi, dolorem nam, vel praesentium dignissimos nostrum quod fuga corporis asperiores laudantium, possimus veniam!
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure cumque qui impedit quod earum dolores nisi nemo totam vero natus aperiam, libero consequuntur nesciunt atque officia exercitationem rerum. Veritatis!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas in hic ratione recusandae nostrum, saepe aliquam alias ipsum? Asperiores rerum numquam officia harum atque, impedit perspiciatis facilis nobis tempora est!
        </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top:30px">
  <div class="row bg-gray justify-center text-center">
	<h2 class="py-4 text-3xl border-solid border-gray border-b-2">Lasts posts</h2>
  </div>
</div>

<div class="container">
  <div class="row bg-gray justify-center text-center">
	<div class="flex flex-wrap justify-between">
		@foreach($posts as $post)
		<article class="text-left">
			<h3>{{$post->title}}</h3>
			<p>{{$post->get_limit_body}} <a class="font-bold text-blue no-underline hover:underline" href="{{ route('posts.detail', $post->slug) }}">Read more</a></p>
		</article>
		@endforeach
	</div>
  </div>
</div>
@endsection
