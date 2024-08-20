@extends('frontend.layouts.app')
@section('content')
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
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-9c2aad8 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9c2aad8" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                   <div class="elementor-container elementor-column-gap-wider">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0cb100a" data-id="0cb100a" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-84dcc42 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="84dcc42" data-element_type="section">
                                               <div class="elementor-container elementor-column-gap-wider">
                                                  <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6979e87" data-id="6979e87" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-7d3d329 elementor-widget elementor-widget-image" data-id="7d3d329" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container">
                                                              <img width="780" height="822" src="{{url('public/upload/images/'.@$service->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$service->image)}}"> 
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d373c8b" data-id="d373c8b" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-3aad3ae elementor-widget elementor-widget-image" data-id="3aad3ae" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container"> 
                                                            <img width="15" height="16" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-icon1.png" class="attachment-large size-large" alt="" loading="lazy" /> 
                                                         </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-cb92f3b elementor-widget elementor-widget-text-editor" data-id="cb92f3b" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h2>{{@$service->title}}</h2>
                                                           </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-80f01eb elementor-widget elementor-widget-text-editor" data-id="80f01eb" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <d style="text-align: justify;">
                                                                 <?php echo @$service->description; ?>
                                                              </d>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                               </div>
                                            </section>
                                         </div>
                                      </div>
                                   </div>
                                </section>
                                <!--//4 LOREM IPSUM -->
                                <!-- OUR SPECIALISTS -->
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-74e025a elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="74e025a" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                   <div class="elementor-container elementor-column-gap-wider">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ca96a15" data-id="ca96a15" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-e2c64e7 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="e2c64e7" data-element_type="section">
                                               <div class="elementor-container elementor-column-gap-default">
                                                  <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-74d98b5" data-id="74d98b5" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-700849c elementor-widget elementor-widget-image" data-id="700849c" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container"> <img width="15" height="16" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-icon1.png" class="attachment-large size-large" alt="" loading="lazy" /> </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-1f0b6e3 elementor-widget elementor-widget-text-editor" data-id="1f0b6e3" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h6>TEAM</h6>
                                                           </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-9d83cbe elementor-widget elementor-widget-text-editor" data-id="9d83cbe" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h2><span style="color: #0d0f39;">OUR MANAGEMENT</span></h2>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                               </div>
                                            </section>
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-981305a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="981305a" data-element_type="section">
                                               <div class="elementor-container elementor-column-gap-default">
                                                   @foreach($specialists as $team)
                                                  <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-f13c62a" data-id="f13c62a" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-fcc6ad2 elementor-widget elementor-widget-image" data-id="fcc6ad2" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container"> 
                                                               <img width="200" height="210" src="{{url('public/upload/images/'.$team->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.$team->image)}}"> 
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-6c0f0cc elementor-widget elementor-widget-text-editor" data-id="6c0f0cc" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h3><span style="color: #0d0f39;">{{$team->name}}</span></h3>
                                                              <p><span style="color: #aca6d7;">{{$team->designation}}</span></p>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  @endforeach
                                               </div>
                                            </section>
                                         </div>
                                      </div>
                                   </div>
                                </section>
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