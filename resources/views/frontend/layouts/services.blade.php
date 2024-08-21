<section class="elementor-section elementor-top-section elementor-element elementor-element-c5b963f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c5b963f" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-wider">
       <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d027246" data-id="d027246" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
             <!-- What we offer -->
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-bc54578 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bc54578" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-dc71f2a" data-id="dc71f2a" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <!-- <div class="elementor-element elementor-element-7d0b743 elementor-widget elementor-widget-image" data-id="7d0b743" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container"> <img width="15" height="16" src="https://technomole.com/wp-content/uploads/2020/06/data-icon1.png" class="attachment-large size-large" alt="" loading="lazy" /> </div>
                         </div> -->
                         <div class="elementor-element elementor-element-1259d76 elementor-widget elementor-widget-text-editor" data-id="1259d76" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h6>SERVICES</h6>
                            </div>
                         </div>
                         <div class="elementor-element elementor-element-6d9c720 elementor-widget elementor-widget-text-editor" data-id="6d9c720" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h2><span style="color: #0d0f39;">WHAT WE OFFER</span></h2>
                            </div>
                         </div>
                         <div class="elementor-element elementor-element-8a1a55e elementor-widget elementor-widget-text-editor" data-id="8a1a55e" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h4>{{@$about->offer}}</h4>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
             <!-- 4 offers -->
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-56eba06 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="56eba06" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   @foreach($services as $service)
                   <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-9d4b804" data-id="9d4b804" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-73a01b2 elementor-widget elementor-widget-image" data-id="73a01b2" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container mobile_service_img"> 
                              <img width="139" height="146" src="{{url('public/upload/images/'.$service->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.$service->image)}}" style="margin-left: 20%;"> 
                           </div>
                         </div>
                         <div class="elementor-element elementor-element-ed39291 elementor-widget elementor-widget-text-editor" data-id="ed39291" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h3><span style="color: #0d0f39;">{{$service->title}}</span></h3>
                               <d style="text-align: justify;color: #0d0f39;">
                                    <?php echo substr($service->description,0,220); ?>
                               </d>
                            </div>
                         </div>
                         <div class="elementor-element elementor-element-4463f84 elementor-align-center elementor-widget elementor-widget-button" data-id="4463f84" data-element_type="widget" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                               <div class="elementor-button-wrapper">
                                  <a href="{{route('frontend.our-services.details',$service->id)}}" class="elementor-button-link elementor-button elementor-size-sm" role="button"> <span class="elementor-button-content-wrapper">
                                  <span class="elementor-button-text">LEARN MORE</span> </span>
                                  </a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   @endforeach
                </div>
             </section>
             <!-- 4 offer -->
             <!-- see ALL SERVICEs Botton-->
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-c013a97 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c013a97" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-aa8b931" data-id="aa8b931" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-7e2a842 elementor-align-center elementor-widget elementor-widget-button" data-id="7e2a842" data-element_type="widget" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                               <div class="elementor-button-wrapper">
                                  <a href="{{route('frontend.our-services')}}" class="elementor-button-link elementor-button elementor-size-sm" role="button"> <span class="elementor-button-content-wrapper">
                                  <span class="elementor-button-text">SEE ALL SERVICES</span> </span>
                                  </a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
             <!-- //SEE ALL SERVICES Botton-->
             <!-- //Services section -->
             <!--  -->
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-34c7d04 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="34c7d04" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-ecd1cc1" data-id="ecd1cc1" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <!-- <div class="elementor-element elementor-element-5515d00 elementor-widget elementor-widget-image" data-id="5515d00" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container"> 
                              <img width="15" height="16" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-icon1.png" class="attachment-large size-large" alt="" loading="lazy" /> 
                           </div>
                         </div> -->
                         <div class="elementor-element elementor-element-f19ee44 elementor-widget elementor-widget-text-editor" data-id="f19ee44" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h6>TEAM</h6>
                            </div>
                         </div>
                         <div class="elementor-element elementor-element-667e3ba elementor-widget elementor-widget-text-editor" data-id="667e3ba" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h2><span style="color: #0d0f39;">OUR MANAGEMENT</span></h2>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
             <!--  -->
             <!-- Tame -->
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-af9fae9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="af9fae9" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                  @foreach($specialists as $team)
                   <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-b03a4c1" data-id="b03a4c1" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-f64931e elementor-widget elementor-widget-image" data-id="f64931e" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container"> 
                              <img width="180" height="190" src="{{url('public/upload/images/'.$team->image)}}" class="attachment-large size-large mobile_specialist_img" alt="" loading="lazy" srcset="{{url('public/upload/images/'.$team->image)}}" style="margin-left: 13%; border-radius: 50%; border: 3px solid #ccc;"> 
                           </div>
                         </div>
                         <div class="elementor-element elementor-element-bea3b92 elementor-widget elementor-widget-text-editor" data-id="bea3b92" data-element_type="widget" data-widget_type="text-editor.default">
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
             <!-- tame -->
             <div class="elementor-element elementor-element-a8f0a7d elementor-align-center elementor-widget elementor-widget-button" data-id="a8f0a7d" data-element_type="widget" data-widget_type="button.default">
                <div class="elementor-widget-container">
                   <div class="elementor-button-wrapper">
                      <a href="{{route('frontend.our-specialist')}}" class="elementor-button-link elementor-button elementor-size-sm" role="button"> <span class="elementor-button-content-wrapper">
                      <span class="elementor-button-text">VIEW MORE</span> </span>
                      </a>
                   </div>
                </div>
             </div>
             
             <!-- MEET OUR PARTNERS -->
             <div class="elementor-element elementor-element-8cb8a70 elementor-widget elementor-widget-text-editor" data-id="8cb8a70" data-element_type="widget" data-widget_type="text-editor.default">
                <div class="elementor-widget-container">
                   <h2><span style="color: #0d0f39;">MEET OUR PARTNERS</span></h2>
                </div>
             </div>
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-d92af5b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="d92af5b" data-element_type="section">
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