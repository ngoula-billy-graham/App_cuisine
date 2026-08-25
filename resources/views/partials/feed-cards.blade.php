@foreach($posts as $post)
<div class="creation-card" data-category="{{ $post->category }}">
    <div class="card-img card-img-1">
        <div class="card-tag">{{ $post->category }}</div>
        🍽️
    </div>
    <div class="card-body">
        <h3>{{ $post->title }}</h3>
        <p>{{ Str::limit($post->content, 80) }}</p>
        <div class="card-meta">
            <span class="card-time">{{ $post->created_at->diffForHumans() }}</span>
            <div class="card-stats">
                <span class="card-stat">👁 {{ $post->views }}</span>
            </div>
        </div>
        <div style="margin-top: 12px; display: flex; align-items: center; gap: 10px;">
            <button class="like-btn" data-post-id="{{ $post->id }}" 
                    style="background: none; border: none; color: #e74c3c; font-size: 1.2rem; cursor: pointer; display: flex; align-items: center; gap: 4px;">
                ❤️ <span class="like-count">{{ $post->likes }}</span>
            </button>
        </div>
    </div>
</div>
@endforeach