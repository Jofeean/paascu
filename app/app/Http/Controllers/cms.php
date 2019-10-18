<?php

namespace App\Http\Controllers;

use App\BannerImage;
use App\Contents;
use App\FooterContent;
use App\FooterImage;
use App\NewsBanners;
use App\WelcomeBanners;
use Illuminate\Http\Request;
use Image;
use Validator;
use Response;

class cms extends Controller
{
    public function contentImage(Request $request)
    {

        $fpath = 'assets\img\content/' . time() . '.' . $request->file->extension();
        Image::make($request->file)->save($fpath);

        // Send response.
        return response()->json(['link' => url($fpath)]);

    }

    public function deleteContentImage($file)
    {
        $src = $file;

        // Check if file exists.
        chdir('./assets/img/content');
        chmod(getcwd() . '/' . $src, 0644);
        if (file_exists(getcwd() . '/' . $src)) {
            // Delete file.
            unlink(getcwd() . '/' . $src);
        }
    }

    //get data
    public function getBannerImage()
    {
        return BannerImage::all()->toJson();
    }

    public function getFooterImage()
    {
        return FooterImage::all()->toJson();
    }

    public function getFooterContent()
    {
        return FooterContent::all()->first();
    }

    public function getWelcomeBanner()
    {
        return WelcomeBanners::all()->toJson();
    }

    public function getNewsBanner()
    {
        return NewsBanners::all()->toJson();
    }

    //About
    public function getLandingContent()
    {
        return Contents::find(1)->toJson();
    }

    public function getAboutContent()
    {
        return Contents::find(2)->toJson();
    }

    public function getPaascuContent()
    {
        return Contents::find(3)->toJson();
    }

    public function getVisionContent()
    {
        return Contents::find(4)->toJson();
    }

    public function getBoardContent()
    {
        return Contents::find(5)->toJson();
    }

    public function getCommissionContent()
    {
        return Contents::find(6)->toJson();
    }

    //Accreditation
    public function getWhatContent()
    {
        return Contents::find(7)->toJson();
    }

    public function getProcessContent()
    {
        return Contents::find(8)->toJson();
    }

    public function getProgramsContent()
    {
        return Contents::find(9)->toJson();
    }

    public function getStandardsContent()
    {
        return Contents::find(10)->toJson();
    }

    public function getBenefitContent()
    {
        return Contents::find(11)->toJson();
    }

