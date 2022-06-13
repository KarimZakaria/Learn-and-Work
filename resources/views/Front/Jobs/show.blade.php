@extends('Front.layouts')

@section('title' , $job->job_name .' Job')

@section('content')

    <div class="home">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url({{asset('front/images/courses_background.jpg')}}"></div>
        </div>
        <div class="home_content text-white">
            <h3>Jobs<span> / </span>{{ $job->job_name}}<span></h3>
        </div>
    </div>

    <div class="container mt-5 ">
        @if(session()->has('success'))
            <div class="alert alert-success mt-4 text-center">
                {{session()->get('success')}}
            </div>
        @endif
    </div>

    <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="mb-5">Special Jobs / {{$job->job_name}}</h1>
                    </div>
                </div>
            </div>

            <div class="site-section bg-light">
                <div class="container">
                  <div class="row">

                    <div class="col-md-12 col-lg-8  text-dark">

                      <div class="p-5 bg-white">

                        <div class="mb-4 mb-md-5 mr-5">
                         <div class="job-post-item-header d-flex align-items-center">
                           <h2 class="mr-3 text-black h4">{{$job->job_name}}</h2>
                           <div class="badge-wrap">
                            <span class="border border-warning text-warning py-2 px-4 rounded">{{$job->work_hours}}</span>
                           </div>
                         </div>
                         <div class="job-post-item-body d-block d-md-flex">
                           <div class="mr-3 mt-3 text-info"><span class="fl-bigmug-line-portfolio23"></span> {{$job->company_name}}</div>
                           <div class="mt-3"><span class="fl-bigmug-line-big104"></span> <span>{{$job->location}}</span></div>
                         </div>
                        </div>



                        <div class="img-border mb-5">
                          <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">

                            <img src="{{asset('Uploads/jobs/' .$job->image)}}" alt="Image" class="img-fluid rounded">
                          </a>
                        </div>
                        <strong>{{$job->job_name}}</strong> Job in Needed : <span class="text-dark mt-2"> {{$job->preview}} </span>
                        <li class="text-dark mt-2"> {{$job->requirments}} </li>
                        <li class="text-dark mt-2"> {{$job->experience}} </li>
                        <span class="text-success mt-2"> {{$job->salary}}, May Be Upgraded Due To The Intrerview</span>
                        <p class="mt-5"><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
                      </div>
                    </div>

                    <div class="col-lg-4">


                      <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">More Info</h3>
                        <p class="text-muted">{{$job->who_are }}</p>

                        <p><a href="#" class="btn btn-primary  py-2 px-4 mt-3">Apply Job</a></p>
                      </div>

                      <div class="p-4 mb-3 bg-white">
                        <form class="form-group" method="post" enctype="multipart/form-data" action="{{ route('Job.Enroll') }}">
                            @csrf
                            <input type='hidden' name="job_id" value="{{$job->id}}">

                            <label class="mt-3"> Your Name (Nullable): </label>
                            <input name="name" placeholder="Enter Your Name " class="form-control
                            @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label class="mt-3"> Your Email (Nullable): </label>
                            <input name="email" placeholder="Enter Your Email " class="form-control
                            @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="" class="mt-3">Upload Your CV ( <span class="text-danger">Required* </span> )</label>
                            <input type="file" name="cv" placeholder="Upload Your CV" class="form-control
                            @error('cv') is-invalid @enderror">
                            @error('cv')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            <p><button type="submit" class="btn btn-primary py-2 px-4 mt-3">Apply Job</button></p>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="site-section">
                <div class="container">
                  <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-6" data-aos="fade" >
                      <h2>Frequently Ask Questions</h2>
                    </div>
                  </div>


                  <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
                    <div class="col-md-8">
                      <div class="accordion unit-8" id="accordion">
                      <div class="accordion-item">
                        <h3 class="mb-0 heading">
                          <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
                        </h3>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="body-text">
                              <span class="text-muted">Our Company Is Called <strong class="text-dark">{{$job->company_name}}</strong> And About Our Description {{$job->who_are}}</span>
                          </div>
                        </div>
                      </div> <!-- .accordion-item -->

                      <div class="accordion-item">
                        <h3 class="mb-0 heading">
                          <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>
                        </h3>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="body-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                          </div>
                        </div>
                      </div> <!-- .accordion-item -->

                      <div class="accordion-item">
                        <h3 class="mb-0 heading">
                          <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>
                        </h3>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="body-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                          </div>
                        </div>
                      </div> <!-- .accordion-item -->

                      <div class="accordion-item">
                        <h3 class="mb-0 heading">
                          <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>
                        </h3>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="body-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                          </div>
                        </div>
                      </div> <!-- .accordion-item -->

                    </div>
                    </div>
                  </div>

                </div>
            </div>

        </div>
    </div>


@stop

