<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class Upload
{
    private $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV["CLOUDINARY_CLOUD"],
                'api_key'    => $_ENV["CLOUDINARY_API"],
                'api_secret' => $_ENV["CLOUDINARY_API_SECRET"]
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }

    public function upload(string $file, string $folder): string
    {
        $result = $this->cloudinary->uploadApi()->upload(
            $file,
            [
                'folder' => "phpBlogs/" . $folder
            ]
        );

        return $result["secure_url"];
    }
}
