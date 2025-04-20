<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Branch;
use App\Models\Contact;
use App\Models\Headline;
use App\Models\Information;
use App\Models\Misi;
use App\Models\Post;
use App\Models\Product;
use App\Models\Section;
use App\Models\TeamTestimonial;
use App\Models\UserTestimonial;
use App\Models\Visi;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getHeadline($sectionName)
    {
        $headline = Headline::where('section_name', $sectionName)->first();
        if (!$headline) {
            return response()->json([
                'success' => false,
                'message' => 'Headline not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Headline data retrieved successfully',
            'data' => $headline,
        ], 200);
    }

    public function getSection($sectionName)
    {
        $sections = Section::where('section_name', $sectionName)->get();
        if (!$sections) {
            return response()->json([
                'success' => false,
                'message' => 'Section not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Section data retrieved successfully',
            'data' => $sections,
        ], 200);
    }

    public function getInformation($name)
    {
        $information = Information::where('name', $name)->first();
        if (!$information) {
            return response()->json([
                'success' => false,
                'message' => 'Information not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Information data retrieved successfully',
            'data' => $information,
        ], 200);
    }

    public function getContact()
    {
        $contact = Contact::first();
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contact data retrieved successfully',
            'data' => $contact,
        ], 200);
    }

    public function getBranches()
    {
        $branches = Branch::orderBy('established', 'desc')->get();
        if (!$branches) {
            return response()->json([
                'success' => false,
                'message' => 'Branch not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Branches data retrieved successfully',
            'data' => $branches,
        ], 200);
    }

    public function getAchievements()
    {
        $achievements = Achievement::all();
        if (!$achievements) {
            return response()->json([
                'success' => false,
                'message' => 'Achievement not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Achievement data retrieved successfully',
            'data' => $achievements,
        ], 200);
    }

    public function getVisiMisi($name)
    {
        if ($name == 'visi') {
            $data = Visi::first();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Visi not found',
                ], 404);
            }
        } else {
            $data = Misi::orderBy('order_number', 'asc')->get();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Misi not found',
                ], 404);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'data' => $data,
        ], 200);
    }

    public function getProducts()
    {
        $products = Product::all();

        if (!$products) {
            return response()->json([
                'success' => false,
                'message' => 'Products not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Products data retrieved successfully',
            'data' => $products,
        ], 200);
    }

    public function createTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'testimonial' => 'required|string',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'city.required' => 'Kota harus diisi',
            'city.string' => 'Kota harus berupa teks',
            'city.max' => 'Kota tidak boleh lebih dari 50 karakter',
            'testimonial.required' => 'Testimonial harus diisi',
            'testimonial.string' => 'Testimonial harus berupa teks',
        ]);

        $testimonial = UserTestimonial::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Testimonial created successfully',
            'data' => $testimonial,
        ], 201);
    }

    public function getTestimonials($category)
    {
        if ($category == 'team') {
            $testimonials = TeamTestimonial::all();
            if (!$testimonials) {
                return response()->json([
                    'success' => false,
                    'message' => 'Testimonials not found',
                ], 404);
            }
        } else {
            $testimonials = UserTestimonial::all();
            if (!$testimonials) {
                return response()->json([
                    'success' => false,
                    'message' => 'Testimonials not found',
                ], 404);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Testimonials data retrieved successfully',
            'data' => $testimonials,
        ], 200);
    }

    public function getPosts()
    {
        $posts = Post::with('media')->latest()->paginate(9);
        if (!$posts) {
            return response()->json([
                'success' => false,
                'message' => 'Posts not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Posts data retrieved successfully',
            'data' => $posts,
        ]);
    }

    public function getPost($slug)
    {
        $post = Post::with('media')->where('slug', $slug)->first();
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Post data retrieved successfully',
            'data' => $post,
        ]);
    }
}
