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
                          <div data-elementor-type="wp-page" data-elementor-id="15" class="elementor elementor-15" data-elementor-settings="[]">
                             <div class="elementor-section-wrap">
                                <!-- adderes section -->
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-c803f68 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c803f68" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                   <div class="elementor-container elementor-column-gap-wider">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-272b112" data-id="272b112" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-8c09cec elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8c09cec" data-element_type="section">
                                               <div class="elementor-container elementor-column-gap-default">
                                                  <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-c64e8dd" data-id="c64e8dd" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-4d9d3e5 elementor-widget elementor-widget-image" data-id="4d9d3e5" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container">
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
                                                              <img width="140" height="147" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon1.png" class="attachment-large size-large" alt="" loading="lazy" srcset="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon1.png" sizes="(max-width: 140px) 100vw, 140px" /> 
                                                           </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-6a149ab elementor-widget elementor-widget-text-editor" data-id="6a149ab" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
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
                                                              <h5>PHONE</h5>
                                                              <p><strong>Cell:</strong> {{@$contact->mobile}} 
                                                               <br>
                                                               <strong>Tel:</strong> {{@$contact->telephone}}
                                                              </p>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-d423c6e" data-id="d423c6e" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-7e88723 elementor-widget elementor-widget-image" data-id="7e88723" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container"> <img width="140" height="147" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon2.png" class="attachment-large size-large" alt="" loading="lazy" srcset="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon2.png" sizes="(max-width: 140px) 100vw, 140px" /> </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-3809e12 elementor-widget elementor-widget-text-editor" data-id="3809e12" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h5>E-MAIL</h5>
                                                              <p>{{@$contact->email}}</a>
                                                              </p>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-003a398" data-id="003a398" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-9efa4e6 elementor-widget elementor-widget-image" data-id="9efa4e6" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container"> <img width="140" height="147" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon3.png" class="attachment-large size-large" alt="" loading="lazy" srcset="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon3.png" sizes="(max-width: 140px) 100vw, 140px" /> </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-14f87b1 elementor-widget elementor-widget-text-editor" data-id="14f87b1" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h5>ADDRESS</h5>
                                                              <p><strong>Registered:</strong> {{@$contact->registered_address}}
                                                                 <br /><strong>Corporate:</strong> {{@$contact->corporate_address}}
                                                              </p>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-b570026" data-id="b570026" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-c1aeeb9 elementor-widget elementor-widget-image" data-id="c1aeeb9" data-element_type="widget" data-widget_type="image.default">
                                                           <div class="elementor-widget-container"> <img width="140" height="147" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon4.png" class="attachment-large size-large" alt="" loading="lazy" srcset="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-contact-icon4.png" sizes="(max-width: 140px) 100vw, 140px" /> </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-962c69c elementor-widget elementor-widget-text-editor" data-id="962c69c" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h5>CHAT</h5>
                                                              <p>
                                                               <a target="_blank" href="{{@$contact->facebook}}">www.facebook.com/TechnoMoleCreations</a>
                                                              </p>
                                                           </div>
                                                        </div>
                                                     </div>
                                                  </div>
                                               </div>
                                            </section>
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-73847e3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="73847e3" data-element_type="section">
                                               <div class="elementor-container elementor-column-gap-default">
                                                  <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-b3b9ba7" data-id="b3b9ba7" data-element_type="column">
                                                     <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-421138e elementor-widget elementor-widget-text-editor" data-id="421138e" data-element_type="widget" data-widget_type="text-editor.default">
                                                           <div class="elementor-widget-container">
                                                              <h2>LEAVE A MESSAGE</h2>
                                                              <input name="phone" type="text" id="phone" style="display:none">
                                                              @if(Session::get('success'))
                                                              <div class="row">
                                                                 <div class="col-md-6 col-xs-12 offset-md-3">
                                                                      <div class="alert alert-success alert-dismissible">
                                                                         <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                                         <h3><strong style="background: #F381E7;padding: 0px 9px;color: #fff;">{{Session::get('success')}}</strong></h3>
                                                                      </div>
                                                                 </div>
                                                              </div>
                                                              @endif
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-485bdec elementor-widget elementor-widget-shortcode" data-id="485bdec" data-element_type="widget" data-widget_type="shortcode.default">
                                                           <div class="elementor-widget-container">
                                                              <div class="elementor-shortcode">
                                                                 <div style="text-align:center;">
                                                                       <form method="post" action="{{route('frontend.contact-store')}}" method="post" class="wpcf7-form init">
                                                                          @csrf
                                                                          <div class="column one-second"><span class="wpcf7-form-control-wrap your-name"><input type="text" name="name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="YOUR NAME" /></span> 
                                                                           <font style="color:red;text-align: left !important;">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                                                          </div>
                                                                          <div class="column one-second"><span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" placeholder="YOUR E-MAIL" /></span> 
                                                                           <font style="color:red;text-align: left !important;">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                                                                          </div>
                                                                          <div class="column one"><span class="wpcf7-form-control-wrap your-subject"><input type="text" name="subject" size="40" class="wpcf7-form-control wpcf7-text" placeholder="SUBJECT" /></span> 
                                                                           <font style="color:red;text-align: left !important;">{{($errors->has('subject'))?($errors->first('subject')):''}}</font>
                                                                          </div>
                                                                          <div class="column one"><span class="wpcf7-form-control-wrap your-message"><textarea name="msg" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea" placeholder="MESSAGE"></textarea></span>
                                                                           <font style="color:red;text-align: left !important;">{{($errors->has('msg'))?($errors->first('msg')):''}}</font>
                                                                          </div>
                                                                          <div class="column one">
                                                                             <input type="submit" value="SEND A MESSAGE" class="wpcf7-form-control has-spinner wpcf7-submit">
                                                                          </div>
                                                                       </form>
                                                                 </div>
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
                                </section>
                                <!-- //address section -->
                                <!-- MEET OUR PARTNERS -->
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-8db88e8 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8db88e8" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                   <div class="elementor-container elementor-column-gap-wider">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5552c2b" data-id="5552c2b" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-6800df2 elementor-widget elementor-widget-text-editor" data-id="6800df2" data-element_type="widget" data-widget_type="text-editor.default">
                                               <div class="elementor-widget-container">
                                                  <h2><span style="color: #0d0f39;">MEET OUR PARTNERS</span></h2>
                                               </div>
                                            </div>
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-ab4524c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ab4524c" data-element_type="section">
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
                                         </div>
                                      </div>
                                   </div>
                                </section>
                                <!-- //MEET OUR PARTNERS -->
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-3a912ea elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="3a912ea" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                   <div class="elementor-container elementor-column-gap-default">
                                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0b2aa38" data-id="0b2aa38" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-a92e593 elementor-widget elementor-widget-mfn_fancy_divider" data-id="a92e593" data-element_type="widget" data-widget_type="mfn_fancy_divider.default">
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