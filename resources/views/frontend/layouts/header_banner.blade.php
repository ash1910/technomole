<!-- For home page -->
<div class="mfn-main-slider mfn-rev-slider">
   <p class="rs-p-wp-fix"></p>
   <rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery" style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
      <rs-module id="rev_slider_1_1" style="" data-version="6.5.11">
         <rs-slides>
            <rs-slide style="position: absolute;" data-key="rs-1" data-title="Slide" data-anim="ms:1000;r:0;" data-in="o:0;" data-out="a:false;">
               <img src="{{asset('public/frontend/techno')}}/wp-content/plugins/revslider/public/assets/assets/dummy.png" title="data-slider-bg" width="1920" height="1000" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="{{asset('public/frontend/techno')}}/wp-content/uploads/2020/06/data-slider-bg.png" data-bg="p:center bottom;" data-no-retina>
               <rs-layer id="slider-1-slide-1-layer-0" data-type="text" data-color="#a4a6cc" data-rsp_ch="on" data-xy="x:c;yo:315px,315px,197px,197px;" data-text="w:normal;s:24,24,14,14;l:30,30,18,18;fw:300;a:center;" data-vbility="t,t,f,t" data-frame_0="y:50;" data-frame_1="st:150;sp:1000;sR:150;" data-frame_999="o:0;st:w;sR:7850;" style="z-index:9;font-family:'Teko';"> 
                  {{substr(@$about->offer,0,120)}}
               </rs-layer>
               <rs-layer id="slider-1-slide-1-layer-1" data-type="text" data-color="#0d0f39" data-rsp_ch="on" data-xy="x:c;yo:140px,140px,127px,127px;" data-text="w:normal;s:95,95,75,75;l:75,75,65,65;fw:500;a:center;" data-frame_0="y:50;" data-frame_1="st:100;sp:1000;sR:100;" data-frame_999="o:0;st:w;sR:7900;" style="z-index:8;font-family:'Teko';">THE ASPIRING
                  <br>ITeS and SaaS company.
               </rs-layer>
               <!-- Botton -->
               <a target="_blank" id="slider-1-slide-1-layer-2" class="rs-layer rev-btn" href="{{@$contact->youtube}}" target="_self" data-color="#0d0f39" data-rsp_ch="on" data-xy="x:c;xo:85px;yo:376px,376px,285px,285px;" data-text="w:normal;l:50;fw:500;" data-dim="minh:0px,0px,none,0px;" data-padding="r:35;l:35;" data-border="bos:solid;boc:#f381e7;bow:2px,2px,2px,2px;bor:3px,3px,3px,3px;" data-frame_0="y:50;" data-frame_1="st:200;sp:1000;sR:200;" data-frame_999="o:0;st:w;sR:7800;" data-frame_hover="c:#0d0f39;bgc:#f381e7;boc:#f381e7;bor:3px,3px,3px,3px;bos:solid;bow:2px,2px,2px,2px;e:power1.inOut;" style="z-index:11;background-color:rgba(0,0,0,0);font-family:'Teko';">OUR PROMO
               </a>
               <a id="slider-1-slide-1-layer-3" class="rs-layer rev-btn" href="{{route('frontend.about-us')}}" target="_self" rel="nofollow" data-type="button" data-color="#0d0f39" data-rsp_ch="on" data-xy="x:c;xo:-85px,-85px,-84px,-84px;yo:376px,376px,285px,285px;" data-text="w:normal;l:50;fw:500;" data-dim="minh:0px,0px,none,0px;" data-padding="r:35;l:35;" data-border="bos:solid;boc:#f381e7;bow:2px,2px,2px,2px;bor:3px,3px,3px,3px;" data-frame_0="y:50;" data-frame_1="st:200;sp:1000;sR:200;" data-frame_999="o:0;st:w;sR:7800;" data-frame_hover="c:#0d0f39;bgc:#f381e7;boc:#f381e7;bor:3px,3px,3px,3px;bos:solid;bow:2px,2px,2px,2px;e:power1.inOut;" style="z-index:10;background-color:rgba(0,0,0,0);font-family:'Teko';">LEARN MORE 
               </a>
               <!-- //Botton --> 
            </rs-slide>
         </rs-slides>
      </rs-module>
      <script type="text/javascript">
         setREVStartSize({
             c: 'rev_slider_1_1',
             rl: [1240, 1240, 778, 778],
             el: [1000, 1000, 960, 960],
             gw: [1240, 1240, 778, 778],
             gh: [1000, 1000, 960, 960],
             type: 'hero',
             justify: '',
             layout: 'fullwidth',
             mh: "0"
         });
         if(window.RS_MODULES !== undefined && window.RS_MODULES.modules !== undefined && window.RS_MODULES.modules["revslider11"] !== undefined) {
             window.RS_MODULES.modules["revslider11"].once = false;
             window.revapi1 = undefined;
             if(window.RS_MODULES.checkMinimal !== undefined) window.RS_MODULES.checkMinimal()
         }
      </script>
   </rs-module-wrap>
   <!-- END REVOLUTION SLIDER -->
</div>

