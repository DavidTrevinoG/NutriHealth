<!-- resources/views/components/comment-card.blade.php -->
<div class="flex items-start mb-3">
    <img class="w-12 h-12 rounded-full mr-3" src="../../{{ $comment->user->profile_photo }}"
        alt="{{ $comment->user->name }}">
    <div>
        <h5 class="text-md font-semibold">{{ $comment->user->name }}</h5>
        <p class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
        <p class="text-gray-800">{{ $comment->content }}</p>
    </div>
</div>
