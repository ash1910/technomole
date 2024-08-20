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
<style type="text/css">
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
   /*! elementor - v3.5.3 - 28-12-2021 */
   .elementor-widget-social-icons.elementor-grid-0 .elementor-widget-container,
   .elementor-widget-social-icons.elementor-grid-mobile-0 .elementor-widget-container,
   .elementor-widget-social-icons.elementor-grid-tablet-0 .elementor-widget-container {
   line-height: 1;
   font-size: 0
   }
   .elementor-widget-social-icons:not(.elementor-grid-0):not(.elementor-grid-tablet-0):not(.elementor-grid-mobile-0) .elementor-grid {
   display: inline-grid
   }
   .elementor-widget-social-icons .elementor-grid {
   grid-column-gap: var(--grid-column-gap, 5px);
   grid-row-gap: var(--grid-row-gap, 5px);
   grid-template-columns: var(--grid-template-columns);
   -webkit-box-pack: var(--justify-content, center);
   -ms-flex-pack: var(--justify-content, center);
   justify-content: var(--justify-content, center);
   justify-items: var(--justify-content, center)
   }
   .elementor-icon.elementor-social-icon {
   font-size: var(--icon-size, 25px);
   line-height: var(--icon-size, 25px);
   width: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)));
   height: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)))
   }
   .elementor-social-icon {
   --e-social-icon-icon-color: #fff;
   display: -webkit-inline-box;
   display: -ms-inline-flexbox;
   display: inline-flex;
   background-color: #818a91;
   -webkit-box-align: center;
   -ms-flex-align: center;
   align-items: center;
   -webkit-box-pack: center;
   -ms-flex-pack: center;
   justify-content: center;
   text-align: center;
   cursor: pointer
   }
   .elementor-social-icon i {
   color: var(--e-social-icon-icon-color)
   }
   .elementor-social-icon svg {
   fill: var(--e-social-icon-icon-color)
   }
   .elementor-social-icon:last-child {
   margin: 0
   }
   .elementor-social-icon:hover {
   opacity: .9;
   color: #fff
   }
   .elementor-social-icon-android {
   background-color: #a4c639
   }
   .elementor-social-icon-apple {
   background-color: #999
   }
   .elementor-social-icon-behance {
   background-color: #1769ff
   }
   .elementor-social-icon-bitbucket {
   background-color: #205081
   }
   .elementor-social-icon-codepen {
   background-color: #000
   }
   .elementor-social-icon-delicious {
   background-color: #39f
   }
   .elementor-social-icon-deviantart {
   background-color: #05cc47
   }
   .elementor-social-icon-digg {
   background-color: #005be2
   }
   .elementor-social-icon-dribbble {
   background-color: #ea4c89
   }
   .elementor-social-icon-elementor {
   background-color: #d30c5c
   }
   .elementor-social-icon-envelope {
   background-color: #ea4335
   }
   .elementor-social-icon-facebook,
   .elementor-social-icon-facebook-f {
   background-color: #3b5998
   }
   .elementor-social-icon-flickr {
   background-color: #0063dc
   }
   .elementor-social-icon-foursquare {
   background-color: #2d5be3
   }
   .elementor-social-icon-free-code-camp,
   .elementor-social-icon-freecodecamp {
   background-color: #006400
   }
   .elementor-social-icon-github {
   background-color: #333
   }
   .elementor-social-icon-gitlab {
   background-color: #e24329
   }
   .elementor-social-icon-globe {
   background-color: #818a91
   }
   .elementor-social-icon-google-plus,
   .elementor-social-icon-google-plus-g {
   background-color: #dd4b39
   }
   .elementor-social-icon-houzz {
   background-color: #7ac142
   }
   .elementor-social-icon-instagram {
   background-color: #262626
   }
   .elementor-social-icon-jsfiddle {
   background-color: #487aa2
   }
   .elementor-social-icon-link {
   background-color: #818a91
   }
   .elementor-social-icon-linkedin,
   .elementor-social-icon-linkedin-in {
   background-color: #0077b5
   }
   .elementor-social-icon-medium {
   background-color: #00ab6b
   }
   .elementor-social-icon-meetup {
   background-color: #ec1c40
   }
   .elementor-social-icon-mixcloud {
   background-color: #273a4b
   }
   .elementor-social-icon-odnoklassniki {
   background-color: #f4731c
   }
   .elementor-social-icon-pinterest {
   background-color: #bd081c
   }
   .elementor-social-icon-product-hunt {
   background-color: #da552f
   }
   .elementor-social-icon-reddit {
   background-color: #ff4500
   }
   .elementor-social-icon-rss {
   background-color: #f26522
   }
   .elementor-social-icon-shopping-cart {
   background-color: #4caf50
   }
   .elementor-social-icon-skype {
   background-color: #00aff0
   }
   .elementor-social-icon-slideshare {
   background-color: #0077b5
   }
   .elementor-social-icon-snapchat {
   background-color: #fffc00
   }
   .elementor-social-icon-soundcloud {
   background-color: #f80
   }
   .elementor-social-icon-spotify {
   background-color: #2ebd59
   }
   .elementor-social-icon-stack-overflow {
   background-color: #fe7a15
   }
   .elementor-social-icon-steam {
   background-color: #00adee
   }
   .elementor-social-icon-stumbleupon {
   background-color: #eb4924
   }
   .elementor-social-icon-telegram {
   background-color: #2ca5e0
   }
   .elementor-social-icon-thumb-tack {
   background-color: #1aa1d8
   }
   .elementor-social-icon-tripadvisor {
   background-color: #589442
   }
   .elementor-social-icon-tumblr {
   background-color: #35465c
   }
   .elementor-social-icon-twitch {
   background-color: #6441a5
   }
   .elementor-social-icon-twitter {
   background-color: #1da1f2
   }
   .elementor-social-icon-viber {
   background-color: #665cac
   }
   .elementor-social-icon-vimeo {
   background-color: #1ab7ea
   }
   .elementor-social-icon-vk {
   background-color: #45668e
   }
   .elementor-social-icon-weibo {
   background-color: #dd2430
   }
   .elementor-social-icon-weixin {
   background-color: #31a918
   }
   .elementor-social-icon-whatsapp {
   background-color: #25d366
   }
   .elementor-social-icon-wordpress {
   background-color: #21759b
   }
   .elementor-social-icon-xing {
   background-color: #026466
   }
   .elementor-social-icon-yelp {
   background-color: #af0606
   }
   .elementor-social-icon-youtube {
   background-color: #cd201f
   }
   .elementor-social-icon-500px {
   background-color: #0099e5
   }
   .elementor-shape-rounded .elementor-icon.elementor-social-icon {
   -webkit-border-radius: 10%;
   border-radius: 10%
   }
   .elementor-shape-circle .elementor-icon.elementor-social-icon {
   -webkit-border-radius: 50%;
   border-radius: 50%
   }
