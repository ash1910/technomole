<?php

namespace App\Http\Controllers\Frontend;

use App;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Model\FrontendMenu;
use App\Model\MenuPost;
use App\Model\MenuPostFile;
use App\Model\Contact;
use App\Model\Service;
use App\Model\About;
use App\Model\Team;
use App\Model\HowWork;
use App\Model\Blog;
use App\Model\BlogFile;
use App\Model\PhotoCategory;
use App\Model\PhotoFolder;
use App\Model\PhotoGallery;
use App\Model\PhotoGalleryDetail;
use App\Model\VideoCategory;
use App\Model\VideoGallery;
use App\Model\AudioCategory;
use App\Model\AudioGallery;
use App\Model\Partner;
use App\Model\NewsLetter;
use App\Model\comment;
use App\Model\SubComment;
use App\Model\Communicate;
use App\Model\Performance;
use Session;
use Mail;

class FrontController extends Controller
{

    public function __construct(){
        $about = About::first();
        $contact = Contact::first();
        $partner = Partner::all();
        $this->about = $about;
        $this->contact = $contact;
        $this->partner = $partner;
    }

    public function index()
    {
        $data['specialists'] = Team::get()->take(4);
        $data['services'] = Service::get()->take(4);
        $data['how_works'] = HowWork::get()->take(2);
        $data['contact'] = $this->contact;
        $data['about'] = $this->about;
        $data['partners'] = $this->partner;
        $data['page_title'] = 'Home';
        return view('frontend.layouts.home',$data);
    }

    public function aboutUs()
    {
        $data['about'] = $this->about;
        $data['contact'] = $this->contact;
        $data['partners'] = $this->partner;
        $data['performance'] = Performance::first();
        $data['page_title'] = 'About Us';
        return view('frontend.single_pages.about_us',$data);
    }

    public function ourServices()
    {
        $data['specialists'] = Team::get()->take(4);
        $data['services'] = Service::all();
        $data['contact'] = $this->contact;
        $data['partners'] = $this->partner;
        $data['page_title'] = 'Our Services';
        return view('frontend.single_pages.services',$data);
    }

    public function ourServicesDetails($id)
    {
        $data['specialists'] = Team::get()->take(4);
        $data['service'] = Service::find($id);
        $data['contact'] = $this->contact;
        $data['partners'] = $this->partner;
        $data['page_title'] = 'Service Details';
        return view('frontend.single_pages.service_details',$data);
    }

    public function ourSpecialist()
    {
        $data['specialists'] = Team::get();
        $data['contact'] = $this->contact;
        $data['partners'] = $this->partner;
        $data['page_title'] = 'Our Management';
        return view('frontend.single_pages.specialist',$data);
    }

    public function contactUs()
    {
        $data['contact'] = $this->contact;
        $data['partners'] = $this->partner;
        $data['page_title'] = 'Contact Us';
        return view('frontend.single_pages.contact',$data);
    }

    public function howWeWork()
    {
        $data['how_works'] = HowWork::get();
        $data['contact'] = $this->contact;
        $data['partners'] = $this->partner;
        $data['page_title'] = 'How We Work';
        return view('frontend.single_pages.how_we_work',$data);
    }

    public function contactStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'msg' => 'required'
        ]);
        
        $check_email = Communicate::first();
        $backend_email = $check_email->email;

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'msg'=>$request->msg
        ];
        
        $honeypot = $request->phone;
        if( ! empty( $honeypot ) ){
		      return;
	    }else{
        Mail::send('frontend.email.contact_page', $data, function ($message) use ($data,$backend_email){
            $message->from($data['email'],$data['name']);
            $message->to($backend_email);
            $message->subject($data['subject']);
        });        
	    }


        // $data = [
        //     'emails'=>[$request->email,'asadullahkpi@gmail.com']
        // ];

        // Mail::send('frontend.email.contact_page', [], function($message) use ($data)
        // {    
        //     $message->to($data['emails'])->subject('Contact Confirmation');    
        // });

        return redirect()->back()->with('success','Thanks,Your message is successfully sent');
    }

    public function MenuUrl($menu_url){
        $menu_url_data = FrontendMenu::where('url_link','like',$menu_url.'%')->first();
        if($menu_url_data != null){
            if($menu_url_data->url_link_type == '1'){
                return redirect($menu_url_data['url_link']);
            }

            if($menu_url_data->url_link_type == '2'){
                $data['find_menu'] = $menu_url_data;
                $data['count'] = MenuPostFile::where('menu_post_id',@$data['find_menu']->id)->count();
                $data['find_post'] = MenuPost::where('title_en',$data['find_menu']->title_en)->first();
                // dd($data['find_post']);
                if(Session()->get('language') =='en'){
                    $data['title_page'] = $data['find_menu']['title_en'];
                    $data['page'] = $data['find_menu']['title_en'];
                }else{
                    $data['title_page'] = $data['find_menu']['title_bn'];
                    $data['page'] = $data['find_menu']['title_bn'];
                }
                $data['contact'] = $this->contact;
                return view('frontend.single_pages.single_page',$data);
            }

            if($menu_url_data->url_link_type == '3'){
                $url = strpos($menu_url, 'http') !== 0 ? "http://".$menu_url : $menu_url;
                header("Location:".$url);
                die();
            }

            if($menu_url_data->url_link_type == '4'){
                $data['menu_url_data'] = $menu_url_data;
                $data['contact'] = $this->contact;
                // dd($data);
                return view('frontend.single_pages.single_page_attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }
    

}
