@extends('frontend.layouts.app')
@section('content')
<meta http-equiv="x-ua-compatible" content="ie=edge">


    <!-- CSS 
    ============================================ -->
    <link rel="stylesheet" href="/technomole/public/assets_works/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/technomole/public/assets_works/css/vendor/slick.css">
    <link rel="stylesheet" href="/technomole/public/assets_works/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/technomole/public/assets_works/css/vendor/aos.css">
    <link rel="stylesheet" href="/technomole/public/assets_works/css/plugins/feature.css">
    <!-- Style css -->
    <link rel="stylesheet" href="/technomole/public/assets_works/css/style.css">

<style>
  /*! elementor - v3.5.3 - 28-12-2021 */
  .elementor-widget-image {
  text-align: center
  }
  .elementor-widget-image a {
  display: inline-block
  }
  .elementor-widget-image a img[src$=".svg"] {
  width: 48px
  }
  .elementor-widget-image img {
  vertical-align: middle;
  display: inline-block
  }
</style>
<style>
  /*! elementor - v3.5.3 - 28-12-2021 */
  .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
  background-color: #818a91;
  color: #fff
  }
  .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
  color: #818a91;
  border: 3px solid;
  background-color: transparent
  }
  .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
  margin-top: 8px
  }
  .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
  width: 1em;
  height: 1em
  }
  .elementor-widget-text-editor .elementor-drop-cap {
  float: left;
  text-align: center;
  line-height: 1;
  font-size: 50px
  }
  .elementor-widget-text-editor .elementor-drop-cap-letter {
  display: inline-block
  }
</style>


                                
<section>
      <!-- 4 LOREM IPSUM -->
       <!-- Portfolio-->
       <div class="template-color-1 spybody white-version" data-spy="scroll" data-bs-target=".navbar-example2" data-offset="150">
          <!-- Start Portfolio Area -->
          <div id="portfolio" class="rn-portfolio-area portfolio-style-three rn-section-gap section-separator">
            <div class="container">

                <div class="row mt--25 mt_md--5 mt_sm--5">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" data-aos-once="true" class="portfolio-wrapper portfolio-slick-activation slick-arrow-style-one rn-slick-dot-style">

                            <!-- Start Single Portfolio  -->
                            @if($works->count()>=1)
                            <div class="rn-portfolio-slick">
                                <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{url('public/upload/images/'.@$works['0']->image)}}" alt="Personal Portfolio Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="category-info">
                                                <div class="category-list">
                                                    <a href="javascript:void(0)">PHOTOSHOP</a>
                                                </div>
                                                <div class="meta">
                                                    <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                                        650</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="javascript:void(0)">{{@$works['0']->title}}<i class="feather-arrow-up-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- End Single Portfolio  -->

                            <!-- Start Single Portfolio  -->
                            @if($works->count()>=2)
                            <div class="rn-portfolio-slick">
                                <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{url('public/upload/images/'.@$works['1']->image)}}" alt="Personal Portfolio Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="category-info">
                                                <div class="category-list">
                                                    <a href="javascript:void(0)">Figma</a>
                                                </div>
                                                <div class="meta">
                                                    <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                                        650</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="javascript:void(0)">{{@$works['1']->title}}<i class="feather-arrow-up-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- End Single Portfolio  -->

                            <!-- Start Single Portfolio  -->
                            @if($works->count()>=3)
                            <div class="rn-portfolio-slick">
                                <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{url('public/upload/images/'.@$works['2']->image)}}" alt="Personal Portfolio Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="category-info">
                                                <div class="category-list">
                                                    <a href="javascript:void(0)">Laravel</a>
                                                </div>
                                                <div class="meta">
                                                    <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                                        650</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="javascript:void(0)">{{@$works['2']->title}}<i class="feather-arrow-up-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- End Single Portfolio  -->

                            <!-- Start Single Portfolio  -->
                            @if($works->count()>=4)
                            <div class="rn-portfolio-slick">
                                <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{url('public/upload/images/'.@$works['3']->image)}}" alt="Personal Portfolio Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="category-info">
                                                <div class="category-list">
                                                    <a href="javascript:void(0)">Figma</a>
                                                </div>
                                                <div class="meta">
                                                    <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                                        650</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="javascript:void(0)">{{@$works['3']->title}}<i class="feather-arrow-up-right"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- End Single Portfolio  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End portfolio Area -->

      
         <!-- Modal Portfolio Body area Start -->
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">

                            <div class="col-lg-6">
                                <div class="portfolio-popup-thumbnail">
                                    <div class="image">
                                        <img class="w-100" src="{{url('public/upload/images/'.@$works['0']->image)}}" alt="slide">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="text-content">
                                    <h3>
                                        <span>Featured - Design</span> {{@$works['0']->title}}
                                    </h3>
                                    <p class="mb--30">{!! @$works['0']->description !!}
                                    <div class="button-group mt--20">
                                        <a href="https://amarhaor.com" class="rn-btn">
                                            <span>VIEW PROJECT</span>
                                            <i data-feather="chevron-right"></i>
                                        </a>
                                    </div>

                                </div>
                                <!-- End of .text-content -->
                            </div>
                        </div>
                        <!-- End of .row Body-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Portfolio area -->
       
    </main>
    <!-- JS ============================================ -->
    <script src="/technomole/public/assets_works/js/vendor/jquery.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/modernizer.min.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/feather.min.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/slick.min.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/bootstrap.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/text-type.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/wow.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/aos.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/particles.js"></script>
    <script src="/technomole/public/assets_works/js/vendor/jquery-one-page-nav.js"></script>
    <!-- main JS -->
    <script src="/technomole/public/assets_works/js/main.js"></script>
</div>
<!--/Portfolio-->

        </section>

        	<!-- mfn_hook_content_before -->
    <div id="Content">
        <div class="content_wrapper clearfix">
           <div class="sections_group">
              <div class="entry-content" itemprop="mainContentOfPage">
                 <div class="mfn-builder-content"></div>
                 <div class="section the_content has_content">
                    <div class="section_wrapper">
                       <div class="the_content_wrapper is-elementor">
                          <div data-elementor-type="wp-page" data-elementor-id="67" class="elementor elementor-67" data-elementor-settings="[]">
                             <div class="elementor-section-wrap">

      
                                <!--//4 LOREM IPSUM -->
                                <!-- OUR SPECIALISTS -->
                                <!-- //OUR SPECIALISTS -->
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-2da3bff elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="2da3bff" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                   <div class="elementor-container elementor-column-gap-default">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6e74713" data-id="6e74713" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-5eaaaa3 elementor-widget elementor-widget-mfn_fancy_divider" data-id="5eaaaa3" data-element_type="widget" data-widget_type="mfn_fancy_divider.default">
                                               <div class="elementor-widget-container">
                                                  <div class="fancy-divider">
                                                     <svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: #FFFFFF;">
                                                        <path d="M0 100 L50 2 L100 100 Z" style="fill: #0D0F39; stroke: #0D0F39;" />
                                                     </svg>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </section>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="section section-page-footer">
                    <div class="section_wrapper clearfix">
                       <div class="column one page-pager"> </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
@endsection