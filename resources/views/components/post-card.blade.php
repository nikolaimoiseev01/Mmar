@props([
    'post'
])
<a {{ $attributes->merge(['class' => '']) }} href="{{route('portal.post', $post['id'])}}" wire:navigate>
    <!-- Image wrapper -->
    <div class="relative h-[454px]">
        <img src="{{$post->getFirstMediaUrl('cover')}}" alt="Blog Post" class="w-full h-full object-cover rounded-t"/>

        <!-- Tag -->
        <span class="absolute top-4 left-4 bg-red-300 text-bright-200 text-base px-4 py-1 rounded-3xl">
          {{$post->postTopic['name']}}
        </span>

    </div>

    <!-- Content -->
    <div class="pt-4">
        <p class="text-red-300 mb-2">{{ $post['custom_created_at']->format('F d, Y') }}</p>
        <h3 class="text-2xl font-bold font-semibold mb-2">
            {{$post['title']}}
        </h3>
        <p class="">{{$post['description']}}</p>
    </div>
</a>
