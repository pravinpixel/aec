<?php

namespace App\Http\Controllers\Bim360;

use Illuminate\Http\Request;
use PhpParser\Node\Expr;
use Exception;
use App\Helper\Bim360\Bim360ApiHelper;
use App\Helper\Bim360\Bim360CompaniesApi;
use App\Helper\Bim360\Bim360Company;
use App\Http\Controllers\Controller;
use DateTime;


class BIM360CompanyController extends Controller
{
    public function list()
    {
        return view('bim360.companies.list');
    }

    public function getCompanyList()
    {
        $api = new  Bim360CompaniesApi();
        $result = $api->getCompanyList();
        if (!$result) {
            return response()->json(array());
        }

        $responseData = json_decode($result);
        return response()->json($responseData);
    }

    public function create()
    {
        return view('bim360.companies.create');
    }

    public function getCompany(Request $request)
    {
        $data = $request->all();
        $api = new  Bim360CompaniesApi();
        $result = $api->getCompany($data["id"]);
        $data = json_decode($result);

        $data->image = 'http://localhost:8012/aecportal/public/media/logos/logo.png';

        $existingImage = glob('/uploads/company/image/' . $data->id . '.*');
        if (!empty($existingImage)) {
            $data->image = $existingImage[0];
        }

        return view('bim360.companies.details', compact('data'));
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $api = new  Bim360CompaniesApi();
        $result = $api->getCompany($data["id"]);
        $data = json_decode($result);

        $data->image = 'http://localhost:8012/aecportal/public/media/logos/logo.png';

        $existingImage = glob('/uploads/company/image/' . $data->id . '.*');
        if (!empty($existingImage)) {
            $data->image = $existingImage[0];
        }

        return view('bim360.companies.edit', compact('data'));
    }

    public function save(Request $request)
    {
        try {
            $result = "";
            $input = $request->input();
            $api = new  Bim360CompaniesApi();
            if (isset($input["id"]) && !empty($input["id"])) {
                $editJson = Bim360Company::getCreateData(
                    $input["id"],
                    $input["name"],
                    $input["trade"],
                    $input["website_url"],
                    $input["description"],
                    $input["erp_id"],
                    $input["tax_id"],
                    $input["phone"],
                    $input["address_line_1"],
                    $input["address_line_2"],
                    $input["city"],
                    $input["state_or_province"],
                    $input["postal_code"],
                    $input["country"]
                );
                $result = $api->editCompany($input["id"], $editJson);
            } else {
                $createJson = json_encode($input);
                $result = $api->createCompany($createJson);
            }
            $data = json_decode($result);
            if (isset($data->id)) {
                $id = $data->id;
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    // Moving uploaded image to local folder
                    $info = pathinfo($_FILES['image']['name']);
                    $ext = $info['extension']; // get the extension of the file
                    $newname = $id . '.' . $ext;
                    $target = '/uploads/company/image/' . $newname;
                    if (!file_exists('/uploads/company/image')) {
                        mkdir('/uploads/company/image', 0777, true);
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
            $existingImage = glob('/uploads/company/image/' . $data->id . '.*');
            if (!empty($existingImage)) {
                $data->image = $existingImage[0];
            }
            return response()->json($data);
        } catch (Exception $ex) {
            throw ($ex);
        }
    }
}
