@extends('layouts.app')

@section('content')
<div class="content">
    <section class="slider-pro slider" id="slider">
        <div class="sp-slides">

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <div class="img-overlay"></div>

                <img class="sp-image" src="#" alt="Slider 1"/>
                <div class="caption">
					<h1 class="sp-layer slider-text-big"
					data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
					<span class="highlight-texts">Above and Beyond!</span>
					</h1> 
					<p class="sp-layer"
					data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit
					</p>
				</div>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide main-slides">
            <div class="img-overlay"></div>
                <img class="sp-image" src="#" alt="Slider 2"/>
                <div class="caption">
                <h1 class="sp-layer slider-text-big"
                data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                <span class="highlight-texts">Early Learning</span>
                </h1>

                <p class="sp-layer"
                data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                </p>
				</div>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <div class="img-overlay"></div>

                <img class="sp-image" src="#" alt="Slider 3"/>
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
                    <img src="#" alt="Custom Image">
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 customized-text wow fadeInDown black-ed">
				    <p>Lorem ipsum dolor sit amet, consec tetur adipisi cing elit. Ipsa sit, numquam amet voluptatibus obcaecati ea maiores totam nostrum, ad iure rerum quas harum  ipsum.  lobcaecati ea maiores totam nostrum, ad iure rerum quas harum ipsum. Rem ea ducimus quos quae quo.</p>
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
                   
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Đề thi được phân loại theo môn học, có các câu hỏi phân chia độ khó</p>
                </div>
                <!-- Section Header End -->
 
                <div class="our-services">
		            <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="#" alt="Custom Image">
                                <div class="icon">
                                    <i class="icon_cone"></i> <h3>Toán</h3>
                                </div> 
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisi cing elit. Ipsa sit, numquam amet voluptatibus obcaecati ea maiores totam nostrum, ad iure rerum quas harum  </p>
                                <a href="#contact" class="btn">Xem danh sách</a>
                            </div> 
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="#" alt="Custom Image">
                                <div class="icon">
                                    <i class="icon_mug"></i><h3>Lý</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisi cing elit. Ipsa sit, numquam amet voluptatibus obcaecati ea maiores totam nostrum, ad iure rerum quas harum  </p>
                                <a href="#contact" class="btn">Xem danh sách</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="#" alt="Custom Image">
                                <div class="icon">
                                    <i class="icon_currency"></i><h3>Hóa</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisi cing elit. Ipsa sit, numquam amet voluptatibus obcaecati ea maiores totam nostrum, ad iure rerum quas harum  </p>
                                <a href="#contact" class="btn">Xem danh sách</a>
                            </div>
                        </div>
                    </div> 
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
                <h4>Margins</h4>
				<h1 class="text-primary">100,000</h1>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">
                
                <i class="icon_gift_alt wow pulse" style="visibility: visible; animation-name: pulse;"></i>
                <h4>Completed</h4>
				<h1 class="text-primary">34201</h1>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">
              
                <i class="icon_mobile wow pulse" style="visibility: visible; animation-name: pulse;"></i>
  <h4>Projects</h4>               
			   <h1 class="text-primary">152</h1>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">
               
                <i class="icon_lightbulb_alt wow pulse" style="visibility: visible; animation-name: pulse;"></i>
 <h4>Customers</h4>               
			   <h1 class="text-primary">56500</h1>
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

                <div class="pricing-wrapper">

                    <!-- Plans -->
                    <div class="col-md-4 col-sm-4 col-xs-12 pricing-plans wow bounceInLeft hoverer">
                        <div class="pricing-titles">
                            <h2>#1</h2>
                            <p>Username</p>
                        </div>
                        <div class="pricing-service-name">
                            <ul>
                                <li>Lượt thi: </li>
                                <li>Điểm trung bình: </li> 
                            </ul>
                        </div>

                         <div class="bg-btn">
                            <a href="#" class="signup-btn">Xem thêm</a>
                        </div>
                    </div>
                    <!-- Plans End -->

                    <!-- Plans -->
                    <div class="col-md-4 col-sm-4 col-xs-12 pricing-plans wow fadeInUp hoverer" data-wow-duration="1s">
                        <div class="pricing-titles">
                            <h2>#2</h2>
                            <p>Username</p>
                        </div>
                        <div class="pricing-service-name">
                            <ul>
                               <li>Lượt thi: </li>
                                <li>Điểm trung bình: </li> 
                            </ul>
                        </div>

                        <div class="bg-btn">
                            <a href="#" class="signup-btn">Xem thêm</a>
                        </div>
                    </div>
                    <!-- Plans End -->

                    <!-- Plans -->
                    <div class="col-md-4 col-sm-4 col-xs-12 pricing-plans wow bounceInRight hoverer">
                        <div class="pricing-titles">
                            <h2>#3</h2>
                            <p>Username</p>
                        </div>
                        <div class="pricing-service-name">
                             <ul>
                                <li>Lượt thi: </li>
                                <li>Điểm trung bình: </li>
                            </ul>
                        </div>
                        <div class="bg-btn">
                            <a href="#" class="signup-btn">Xem thêm</a>
                        </div>
                    </div>
                    <!-- Plans End -->
                </div>
            </div>
        </div> 
    </section>
</div>
    

@endsection