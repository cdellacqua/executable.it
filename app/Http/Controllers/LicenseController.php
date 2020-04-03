<?php

namespace App\Http\Controllers;

use App\Models\TimelineItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class LicenseController extends Controller
{
    public function licenses() {
        $licenses = array_map(
            function (SplFileInfo $fileInfo) {
                $licenseAndName = explode('-', $fileInfo->getFilenameWithoutExtension(), 2);
                return [
                    'license' => $licenseAndName[0],
                    'name' => $licenseAndName[1],
                    'assetPath' => 'licenses/'.$fileInfo->getFilename(),
                ];
            },
            array_filter(File::files(public_path().'/licenses'), function (SplFileInfo $fileInfo) {
                return $fileInfo->getExtension() === 'txt';
            })
        );
        usort($licenses, function ($license1, $license2) {
            return strcasecmp($license1['name'], $license2['name']);
        });
        return view('pages.licenses', ['licenses' => $licenses]);
    }
}
