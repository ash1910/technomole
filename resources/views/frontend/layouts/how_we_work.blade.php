<section class="elementor-section elementor-top-section elementor-element elementor-element-9e70dc7 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9e70dc7" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
       <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-46beb2f" data-id="46beb2f" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
             <div class="elementor-element elementor-element-22efa98 elementor-widget elementor-widget-image" data-id="22efa98" data-element_type="widget" data-widget_type="image.default">
                <div class="elementor-widget-container"> 
                  <img width="780" height="586" src="{{url('public/upload/images/'.@$about->how_work_image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$about->how_work_image)}}"> 
               </div>
             </div>
          </div>
       </div>
       <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-010c651" data-id="010c651" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-18905bc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="18905bc" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-216a74c" data-id="216a74c" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-c741b6b elementor-widget elementor-widget-image" data-id="c741b6b" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container"> <img width="15" height="16" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-icon1.png" class="attachment-large size-large" alt="" loading="lazy" /> </div>
                         </div>
                         <div class="elementor-element elementor-element-e7aa977 elementor-widget elementor-widget-text-editor" data-id="e7aa977" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h2>HOW WE WORK</h2>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-de48bdb elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="de48bdb" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                     @foreach($how_works as $work)
                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4f2adff" data-id="4f2adff" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <!-- <div class="elementor-element elementor-element-6bc6244 elementor-widget elementor-widget-image" data-id="6bc6244" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container"> 
                              <img width="100" height="105" src="{{url('public/upload/images/'.$work->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.$work->image)}}"> 
                           </div>
                         </div> -->
                         <div class="elementor-element elementor-element-8d9c429 elementor-widget elementor-widget-text-editor" data-id="8d9c429" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <d style="text-align: justify;">
                                  <?php echo substr($work->description,0,300); ?>
                               </d>
                            </div>
                         </div>
                      </div>
                    </div>
                    @endforeach
                </div>
             </section>
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-4b97dc1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4b97dc1" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-f8f166d" data-id="f8f166d" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-9834da5 elementor-widget elementor-widget-button" data-id="9834da5" data-element_type="widget" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                               <div class="elementor-button-wrapper">
                                  <a href="{{route('frontend.how-we-work')}}" class="elementor-button-link elementor-button elementor-size-sm" role="button"> <span class="elementor-button-content-wrapper">
                                  <span class="elementor-button-text">READ MORE</span> </span>
                                  </a>
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