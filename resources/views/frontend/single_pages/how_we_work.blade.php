@extends('frontend.layouts.app')
@section('content')
	<!-- mfn_hook_content_before -->
     <div id="Content">
        <div class="content_wrapper clearfix">
           <div class="sections_group">
              <div class="entry-content" itemprop="mainContentOfPage">
                 <div class="mfn-builder-content"></div>
                 <div class="section the_content has_content">
                    <div class="section_wrapper">
                       <div class="the_content_wrapper is-elementor">
                          <div data-elementor-type="wp-page" data-elementor-id="9" class="elementor elementor-9" data-elementor-settings="[]">
                             <div class="elementor-section-wrap">
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-696e86e elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="696e86e" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-wider">
                                       <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-46c83e8" data-id="46c83e8" data-element_type="column">
                                          <div class="elementor-widget-wrap elementor-element-populated">
                                             <section class="elementor-section elementor-inner-section elementor-element elementor-element-bf31ab2 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bf31ab2" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-wider">
                                                   @if($how_works->count()>=1)
                                                   <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0d313fe" data-id="0d313fe" data-element_type="column">
                                                      <div class="elementor-widget-wrap elementor-element-populated">
                                                         <!-- <div class="elementor-element elementor-element-7381595 elementor-widget elementor-widget-image" data-id="7381595" data-element_type="widget" data-widget_type="image.default">
                                                            <div class="elementor-widget-container">
                                                               <img width="100" height="105" src="{{url('public/upload/images/'.@$how_works['0']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$how_works['0']->image)}}"> 
                                                            </div>
                                                         </div> -->
                                                         <div class="elementor-element elementor-element-d0f981a elementor-widget elementor-widget-text-editor" data-id="d0f981a" data-element_type="widget" data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                               <d style="text-align: justify;">
                                                                  <?php echo @$how_works['0']->description; ?>
                                                               </d>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   @endif
                                                   @if($how_works->count()>=2)
                                                   <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f07ed74" data-id="f07ed74" data-element_type="column">
                                                      <div class="elementor-widget-wrap elementor-element-populated">
                                                         <!-- <div class="elementor-element elementor-element-4abd788 elementor-widget elementor-widget-image" data-id="4abd788" data-element_type="widget" data-widget_type="image.default">
                                                            <div class="elementor-widget-container"> 
                                                               <img width="100" height="105" src="{{url('public/upload/images/'.@$how_works['1']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$how_works['1']->image)}}"> 
                                                            </div>
                                                         </div> -->
                                                         <div class="elementor-element elementor-element-7ee0498 elementor-widget elementor-widget-text-editor" data-id="7ee0498" data-element_type="widget" data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                               <d style="text-align: justify;">
                                                                  <?php echo @$how_works['1']->description; ?>
                                                               </d>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   @endif
                                                </div>
                                             </section>
                                             @if($how_works->count()>=3)
                                             <section class="elementor-section elementor-inner-section elementor-element elementor-element-8848f98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8848f98" data-element_type="section">
                                                @if($how_works->count()>=3)
                                                <div class="elementor-container elementor-column-gap-wider">
                                                   <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-74830c3" data-id="74830c3" data-element_type="column">
                                                      <div class="elementor-widget-wrap elementor-element-populated">
                                                         <!-- <div class="elementor-element elementor-element-21bfa5b elementor-widget elementor-widget-image" data-id="21bfa5b" data-element_type="widget" data-widget_type="image.default">
                                                            <div class="elementor-widget-container">
                                                               <img width="100" height="105" src="{{url('public/upload/images/'.@$how_works['2']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$how_works['2']->image)}}"> 
                                                            </div>
                                                         </div> -->
                                                         <div class="elementor-element elementor-element-3f6f0ad elementor-widget elementor-widget-text-editor" data-id="3f6f0ad" data-element_type="widget" data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                               <d style="text-align: justify;">
                                                                  <?php echo @$how_works['2']->description; ?>
                                                               </d>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   @if($how_works->count()>=4)
                                                   <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3517fab" data-id="3517fab" data-element_type="column">
                                                      <div class="elementor-widget-wrap elementor-element-populated">
                                                         <!-- <div class="elementor-element elementor-element-b0e66fa elementor-widget elementor-widget-image" data-id="b0e66fa" data-element_type="widget" data-widget_type="image.default">
                                                            <div class="elementor-widget-container"> 
                                                               <img width="100" height="105" src="{{url('public/upload/images/'.@$how_works['3']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$how_works['3']->image)}}"> 
                                                            </div>
                                                         </div> -->
                                                         <div class="elementor-element elementor-element-ca06c89 elementor-widget elementor-widget-text-editor" data-id="ca06c89" data-element_type="widget" data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                               <d style="text-align: justify;">
                                                                  <?php echo @$how_works['3']->description; ?>
                                                               </d>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   @endif
                                                </div>
                                                @endif
                                             </section>
                                             @endif
                                             @if($how_works->count()>=5)
                                             <section class="elementor-section elementor-inner-section elementor-element elementor-element-8848f98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8848f98" data-element_type="section">
                                                @if($how_works->count()>=5)
                                                <div class="elementor-container elementor-column-gap-wider">
                                                   <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-74830c3" data-id="74830c3" data-element_type="column">
                                                      <div class="elementor-widget-wrap elementor-element-populated">
                                                         <!-- <div class="elementor-element elementor-element-21bfa5b elementor-widget elementor-widget-image" data-id="21bfa5b" data-element_type="widget" data-widget_type="image.default">
                                                            <div class="elementor-widget-container">
                                                               <img width="100" height="105" src="{{url('public/upload/images/'.@$how_works['4']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$how_works['4']->image)}}"> 
                                                            </div>
                                                         </div> -->
                                                         <div class="elementor-element elementor-element-3f6f0ad elementor-widget elementor-widget-text-editor" data-id="3f6f0ad" data-element_type="widget" data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                               <d style="text-align: justify;">
                                                                  <?php echo @$how_works['4']->description; ?>
                                                               </d>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   @if($how_works->count()>=6)
                                                   <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3517fab" data-id="3517fab" data-element_type="column">
                                                      <div class="elementor-widget-wrap elementor-element-populated">
                                                         <!-- <div class="elementor-element elementor-element-b0e66fa elementor-widget elementor-widget-image" data-id="b0e66fa" data-element_type="widget" data-widget_type="image.default">
                                                            <div class="elementor-widget-container"> 
                                                               <img width="100" height="105" src="{{url('public/upload/images/'.@$how_works['5']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$how_works['5']->image)}}"> 
                                                            </div>
                                                         </div> -->
                                                         <div class="elementor-element elementor-element-ca06c89 elementor-widget elementor-widget-text-editor" data-id="ca06c89" data-element_type="widget" data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                               <d style="text-align: justify;">
                                                                  <?php echo @$how_works['5']->description; ?>
                                                               </d>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   @endif
                                                </div>
                                                @endif
                                             </section>
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                 </section>
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-229b6f4 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="229b6f4" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                   <div class="elementor-container elementor-column-gap-wider">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6b8065d" data-id="6b8065d" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <!-- //video -->
                                            <!-- MEET OUR PARTNERS -->
                                            <div class="elementor-element elementor-element-7d07de4 elementor-widget elementor-widget-text-editor" data-id="7d07de4" data-element_type="widget" data-widget_type="text-editor.default">
                                               <div class="elementor-widget-container">
                                                  <h2><span style="color: #0d0f39;">MEET OUR PARTNERS</span></h2>
                                               </div>
                                            </div>
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-9ccfc04 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9ccfc04" data-element_type="section">
                                               <div class="elementor-container elementor-column-gap-default">
                                                  @foreach($partners as $partner)
                                                    <div class="elementor-column elementor-col-20 elementor-inner-column elementor-element elementor-element-9472699" data-id="9472699" data-element_type="column">
                                                       <div class="elementor-widget-wrap elementor-element-populated">
                                                          <div class="elementor-element elementor-element-ea2fee7 elementor-widget elementor-widget-image" data-id="ea2fee7" data-element_type="widget" data-widget_type="image.default">
                                                             <div class="elementor-widget-container">
                                                               <a target="_blank" href="{{$partner->site_link}}">
                                                                  <img width="170" height="50" src="{{url('public/upload/images/'.$partner->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.$partner->image)}}"> 
                                                               </a>
                                                            </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                   @endforeach
                                               </div>
                                            </section>
                                            <!-- //MEET OUR PARTNERS -->
                                         </div>
                                      </div>
                                   </div>
                                </section>
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-5049f59 elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="5049f59" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                   <div class="elementor-container elementor-column-gap-default">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7a2ad90" data-id="7a2ad90" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-0d8edb1 elementor-widget elementor-widget-mfn_fancy_divider" data-id="0d8edb1" data-element_type="widget" data-widget_type="mfn_fancy_divider.default">
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