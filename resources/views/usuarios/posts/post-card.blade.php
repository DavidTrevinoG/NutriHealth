<!-- resources/views/components/post-card.blade.php -->
<div class="bg-white shadow-md rounded-lg mb-4 p-4">
    <div class="flex items-center mb-4">
        <img class="w-12 h-12 rounded-full mr-3" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
        <div>
            <h5 class="text-lg font-semibold">{{ $post->user->name }}</h5>
            <p class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <p class="text-gray-800 mb-4">
        {{ $post->content }}
    </p>
    <div class="border-t pt-4 mt-4">
        <h6 class="text-md font-semibold mb-2">Comentarios</h6>
        @foreach ($post->comments as $comment)
            <x-comment-card :comment="$comment" />
        @endforeach
    </div>
</div>
