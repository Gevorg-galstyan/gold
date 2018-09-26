<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class RemoveMediaImage
{
    /** @var string */
    private $filesystem;

    public function __construct()
    {
        $this->filesystem = config('voyager.storage.disk');
    }

    // REMOVE FILE
    public function remove(Request $request)
    {
        try {
            // GET THE SLUG, ex. 'posts', 'pages', etc.
            $slug = $request->get('slug');

            // GET image name
            $image = $request->get('image');

            // GET record id
            $id = $request->get('id');

            // GET field name
            $field = $request->get('field');

            // GET THE DataType based on the slug
            $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

            // Check permission
            Voyager::canOrFail('delete_' . $dataType->name);

            // Load model and find record
            $model = app($dataType->model_name);
            $data = $model::find([$id])->first();

            // Check if field exists
            if (!isset($data->{$field})) {
                throw new Exception(__('voyager::generic.field_does_not_exist'), 400);
            }

            // Check if valid json
            if (is_null(@json_decode($data->{$field}))) {
                throw new Exception(__('voyager::json.invalid'), 500);
            }

            // Decode field value
            $fieldData = @json_decode($data->{$field}, true);

            // Flip keys and values
            $fieldData = array_flip($fieldData);

            // Check if image exists in array
            if (!array_key_exists($image, $fieldData)) {
                throw new Exception(__('voyager::media.image_does_not_exist'), 400);
            }

            // Remove image from array
            unset($fieldData[$image]);

            // Generate json and update field
            $data->{$field} = json_encode(array_values(array_flip($fieldData)));
            $data->save();

            return response()->json([
                'data' => [
                    'status' => 200,
                    'message' => __('voyager::media.image_removed'),
                ],
            ]);
        } catch (Exception $e) {
            $code = 500;
            $message = __('voyager::generic.internal_error');

            if ($e->getCode()) {
                $code = $e->getCode();
            }

            if ($e->getMessage()) {
                $message = $e->getMessage();
            }

            return response()->json([
                'data' => [
                    'status' => $code,
                    'message' => $message,
                ],
            ], $code);
        }
    }

}
