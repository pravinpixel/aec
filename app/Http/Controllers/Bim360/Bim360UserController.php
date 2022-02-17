<?php

namespace App\Http\Controllers\Bim360;

use Illuminate\Http\Request;
use PhpParser\Node\Expr;
use Exception;
use App\Helper\Bim360\Bim360ApiHelper;
use App\Helper\Bim360\bim360Api;
use App\Helper\Bim360\bim360;
use App\Helper\Bim360\Bim360UsersApi;
use App\Http\Controllers\Controller;
use DateTime;

class Bim360UserController extends Controller
{
    public function list()
    {
        return view('bim360.users.list');
    }

    public function getUserList()
    {
        $api = new  Bim360ApiHelper();
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
        $api = new  bim360Api();
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
        $api = new  bim360Api();
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
            $api = new  bim360Api();

            if (isset($input["id"]) && !empty($input["id"])) {
                $editJson = bim360::getCreateData(
                    $input["email"],
                    $input["company_id"],
                    $input["nickname"],
                    $input["first_name"],
                    $input["last_name"],
                    $input["image_url"],
                    $input["phone"],
                    $input["address_line_1"],
                    $input["address_line_2"],
                    $input["city"],
                    $input["state_or_province"],
                    $input["postal_code"],
                    $input["country"],
                    $input["company"],
                    $input["job_title"],
                    $input["industry"],
                    $input["about_me"]
                );
                $result = $api->editUser($input["id"], $editJson);
            } else {
                $createJson = bim360::getCreateData(
                    $input["email"],
                    $input["company_id"],
                    $input["nickname"],
                    $input["first_name"],
                    $input["last_name"],
                    $input["image_url"],
                    $input["phone"],
                    $input["address_line_1"],
                    $input["address_line_2"],
                    $input["city"],
                    $input["state_or_province"],
                    $input["postal_code"],
                    $input["country"],
                    $input["company"],
                    $input["job_title"],
                    $input["industry"],
                    $input["about_me"]
                );
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
