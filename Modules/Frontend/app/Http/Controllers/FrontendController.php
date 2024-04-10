<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Helpers\FrontendHelper;
use App\Mail\EnquiryMail;
use App\Models\About;
use App\Models\Enquiry;
use App\Models\Home;
use App\Models\Business;
use App\Models\Blog;
use App\Models\Slider;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    /**
     * Displays home page.
     * 
     * @author Sooryajith
     */
    public function index()
    {
        $home = Home::latest()->first();
        $sliders = Slider::where('status', 1)->orderBy('sort_order', 'asc')->get();

        $slidersCollection = collect($sliders);
        $first_sliders = $slidersCollection->filter(function ($value, $key) {
            return $key % 4 === 0;
        })->values()->all();

        $second_sliders = $slidersCollection->filter(function ($value, $key) {
            return $key % 4 === 1;
        })->values()->all();

        $third_sliders = $slidersCollection->filter(function ($value, $key) {
            return $key % 4 === 2;
        })->values()->all();

        $fourth_sliders = $slidersCollection->filter(function ($value, $key) {
            return $key % 4 === 3;
        })->values()->all();

        $businesses = Business::where('status', 1)->orderBy('sort_order', 'asc')->get();
        $blogs = Blog::where('status', 1)->orderBy('posted_date', 'desc')->take(3)->get();

        $metaTags = FrontendHelper::getMetaTags('home');
        return view('frontend::frontend.index', compact('home', 'first_sliders', 'second_sliders', 'third_sliders', 'fourth_sliders', 'businesses', 'blogs', 'metaTags'));
    }

    /**
     * Displays about page.
     * 
     * @author Sooryajith
     */
    public function about()
    {
        $about = About::latest()->first();

        $metaTags = FrontendHelper::getMetaTags('about');
        $pageBanner = FrontendHelper::getPageBanner('about');
        return view('frontend::frontend.about', compact('about', 'metaTags', 'pageBanner'));
    }

    /**
     * Displays blogs page.
     * 
     * @author Sooryajith
     */
    public function blogs()
    {
        $blogs = Blog::where('status', 1)->orderBy('posted_date', 'desc')->get();

        $metaTags = FrontendHelper::getMetaTags('blogs');
        $pageBanner = FrontendHelper::getPageBanner('blogs');
        return view('frontend::frontend.blogs', compact('blogs', 'metaTags', 'pageBanner'));
    }

    /**
     * Displays blog details page.
     * 
     * @author Sooryajith
     */
    public function blogDetails($slug)
    {
        $blog_single = Blog::where('slug', $slug)->first();

        if ($blog_single) {
            // latest blogs
            $blogs = Blog::where('status', 1)->whereNotIn('id', [$blog_single->id])->latest()->get();

            $pageBanner = FrontendHelper::getPageBanner('blogs');
            return view('frontend::frontend.blog-details', compact('blog_single', 'blogs', 'pageBanner'));
        }

        abort(404);
    }

    /**
     * Displays contact page.
     * 
     * @author Sooryajith
     */
    public function contact()
    {
        $metaTags = FrontendHelper::getMetaTags('contact');
        $pageBanner = FrontendHelper::getPageBanner('contact');
        return view('frontend::frontend.contact', compact('metaTags', 'pageBanner'));
    }

    /**
     * Process the enquiry form submission.
     *
     * This method handles the form submission for enquiries. It validates the input fields,
     * saves the enquiry to the database, sends an email notification, and redirects the user
     * back to the contact page with a success or error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Sooryajith
     */
    public function enquiry(Request $request)
    {
        $request->validateWithBag('enquiry', [
            'name'                  => ['required', 'regex:/^[A-Za-z\s]+$/', 'min:3', 'max:25'],
            'email'                 => 'required|email',
            'phone'                 => ['required', 'regex:/^[0-9+\-()\s]+$/'],
            'message'               => 'required',
            'g-recaptcha-response' => [
                'required',
                function ($attribute, $value, $fail) {
                    $response = $this->reCaptcha($value);
                    if (!$response['success']) {
                        $fail('Please complete the reCAPTCHA validation.');
                    }
                },
            ],
        ], [
            'name.required'     => 'The name field is required.',
            'name.regex'        => 'The name field format is invalid.',
            'name.min'          => 'The name field must be at least 3 characters.',
            'name.max'          => 'The name field must not be greater than 25 characters.',
            'email.required'    => 'The email field is required.',
            'email.email'       => 'Invalid email address.',
            'phone.required'    => 'The phone field is required.',
            'phone.regex'       => 'The phone field format is invalid.',
            'message.required'  => 'The message field is required.',
        ]);

        $enquiry            = new Enquiry();
        $enquiry->name      = $request->name;
        $enquiry->email     = $request->email;
        $enquiry->phone     = $request->phone;
        $enquiry->message   = $request->message;

        if ($enquiry->save()) {
            Mail::send(new EnquiryMail($enquiry));
            return redirect()->route('contact')->with('success', 'Thank you for contacting us. We will get back to you as soon as possible.');
        } else {
            return redirect()->route('contact')->with('error', 'Your application was not submitted.');
        }
    }

    /**
     * Verify reCAPTCHA token with Google API.
     *
     * This method sends a POST request to Google reCAPTCHA API to verify the token.
     *
     * @param  string  $token
     * @return array The response from Google reCAPTCHA API.
     * @author Sooryajith
     */
    protected function reCaptcha($token)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => "6Lfp27YpAAAAAExOjIeAjJ2s2_spoHaWXSjOPyHG",
            'response' => $token,
        ]);

        return $response->json();
    }
}
