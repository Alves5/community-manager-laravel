<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de posts</title>

        <!-- Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/3795336791.js" crossorigin="anonymous"></script>
        <!-- Uikit -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>
</head>
<body>
    @foreach($posts as $post)
    <div class="uk-container">
        <div class="uk-card uk-card-default uk-width-1-2@m uk-margin-bottom" data-id="{{ $post->id }}">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">{{ $post->title }}</h3>
                        <p class="uk-text-meta uk-margin-remove-top">{{ $post->created_at }} by {{ $post->user->name }}</p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <p>{{ $post->body }}</p>
            </div>
            <div class="uk-card-footer ">
                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-top">
                    <li>
                        <a href="#" class="uk-button uk-button-text like">
                            {{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'Foi dado o like' : 'Like' : 'Like' }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="uk-button uk-button-text like">
                            {{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'Foi dado o deslike' : 'Deslike' : 'Deslike' }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
</body>
<script>
var token = '{{ Session::token() }}';
var urlLike = '{{ route('Like') }}';
var postId = 0;

$('.like').click(function(event){
    event.preventDefault();
    postId = 1; 
    var isLike = event.target.previousElementSibling == null;
    
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    }).done(function(){
        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Foi dado o like' : 'Like' : event.target.innerText == 'Deslike' ? 'Foi dado deslike' : 'Deslike';
        if(isLike){
            event.target.nextElementSibling.innerText = 'Deslike';
        }else{
            event.target.previousElementSibling.innerText = 'Like';
        }
    });
});
</script>
</html>