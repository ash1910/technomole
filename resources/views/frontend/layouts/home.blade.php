@extends('frontend.layouts.app')
@section('content')
<div id="Content">
    <div class="content_wrapper clearfix">
       <div class="sections_group">
          <div class="entry-content" itemprop="mainContentOfPage">
             <div class="mfn-builder-content"></div>
             <div class="section the_content has_content">
                <div class="section_wrapper">
                   <div class="the_content_wrapper is-elementor">
                      <div data-elementor-type="wp-page" data-elementor-id="2" class="elementor elementor-2" data-elementor-settings="[]">
                         <div class="elementor-section-wrap">
                            <!-- The best preparation  About Us-->           
                            @include('frontend.layouts.about_us')
                            <!-- /The best preparation  About Us-->
                            <!-- HOW WE WORK -->
                            @include('frontend.layouts.how_we_work')
                            <!-- HOW WE WORK -->
                            <!-- fancy-divider -->
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-c2ed788 elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="c2ed788" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                               <div class="elementor-container elementor-column-gap-no">
                                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1ea208e" data-id="1ea208e" data-element_type="column">
                                     <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-ac1731e elementor-widget elementor-widget-mfn_fancy_divider" data-id="ac1731e" data-element_type="widget" data-widget_type="mfn_fancy_divider.default">
                                           <div class="elementor-widget-container">
                                              <div class="fancy-divider">
                                                 <svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: #FFFFFF00;">
                                                    <path d="M0 100 L50 2 L100 100 Z" style="fill: #FFFFFF; stroke: #FFFFFF;" />
                                                 </svg>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </section>
                            <!-- //fancy-divider -->
                            <!-- HOW WE WORK -->
                            <!-- WHAT WE OFFER Services-->
                            @include('frontend.layouts.services')
                            <!-- WHAT WE OFFER Services-->
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-e65b4c4 elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="e65b4c4" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                               <div class="elementor-container elementor-column-gap-no">
                                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a801892" data-id="a801892" data-element_type="column">
                                     <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-60fe365 elementor-widget elementor-widget-mfn_fancy_divider" data-id="60fe365" data-element_type="widget" data-widget_type="mfn_fancy_divider.default">
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
                            <!-- //fancy-divider -->
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