    //add data
    public function addBannerImage(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'image' => 'required|mimes:jpeg,bmp,png',
            'name' => 'required|unique:banner_images,name|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Add Banner Image',
                'message' => 'Banner unsuccessfully uploaded!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $img = time() . '.' . $request->image->extension();
        Image::make($request->image)->save('assets\img\banners/' . $img);
        Image::make($request->image)->fit(200, 200, function ($constraint) {
            $constraint->upsize();
        })->save('assets\img\banners\thumb/' . $img);

        $banner = new BannerImage();
        $banner->name = $request->name;
        $banner->filename = $img;
        $banner->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Add Banner Image',
            'message' => 'Banner successfully uploaded!',
        ), 200);
    }

    public function addFooterImage(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'image' => 'required|mimes:jpeg,bmp,png',
            'name' => 'required|unique:footer_images,name|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Add Footer Image',
                'message' => 'Footer unsuccessfully uploaded!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $img = time() . '.' . $request->image->extension();
        Image::make($request->image)->save('assets\img\footers/' . $img);
        Image::make($request->image)->fit(200, 200, function ($constraint) {
            $constraint->upsize();
        })->save('assets\img\footers\thumb/' . $img);

        $footer = new FooterImage();
        $footer->name = $request->name;
        $footer->filename = $img;
        $footer->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Add Footer Image',
            'message' => 'Footer successfully uploaded!',
        ), 200);
    }

    public function addWelcomeBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'image' => 'required|mimes:jpeg,bmp,png',
            'name' => 'required|unique:welcome_banners,name|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Add Welcome Banner Image',
                'message' => 'Welcome Banner unsuccessfully uploaded!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $img = time() . '.' . $request->image->extension();
        Image::make($request->image)->fit(1920, 1080, function ($constraint) {
            $constraint->upsize();
        })->save('assets\img\welcome/' . $img);
        Image::make($request->image)->fit(200, 200, function ($constraint) {
            $constraint->upsize();
        })->save('assets\img\welcome\thumb/' . $img);

        $banner = new WelcomeBanners();
        $banner->name = $request->name;
        $banner->filename = $img;
        $banner->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Add Welcome Banner Image',
            'message' => 'Welcome Banner successfully uploaded!',
        ), 200);
    }

    public function addNewsBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'image' => 'required|mimes:jpeg,bmp,png',
            'name' => 'required|unique:news_banners,name|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Add News Banner Image',
                'message' => 'News Banner unsuccessfully uploaded!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $img = time() . '.' . $request->image->extension();
        Image::make($request->image)->save('assets\img\news/' . $img);
        Image::make($request->image)->fit(200, 200, function ($constraint) {
            $constraint->upsize();
        })->save('assets\img\news\thumb/' . $img);

        $banner = new NewsBanners();
        $banner->name = $request->name;
        $banner->filename = $img;
        $banner->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Add News Banner Image',
            'message' => 'News Banner successfully uploaded!',
        ), 200);
    }

    //select image
    public function selectBannerImage(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Select Banner Image',
                'message' => 'Footer unsuccessfully select!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        BannerImage::where('isSelected', true)->update(['isSelected' => false]);
        BannerImage::where('name', $request->name)->update(['isSelected' => true]);

        return Response::json(array(
            'success' => true,
            'header' => 'Select Banner Image',
            'message' => 'Banner successfully selected!',
        ), 200);
    }

    public function selectFooterImage(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Select Footer Image',
                'message' => 'Footer unsuccessfully selected!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        FooterImage::where('isSelected', true)->update(['isSelected' => false]);
        FooterImage::where('name', $request->name)->update(['isSelected' => true]);

        return Response::json(array(
            'success' => true,
            'header' => 'Select Footer Image',
            'message' => 'Footer successfully selected!',
        ), 200);
    }

    public function selectNewsImage(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Select News Image',
                'message' => 'News unsuccessfully selected!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        NewsBanners::where('isSelected', true)->update(['isSelected' => false]);
        $mans = explode(",", $request->name);

        foreach ($mans as $man) {
            NewsBanners::where('name', $man)->update(['isSelected' => true]);
        }

        return Response::json(array(
            'success' => true,
            'header' => 'Select News Image',
            'message' => 'News successfully selected!',
        ), 200);
    }

    public function selectWelcomeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Select Welcome Image',
                'message' => 'Welcome unsuccessfully selected!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        WelcomeBanners::where('isSelected', true)->update(['isSelected' => false]);
        $mans = explode(",", $request->name);

        foreach ($mans as $man) {
            WelcomeBanners::where('name', $man)->update(['isSelected' => true]);
        }

        return Response::json(array(
            'success' => true,
            'header' => 'Select Welcome Image',
            'message' => 'Welcome successfully selected!',
        ), 200);
    }

    //update
    public function updateFooterContent(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'id' => 'required',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Update Footer Content',
                'message' => 'Footer content unsuccessfully updated!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $footer = FooterContent::find($request->id);
        $footer->content = $request->content;
        $footer->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Update Footer Content',
            'message' => 'Footer content successfully updated!',
        ), 200);
    }

    public function updateHomeContent(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'id' => 'required',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Update Content',
                'message' => 'Content unsuccessfully updated!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $content = Contents::find($request->id);
        $content->content = $request->content;
        $content->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Update Content',
            'message' => 'Content successfully updated!',
        ), 200);
    }

    public function updateTitle(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'id' => 'required',
            'title' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Update Content',
                'message' => 'Content unsuccessfully updated!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $content = Contents::find($request->id);
        $content->title = $request->title;
        $content->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Update Content',
            'message' => 'Content successfully updated!',
        ), 200);
    }

    public function updateContent(Request $request)
    {
        $validator = Validator::make($request->all(), [ //making the validator
            'id' => 'required',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'header' => 'Update Content',
                'message' => 'Content unsuccessfully updated!',
                'errors' => $validator->messages()->all()
            ), 200);
        }

        $content = Contents::find($request->id);
        $content->content = $request->content;
        $content->save();

        return Response::json(array(
            'success' => true,
            'header' => 'Update Content',
            'message' => 'Content successfully updated!',
        ), 200);
    }
}
