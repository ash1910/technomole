<footer id="Footer" class="clearfix ">
    <div class="widgets_wrapper ">
       <div class="container">
          <div class="column one-third">
             <aside id="custom_html-2" class="widget_text widget widget_custom_html">
                <div class="textwidget custom-html-widget">
                   <div style="text-align: left;">
                      <h3>ADDRESS</h3>
                      <p><strong>Registered:</strong> {{@$contact->registered_address}}
                         <br>
                         <strong>Head Office:</strong> {{@$contact->corporate_address}}
                      </p>
                   </div>
                </div>
             </aside>
          </div>
          <div class="column one-third">
             <aside id="custom_html-3" class="widget_text widget widget_custom_html">
                <div class="textwidget custom-html-widget">
                   <div style="text-align: left;">
                      <h3>CONTACT US</h3>
                      <p><strong>Cell:</strong> {{@$contact->mobile}} 
                         <br><strong>Tel:</strong> {{@$contact->telephone}} 
                         <br><strong>Email:</strong> {{@$contact->email}}
                      </p>
                   </div>
                </div>
             </aside>
          </div>
          <div class="column one-third">
             <aside id="custom_html-4" class="widget_text widget widget_custom_html">
                <div class="textwidget custom-html-widget">
                   <div style="text-align: left;">
                      <h3>QUICK LINK</h3>
                      <a href="{{url('')}}">Home</a><br>
                      <a href="{{route('frontend.about-us')}}">About Us</a><br>
                      <a href="{{route('frontend.our-services')}}">Services</a><br>
                      <a href="{{route('frontend.our-specialist')}}">Our Management</a><br>
                      <a href="{{route('frontend.contact-us')}}">Contact Us</a><br>
                   </div>
                </div>
             </aside>
          </div>
       </div>
    </div>
    <div class="footer_copy">
       <div class="container">
          <div class="column one">
             <div class="copyright"> © <script>document.write(new Date().getFullYear());</script> Techno Mole Creations Ltd.( IT concern of <a href="https://www.hnsautomobiles.com">HNS Group</a>) </div>
             <ul class="social"></ul>
          </div>
       </div>
    </div>
</footer>