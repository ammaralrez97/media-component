<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    function get(Request $request)
    {
        $length = (!empty($request->length) ? $request->length : 12);
        $skip = ((!empty($request->page) ? $request->page : 1) - 1) * $length;
        $total = Media::query()->count();
        $query = Media::query()
            ->orderByDesc('id')
            ->limit($length)
            ->skip($skip);

        return response()->json([
            'files' => $query->get(),
            'pages' => ceil($total / $length),
            'total' => $total,
            'current' => $request->page ?? 1,

        ]);

    }

    function upload(Request $request)
    {

        $file = $request->file;
        $data = [];
        $fileName = time() . '_' . $file->getClientOriginalName();
        $data['size'] = $file->getSize();
        $data['extanion'] = $file->extension();
        $data['mime'] = $file->getMimeType();
        $data['name'] = $fileName;
        $data['path'] = '/';
        $data['is_folder'] = false;
        $image_resize = Image::make($file->getRealPath());
        $image_resize->resize(400, 400);
        $image_resize->save(Storage::disk('public')->path($fileName));
        Media::create($data);
        return response()->json(['message' => 'Success upload']);
    }

    function files(Request $request)
    {
        $items = $request->items;
        $data = Media::query()->whereIn('id', $items)->get();
        return response()->json(['files' => $data]);
    }
}
