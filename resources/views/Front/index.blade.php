<x-front-layout>
    <div>
        <div class="site-section">

            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-md-10">
                  <div class="heading-39101 mb-5">
                    <span class="backdrop text-center">Blog</span>
                    <span class="subtitle-39191">Updates</span>
                    <h3>Our Blog</h3>
                  </div>
                </div>
              </div>
      
              <div class="row">
                @foreach ($blogs as $blog )
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                          <a href="{{route('trip.single.page',$blog->id)}}">
                              <img src="{{ URL::asset('storage/' . $blog->image) }}" alt="Image"
                              class="img-fluid">
                          </a>
                          <div class="post-entry-1-contents">
                              
                              <h2><a href="{{route('trip.single.page',$blog->id)}}">{{$blog->post_title}}</a></h2>
                              <span class="meta d-inline-block mb-3">{{date('d-m-Y', strtotime($blog->created_at))}} <span class="mx-2">by</span> <a href="#">{{$blog->auther}}</a></span>
                              <p>{!!Str::words($blog->description,40)!!}</p>
                          </div>
                        </div>
                    </div>
                @endforeach
              </div>
            </div>
        </div>
    </div>
</x-front-layout>