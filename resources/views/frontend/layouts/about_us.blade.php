<section class="elementor-section elementor-top-section elementor-element elementor-element-5b2f979 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5b2f979" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
    <div class="elementor-container elementor-column-gap-wider">
       <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3a36e9a" data-id="3a36e9a" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-55b26f8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="55b26f8" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e6b476b" data-id="e6b476b" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-36d65ee elementor-widget elementor-widget-text-editor" data-id="36d65ee" data-element_type="widget" data-widget_type="text-editor.default">
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
                            </div>
                         </div>
                         <div class="elementor-element elementor-element-6ed60e4 elementor-widget elementor-widget-text-editor" data-id="6ed60e4" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <h2><span class="fontstyle0">{{@$about->title}}</span> </h2>
                            </div>
                         </div>
                         <div class="elementor-element elementor-element-f98a92f elementor-widget elementor-widget-text-editor" data-id="f98a92f" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                               <d style="text-align: justify;">
                                  <?php echo substr(@$about->description,0,600); ?>
                               </d>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-3323b0b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3323b0b" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                   <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-b1bb598" data-id="b1bb598" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-9faa3d9 elementor-widget elementor-widget-button" data-id="9faa3d9" data-element_type="widget" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                               <div class="elementor-button-wrapper">
                                  <a href="{{route('frontend.about-us')}}" class="elementor-button-link elementor-button elementor-size-sm" role="button"> <span class="elementor-button-content-wrapper">
                                  <span class="elementor-button-text">READ MORE</span> </span>
                                  </a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
             <!-- /Botton -->
          </div>
       </div>
       <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-032f20c" data-id="032f20c" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
             <div class="elementor-element elementor-element-2483965 elementor-widget elementor-widget-image" data-id="2483965" data-element_type="widget" data-widget_type="image.default">
                <div class="elementor-widget-container"> <img width="780" height="851" src="{{url('public/upload/about_images/'.@$about->about_image)}}" class="attachment-large size-large" alt="" loading="lazy" /> </div>
             </div>
          </div>
       </div>
    </div>
   </section>