<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\Rating;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\Blog;
use App\Models\Comment;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function logout(){
        Auth::guard('cus')->logout();
        return redirect()->route('index');
    }

    public function login(){
        return view('pages.account');
    }

    public function post_login(Request $req){
        $this->validate($req,[
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Vui lòng nhập Email',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ]);
        if (Auth::guard('cus')->attempt($req->only('email','password'), $req->has('remember'))) {
            return redirect()->route('index');
        }else{
            return redirect()->back();
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homepage()
    {
        $tour = Tour::limit(6)->orderBy('id','DESC')->where('status',1)->get();
        return view('index',compact('tour'));
    }

    public function destination($slug)
    {
        $des = Destination::where('slug',$slug)->first();
        $tour = Tour::where('slug',$slug)->first();
        if ($des) {
            return view('pages.tourlist',compact('des'));
        }
        else if ($tour)
        {
            $rating = Rating::where([['tour_id',$tour->id],['status',1]])->get();
            $average = $rating->avg('rating');
            return view('pages.tourdetail',compact('tour','rating','average'));
        }
    }

    public function rating($slug, Request $request)
    {
        $tour = Tour::where('slug',$slug)->first();
        $customer_id = Auth::guard('cus')->user()->id;
        $rating = new Rating;
        $rating->create([
            'rating' => $request->rating,
            'tour_id' => $tour->id,
            'customer_id' => $customer_id,
            'comment' => $request->comment
        ]); 
        return redirect()->back();
    }

    public function register(){
        return view('pages.register');
    }
    public function post_register(Request $req){
        $req->validate([
            'l_name' => 'required',
            'f_name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'birthday' => 'required',
            'password' => 'required',
            'cpassword' => 'required|same:password',
        ],[
            'l_name.required' => 'Vui lòng điền họ và tên đệm của bạn',
            'f_name.required' => 'Vui lòng điền tên của bạn',
            'email.required' => 'Vui lòng điền email của bạn',
            'email.email' => 'Vui lòng điền đúng định dạng email',
            'email.unique' => 'Email đã tồn tại, vui lòng điền địa chỉ email khác',
            'phone.required' => 'Vui lòng điền số điện thoại của bạn',
            'birthday.required' => 'Vui lòng điền ngày sinh của bạn',
            'password.required' => 'Vui lòng điền mật khẩu',
            'cpassword.required' => 'Vui lòng điền xác nhập lại mật khẩu',
            'cpassword.same' => 'Mật khẩu không trùng nhau, vui lòng điền lại mật khẩu và xác nhận',
        ]);
        $req->merge(['password' => bcrypt($req->password)]);
        $register = Customer::create($req->all());
        if ($register) {
            return redirect()->route('account')->with('status-success','Bạn đã đăng ký thành công, giờ bạn có thể đăng nhập');
        }else{
            return redirect()->back()->with('status-error','Bạn đã đăng ký thất bại, xin mời điền lại thông tin');
        }
    }

    public function about()
    {
        return view('pages.about');
    }
    public function blog()
    {
        $blog = Blog::orderBy('name','ASC')->get();
        return view('pages.blog',compact('blog'));
    }

    public function blog_detail($slug)
    {
        $blogs = Blog::where('slug',$slug)->first();
        $comments = Comment::orderBy('id','DESC')->where('blog_id',$blogs->id)->where('parent_id', null)->get();
        $comment_count = Comment::where('blog_id',$blogs->id)->get();
        return view('pages.blogdetail',compact('blogs','comments','comment_count'));       
    }

    public function comment($slug, Request $request)
    {
        $customer_id = Auth::guard('cus')->user()->id;
        $blogs = Blog::where('slug',$slug)->first();
        Comment::create([
            'customer_id' => $customer_id,
            'blog_id' => $blogs->id,
            'content' => $request->content
        ]);
        return redirect()->back()->with('status-success','Bình luận thành công');

    }
    public function reply_comment($slug, $id, Request $request)
    {
        $customer_id = Auth::guard('cus')->user()->id;
        $blogs = Blog::where('slug',$slug)->first();
        $comments = Comment::find($id);
        Comment::create([
            'customer_id' => $customer_id,
            'blog_id' => $blogs->id,
            'content' => $request->content,
            'parent_id' => $comments->id
        ]);
        return redirect()->back()->with('status-success','Bình luận thành công');
    }


    public function contact()
    {
        return view('pages.contact');
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function gallery()
    {
        $destination = Destination::orderBy('name','ASC')->get();

        return view('pages.gallery',compact('destination'));
    }
    public function gallery_destination($slug)
    {
        $destinations = Destination::where('slug', $slug)->first();
        $gallery = Gallery::where('destination_id',$destinations->id)->get();
        return view('pages.gallerydestination',compact('gallery','destinations'));
    }
    public function service()
    {
        return view('pages.service');
    }
}   

