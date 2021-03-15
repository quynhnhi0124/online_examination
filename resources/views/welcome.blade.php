@extends('layouts.app')

@section('content')
<div class="content">
    <section class="slider-pro slider" id="slider">
        <div class="sp-slides">

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <div class="img-overlay"></div>

                <img class="sp-image" src="{{asset ('/img/slider-1.jpg')}}" alt="Slider 1"/>
                <div class="caption">
					<h1 class="sp-layer slider-text-big"
					data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
					<span class="highlight-texts">Hệ thống đề thi đa dạng!</span>
					</h1> 
					<p class="sp-layer"
					data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
						Số lượng đề thi phong phú ở mỗi môn thi
					</p>
				</div>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide main-slides">
            <div class="img-overlay"></div>
                <img class="sp-image" src="{{asset ('/img/slider-2.jpg')}}" alt="Slider 2"/>
                <div class="caption">
                <h1 class="sp-layer slider-text-big"
                data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                <span class="highlight-texts">Cải thiện kỹ năng</span>
                </h1>

                <p class="sp-layer"
                data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                    Giúp học sinh cải thiện kỹ năng làm bài thi
                </p>
				</div>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <div class="img-overlay"></div>

                <img class="sp-image" src="{{asset ('/img/slider-3.jpg')}}" alt="Slider 3"/>
				<div class="caption">
                <h1 class="sp-layer slider-text-big"
                data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                <span class="highlight-texts">Right Experiences</span>
                </h1>

                <p class="sp-layer"
                data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                </p>
				</div>
            </div>
            <!-- Slides End -->

        </div>
    </section>
    <!-- Main Slider End -->


    <section id="about" class="about-sec section-wrapper description">
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Trang web thi trắc nghiệm trực tuyến</span></h2>
                </div>
                <!-- Section Header End -->

                <div class="col-md-6 col-sm-6 col-xs-12 custom-sec-img wow fadeInDown">
                    <img src="{{asset ('/img/slider-1.jpg')}}" alt="Custom Image">
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 customized-text wow fadeInDown black-ed">
				    <p>Chào mừng các bạn đến với trang web thi trắc nghiệm trực tuyến! Ở đây chúng tôi cung cấp những đề thi chất lượng </p>
                    <div class="row"> 
                        <div class="col-md-11">
                            <strong>Skill Central</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam iusto, natus est ducimus saepe laborum</p>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-11">
                            <strong>Active Central</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam iusto, natus est ducimus saepe laborum Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-11">
                            <strong>Growth Central</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam iusto, natus est ducimus saepe laborum Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section> 
  
    <section id="services" class="section-wrapper">
        <div class="container">
            <div class="row">

                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Phân loại đề thi</span></h2>
                </div>
                <!-- Section Header End -->

                <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown black-ed">
				    <p>Ở đây chúng tôi cung cấp những đề thi chất lượng từ các môn học: </p>
                    <div class="row"> 
                        <div class="col-md-11" style="padding-right: 0; height: 320px; overflow-y:scroll;">
                            <ul class="list-group list-group-flush">
                            @foreach($subjects as $s)
                                <li class="list-group-item">{{$s->subject}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 custom-sec-img wow fadeInDown">
                    <img src="{{asset ('/img/slider-1.jpg')}}" alt="Custom Image">
                </div>
            </div>
        </div>
    </section> 


<section id="info" class="info-section">
<div class="container text-xs-center">
         <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Thống kê</span></h2>
                   
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Thống kê số liệu đề thi và người dùng</p>
                </div>
                <!-- Section Header End -->
        <div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">
                
                <i class="icon_mic_alt wow pulse" style="visibility: visible; animation-name: pulse;"></i>
                <h4>Số môn thi</h4>
				<h1 class="text-primary">{{count($subject)}}</h1>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">
                
                <i class="icon_gift_alt wow pulse" style="visibility: visible; animation-name: pulse;"></i>
                <h4>Số đề thi</h4>
				<h1 class="text-primary">{{$exams}}</h1>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">
              
                <i class="icon_mobile wow pulse" style="visibility: visible; animation-name: pulse;"></i>
                <h4>Số người dùng</h4>               
			   <h1 class="text-primary">{{$users}}</h1>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">
               
                <i class="icon_lightbulb_alt wow pulse" style="visibility: visible; animation-name: pulse;"></i>
                <h4>Số lượt làm bài thi</h4>               
			   <h1 class="text-primary">{{$attempts}}</h1>
            </div>
        </div> 
    </div>
</section>

    <section id="pricing" class="pricing-section">
        <div class="container">
            <div class="row">

                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Top người dùng</span></h2>
                   
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Bảng xếp hạng theo điểm, lượt làm bài thi của người dùng</p>
                </div>
                <!-- Section Header End -->
                @foreach($data as $key=>$rank)
                <div class="pricing-wrapper">
                    <!-- Plans -->
                    <div class="col-md-4 col-sm-4 col-xs-12 pricing-plans wow bounceInLeft hoverer">
                        <div class="pricing-titles">
                            <h2>#{{$key+1}}</h2>
                            <p>Username: {{$rank->username}}</p>
                        </div>
                        <div class="pricing-service-name">
                            <ul>
                                <li>Lượt thi: {{$rank->number}}</li>
                                <li>Điểm trung bình: {{number_format($rank->score, 2)}}</li> 
                            </ul>
                        </div>

                         <div class="bg-btn">
                        </div>
                    </div>
                    <!-- Plans End -->
                </div>
                @endforeach
            </div>
        </div> 
    </section>
</div>
    

@endsection