</style>
<!-- header section -->
<div id="Content">
   <div class="content_wrapper clearfix">
      <div class="sections_group">
         <div class="entry-content" itemprop="mainContentOfPage">
            <div class="mfn-builder-content"></div>
            <div class="section the_content has_content">
               <div class="section_wrapper">
                  <div class="the_content_wrapper is-elementor">
                     <div data-elementor-type="wp-page" data-elementor-id="13" class="elementor elementor-13" data-elementor-settings="[]">
                        <div class="elementor-section-wrap">
                           <!-- OUR SPECIALISTS -->
                           <section class="elementor-section elementor-top-section elementor-element elementor-element-696e86e elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="696e86e" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                              <div class="elementor-container elementor-column-gap-wider">
                                 <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-46c83e8" data-id="46c83e8" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-bf31ab2 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bf31ab2" data-element_type="section">
                                          <div class="elementor-container elementor-column-gap-wider">
                                             @if($specialists->count()>=1)
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0d313fe" data-id="0d313fe" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-7381595 elementor-widget elementor-widget-image" data-id="7381595" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container">
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['0']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['0']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-d0f981a elementor-widget elementor-widget-text-editor" data-id="d0f981a" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['0']->name}}</h2>
                                                         <h5>{{@$specialists['0']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['0']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-d552500 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="d552500" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['0']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['0']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['0']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @endif
                                             @if($specialists->count()>=2)
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f07ed74" data-id="f07ed74" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-4abd788 elementor-widget elementor-widget-image" data-id="4abd788" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container"> 
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['1']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['1']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-7ee0498 elementor-widget elementor-widget-text-editor" data-id="7ee0498" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['1']->name}}</h2>
                                                         <h5>{{@$specialists['1']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['1']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-dd81c9d elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="dd81c9d" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['1']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['1']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['1']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @endif
                                          </div>
                                       </section>
                                       @if($specialists->count()>=3)
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-8848f98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8848f98" data-element_type="section">
                                          @if($specialists->count()>=3)
                                          <div class="elementor-container elementor-column-gap-wider">
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-74830c3" data-id="74830c3" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-21bfa5b elementor-widget elementor-widget-image" data-id="21bfa5b" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container">
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['2']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['2']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-3f6f0ad elementor-widget elementor-widget-text-editor" data-id="3f6f0ad" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['2']->name}}</h2>
                                                         <h5>{{@$specialists['2']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['2']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-5583249 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="5583249" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['2']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['2']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['2']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @if($specialists->count()>=4)
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3517fab" data-id="3517fab" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-b0e66fa elementor-widget elementor-widget-image" data-id="b0e66fa" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container"> 
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['3']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['3']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-ca06c89 elementor-widget elementor-widget-text-editor" data-id="ca06c89" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['3']->name}}</h2>
                                                         <h5>{{@$specialists['3']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['3']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-385f428 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="385f428" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['3']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['3']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['3']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> 
                                                            </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @endif
                                          </div>
                                          @endif
                                       </section>
                                       @endif
                                       @if($specialists->count()>=5)
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-8848f98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8848f98" data-element_type="section">
                                          @if($specialists->count()>=5)
                                          <div class="elementor-container elementor-column-gap-wider">
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-74830c3" data-id="74830c3" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-21bfa5b elementor-widget elementor-widget-image" data-id="21bfa5b" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container">
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['4']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['4']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-3f6f0ad elementor-widget elementor-widget-text-editor" data-id="3f6f0ad" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['4']->name}}</h2>
                                                         <h5>{{@$specialists['4']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['4']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-5583249 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="5583249" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['4']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['4']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['4']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @if($specialists->count()>=6)
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3517fab" data-id="3517fab" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-b0e66fa elementor-widget elementor-widget-image" data-id="b0e66fa" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container"> 
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['5']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['5']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-ca06c89 elementor-widget elementor-widget-text-editor" data-id="ca06c89" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['5']->name}}</h2>
                                                         <h5>{{@$specialists['5']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['5']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-385f428 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="385f428" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['5']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['5']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['5']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> 
                                                            </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @endif
                                          </div>
                                          @endif
                                       </section>
                                       @endif
                                       @if($specialists->count()>=7)
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-8848f98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8848f98" data-element_type="section">
                                          @if($specialists->count()>=7)
                                          <div class="elementor-container elementor-column-gap-wider">
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-74830c3" data-id="74830c3" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-21bfa5b elementor-widget elementor-widget-image" data-id="21bfa5b" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container">
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['6']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['6']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-3f6f0ad elementor-widget elementor-widget-text-editor" data-id="3f6f0ad" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['6']->name}}</h2>
                                                         <h5>{{@$specialists['6']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['6']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-5583249 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="5583249" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['6']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['6']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['6']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @if($specialists->count()>=8)
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3517fab" data-id="3517fab" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-b0e66fa elementor-widget elementor-widget-image" data-id="b0e66fa" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container"> 
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['7']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['7']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-ca06c89 elementor-widget elementor-widget-text-editor" data-id="ca06c89" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['7']->name}}</h2>
                                                         <h5>{{@$specialists['7']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['7']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-385f428 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="385f428" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['7']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['7']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['7']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> 
                                                            </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @endif
                                          </div>
                                          @endif
                                       </section>
                                       @endif
                                       @if($specialists->count()>=9)
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-8848f98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8848f98" data-element_type="section">
                                          @if($specialists->count()>=9)
                                          <div class="elementor-container elementor-column-gap-wider">
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-74830c3" data-id="74830c3" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-21bfa5b elementor-widget elementor-widget-image" data-id="21bfa5b" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container">
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['8']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['8']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-3f6f0ad elementor-widget elementor-widget-text-editor" data-id="3f6f0ad" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['8']->name}}</h2>
                                                         <h5>{{@$specialists['8']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['8']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-5583249 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="5583249" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['8']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['8']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['8']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> </a>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @if($specialists->count()>=10)
                                             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3517fab" data-id="3517fab" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <div class="elementor-element elementor-element-b0e66fa elementor-widget elementor-widget-image" data-id="b0e66fa" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container"> 
                                                         <img width="780" height="819" src="{{url('public/upload/images/'.@$specialists['9']->image)}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{url('public/upload/images/'.@$specialists['9']->image)}}"> 
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-ca06c89 elementor-widget elementor-widget-text-editor" data-id="ca06c89" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>{{@$specialists['9']->name}}</h2>
                                                         <h5>{{@$specialists['9']->designation}}</h5>
                                                         <d style="text-align: justify;">
                                                            <?php echo @$specialists['9']->description; ?>
                                                         </d>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-385f428 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="385f428" data-element_type="widget" data-widget_type="social-icons.default">
                                                      <div class="elementor-widget-container">
                                                         <div class="elementor-social-icons-wrapper elementor-grid"> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['9']->facebook}}" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a388564" target="_blank">
                                                            <span class="elementor-screen-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['9']->twitter}}" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ca0e917" target="_blank">
                                                            <span class="elementor-screen-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                                            </span> 
                                                            <span class="elementor-grid-item">
                                                            <a target="_blank" href="{{@$specialists['9']->viber}}" class="elementor-icon elementor-social-icon elementor-social-icon-vimeo elementor-repeater-item-91c271f" target="_blank">
                                                            <span class="elementor-screen-only">Vimeo</span> <i class="fab fa-linkedin"></i> 
                                                            </a>
                                                            </span>
                                                         </div>
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
                           <!-- //OUR SPECIALISTS -->
                           <section class="elementor-section elementor-top-section elementor-element elementor-element-803b76a elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="803b76a" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                              <div class="elementor-container elementor-column-gap-wider">
                                 <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-343bf72" data-id="343bf72" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                       <!-- video section -->
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-4ee0dff elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4ee0dff" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                          <div class="elementor-container elementor-column-gap-default">
                                             <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-af5935a" data-id="af5935a" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                   <!-- <div class="elementor-element elementor-element-ed69f21 elementor-widget elementor-widget-image" data-id="ed69f21" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container"> <img width="15" height="16" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-icon1.png" class="attachment-large size-large" alt="" loading="lazy" /> </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-412cf40 elementor-widget elementor-widget-text-editor" data-id="412cf40" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h6><span style="color: #ffffff;">OUR COMNPANY</span></h6>
                                                      </div>
                                                   </div> -->
                                                   <div class="elementor-element elementor-element-4605ffd elementor-widget elementor-widget-text-editor" data-id="4605ffd" data-element_type="widget" data-widget_type="text-editor.default">
                                                      <div class="elementor-widget-container">
                                                         <h2>TMC | <br />WHO WE ARE</h2>
                                                      </div>
                                                   </div>
                                                   <div class="elementor-element elementor-element-77428de elementor-widget elementor-widget-image" data-id="77428de" data-element_type="widget" data-widget_type="image.default">
                                                      <div class="elementor-widget-container">
                                                         <a href="{{@$contact->youtube}}" target="_blank"> <img width="72" height="72" src="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-about-pic2.png" class="attachment-large size-large" alt="" loading="lazy" srcset="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-about-pic2.png"> </a>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </section>
                                       <!-- //video section -->
                                       <!-- //MEET OUR PARTNERS -->
                                       <div class="elementor-element elementor-element-ad4dfb5 elementor-widget elementor-widget-text-editor" data-id="ad4dfb5" data-element_type="widget" data-widget_type="text-editor.default">
                                          <div class="elementor-widget-container">
                                             <h2><span style="color: #0d0f39;">MEET OUR PARTNERS</span></h2>
                                          </div>
                                       </div>
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-40a2553 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="40a2553" data-element_type="section">
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
                           <section class="elementor-section elementor-top-section elementor-element elementor-element-5da9cbd elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="5da9cbd" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ca194fc" data-id="ca194fc" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                       <div class="elementor-element elementor-element-21216b5 elementor-widget elementor-widget-mfn_fancy_divider" data-id="21216b5" data-element_type="widget" data-widget_type="mfn_fancy_divider.default">
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