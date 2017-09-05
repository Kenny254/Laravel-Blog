<div class="blog-area gray-bg pt-100 pb-120">
    <div class="container">
        <div class="about-bottom-left blog-mrg clearfix text-center">
            <h2>Our Blog</h2>
            <p>Read some of the latest posts from our blog.</p>
        </div>
        <div class="row">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="col-md-6 col-sm-6">
                        <div class="blog-img-text res">
                            <div class="blog-img">
                                <a href=""><img src="{{ asset('images/posts/' . $post->image) }}" alt="" style="width: 300px; height: 260px;"></a>
                            </div>
                            <div class="blog-text">
                                <span>{{ date('M j, Y', strtotime($post->created_at)) }}</span>
                                <h4><a href="text-animator.html#">{{ $post->title }}</a></h4>
                                <p>{{ substr(strip_tags($post->body), 0, 80) }}{{ strlen(strip_tags($post->body)) > 80 ? "..." : "" }}</p>
                                <a href="">Read More <i class="ion-arrow-right-c"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-6 col-md-offset-3 alert alert-warning text-center">
                    Oops! No posts have been posted yet
                </div>
            @endif
        </div>
    </div>
</div>