@extends('frontend.layouts.app')
@section('content')
<link href="/technomole/public/css/styles.css" rel="stylesheet" />

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
<style>
      
    </style>
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
      <!-- 4 LOREM IPSUM -->
       <!-- Portfolio-->
           <!-- Portfolio-->
           <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <!--<h3 class="text-secondary mb-0">Portfolio</h3>
                    <h2 class="mb-5">Recent Projects</h2>-->
                </div>
                <div class="row gx-0">
                @if($works->count()>=1)
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">{{@$works['0']->title}}</div>
                                    <p class="mb-0"><?php echo substr(@$works['0']->description,0,240); ?></p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{url('public/upload/images/'.@$works['0']->image)}}" alt="..." />
                        </a>
                    </div>
                    @endif
                    @if($works->count()>=2)
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">{{@$works['1']->title}}</div>
                                    <p class="mb-0"><?php echo substr(@$works['1']->description,0,240); ?></p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{url('public/upload/images/'.@$works['1']->image)}}" alt="..." />
                        </a>
                    </div>
                    @endif
                    @if($works->count()>=3)
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">{{@$works['2']->title}}</div>
                                    <p class="mb-0"><?php echo substr(@$works['2']->description,0,240); ?></p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{url('public/upload/images/'.@$works['2']->image)}}" alt="..." />
                        </a>
                    </div>
                    @endif
                    @if($works->count()>=4)
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">{{@$works['3']->title}}</div>
                                    <p class="mb-0"><?php echo substr(@$works['3']->description,0,240); ?></p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{url('public/upload/images/'.@$works['3']->image)}}" alt="..." />
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </section>
      
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