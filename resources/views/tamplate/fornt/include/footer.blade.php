<div class="footer">
    <div class="footer-top">
        <div class="wrap">
            
            <div class="col-md-6 col-xs-6 col-sm-2 footer-grid">
                <h4 class="footer-head">Categories</h4>
                <ul class="cat">
                    @foreach ($all_types as $item)
                    <div class="col-md-3 col-xs-6 col-sm-2 footer-grid">
                   
                    <li><a href="{{route('category',$item['id'])}}">{{$item['type_name']}}</a></li>
                    </div>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-4 footer-grid">
                <h4 class="footer-head">{{__('messages.about us')}}</h4>
                <p>{{__('messages.about1')}}</p>
                <p>{{__('messages.about2')}}</p>
            </div>
            </div>
            <div class="col-md-3 col-xs-12 footer-grid">
                <h4 class="footer-head">{{__('messages.contact us')}}</h4>
                <span class="hq">{{__('messages.Our headquaters')}}</span>
                <address>
                    <ul class="location">
                        <li><span class="glyphicon glyphicon-map-marker"></span></li>
                        <li>{{__('messages.adress')}}</li>
                        <div class="clearfix"></div>
                    </ul>	
                    <ul class="location">
                        <li><span class="glyphicon glyphicon-earphone"></span></li>
                        <li>+0 561 111 235</li>
                        <div class="clearfix"></div>
                    </ul>	
                    <ul class="location">
                        <li><span class="glyphicon glyphicon-envelope"></span></li>
                        <li><a href="mailto:info@example.com">mail@example.com</a></li>
                        <div class="clearfix"></div>
                    </ul>						
                </address>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap">
            <div class="copyrights col-md-6">
                <p>   {{__('messages.copyright')}}</p>
            </div>
            <div class="footer-social-icons col-md-6">
                <ul>
                    <li><a class="facebook" href="#"></a></li>
                    <li><a class="twitter" href="#"></a></li>
                    <li><a class="flickr" href="#"></a></li>
                    <li><a class="googleplus" href="#"></a></li>
                    <li><a class="dribbble" href="#"></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>