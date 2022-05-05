<?php

namespace App\Http\Controllers\Bim360;

use Illuminate\Http\Request;
use Exception;
use App\Helper\Bim360\Bim360UsersApi;
use App\Http\Controllers\Controller;

class Bim360UserController extends Controller
{
    public function list()
    {
        return view('bim360.users.list');
    }

    public function getUserList()
    {
        $api = new  Bim360UsersApi();
        $result = $api->getUserList();
        if (!$result) {
            return response()->json(array());
        }

        $responseData = json_decode($result);
        return response()->json($responseData);
    }

    public function create()
    {
        return view('bim360.users.create');
    }

    public function getUser(Request $request)
    {
        $data = $request->all();
        $api = new  Bim360UsersApi();
        $result = $api->getUser($data["id"]);
        $data = json_decode($result);

        $data->image = 'http://localhost:8012/aecportal/public/media/logos/logo.png';

        $existingImage = glob('/uploads/user/image/' . $data->id . '.*');
        if (!empty($existingImage)) {
            $data->image = $existingImage[0];
        }

        return view('bim360.users.details', compact('data'));
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $api = new  Bim360UsersApi();
        $result = $api->getUser($data["id"]);
        $data = json_decode($result);

        $data->image = 'http://localhost:8012/aecportal/public/media/logos/logo.png';

        $existingImage = glob('/uploads/user/image/' . $data->id . '.*');
        if (!empty($existingImage)) {
            $data->image = $existingImage[0];
        }

        return view('bim360.users.edit', compact('data'));
    }

    public function save(Request $request)
    {
        try {
            $result = "";
            $input = $request->input();
            $api = new  Bim360UsersApi();
            
            if (isset($input["id"]) && !empty($input["id"])) {
                $editJson = json_encode($input);
                $result = $api->editUser($input['id'], $editJson);
            } else {
                $createJson = json_encode($input);
                $result = $api->createUser($createJson);
            }
            $data = json_decode($result);
            if (isset($data->id)) {
                $id = $data->id;
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    // Moving uploaded image to local folder
                    $info = pathinfo($_FILES['image']['name']);
                    $ext = $info['extension']; // get the extension of the file
                    $newname = $id . '.' . $ext;
                    $target = '/uploads/user/image/' . $newname;
                    if (!file_exists('/uploads/user/image')) {
                        mkdir('/uploads/user/image', 0777, true);
                    }
                    $filePath = $_FILES['image']['tmp_name'];
                    move_uploaded_file($filePath, $target);

                    // Uploading image to BIM360
                    $data = array(
                        'tmp_name' => realpath($target),
                        'type' => $_FILES['image']['type'],
                        'name' => $newname
                    );
                    $patchImageResult = $api->patchImage($id, $data);
                    if (isset(json_decode($patchImageResult)->id)) {
                        echo "Image successfully uploaded.";
                    }
                }
            }

            $existingImage = glob('/uploads/user/image/' . $data->id . '.*');
            if (!empty($existingImage)) {
                $data->image = $existingImage[0];
            }

            return response()->json($data);
        } catch (Exception $ex) {
            throw ($ex);
        }
    }
}
