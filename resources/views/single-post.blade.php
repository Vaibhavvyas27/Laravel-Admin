<x-front-layout>
    <div>
      <style>
        .site-section-cover.overlay{
          background-position: center !important;
          background-attachment:fixed; 
        }
       
      </style>
        <div class="ftco-blocks-cover-1">
            <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('/storage/{{$blog->image}}');background-position: center;">
              <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                  <div class="col-md-7">
                    <span class="d-block mb-3 text-white" data-aos="fade-up">{{date('d-m-Y', strtotime($blog->created_at))}}<span class="mx-2 text-primary">&bullet;</span> {{$blog->auther}}</span>
                      <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">{{$blog->post_title}}</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <div class="site-section">
            <div class="container">
              <div class="row">
                <div class="col-md-8 blog-content">
                  {!! $blog->description !!}
                </div>
                <div class="col-md-4 sidebar">
                  <div class="sidebar-box">
                    <form action="#" class="search-form">
                      <div class="form-group">
                        <span class="icon fa fa-search"></span>
                        <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                      </div>
                    </form>
                  </div>
                  <div class="sidebar-box">
                    <img src="/assets/img/Profile-2.png" alt="Image" class="img-fluid mb-4 w-50 rounded-circle">
                    <h3 class="text-black">About The Author</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                    <p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
                  </div>
                  <style>
                    .social_29128 div#social-links ul{
                      display: flex;
                      flex-direction: row;
                      width: 70%;
                      flex-wrap: wrap;
                      gap: 6px;
                    }
                    div#social-links ul a{
                      font-size: 20px;
                    }
                    
                  </style>
                  <div class="sidebar-box">
                    <h4 class="text-black">Share with Others </h4>
                    <div class="social_29128 mt-4">
                        {!! $share !!}  
                     </div>
                    <div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</x-front-layout>