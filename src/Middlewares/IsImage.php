<?php

namespace App\Middlewares;

use App\Exceptions\BadRequest;

class IsImage
{
    public function handle(): void
    {
        if (!empty($_FILES)) {
            foreach ($_FILES as $fieldName => $file) {
                $type = $file['type'];
                $err = $file["error"];

                if ($err !== 0) {
                    throw new \Exception();
                }

                if (!str_starts_with($type, "image/")) {
                    throw new BadRequest("Only image can be uploaded");
                }
            }
        }
    }
}
