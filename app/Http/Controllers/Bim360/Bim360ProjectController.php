<?php

namespace App\Http\Controllers\Bim360;

use Illuminate\Http\Request;
use PhpParser\Node\Expr;
use Exception;
use App\Helper\Bim360\Bim360ApiHelper;
use App\Helper\Bim360\Bim360Project;
use App\Helper\Bim360\Bim360ProjectsApi;
use App\Http\Controllers\Controller;
use DateTime;

use function PHPUnit\Framework\throwException;

class Bim360ProjectController extends Controller
{
    public function liveProjects()
    {
        return view('bim360.projects.live');
    }

    public function pendingProjects()
    {
        return view('bim360.projects.pending');
    }

    public function inactiveProjects()
    {
        return view('bim360.projects.inactive');
    }

    public function archivedProjects()
    {
        return view('bim360.projects.archived');
    }

    public function createProject()
    {
        return view('bim360.projects.create');
    }

    public function saveProject(Request $request)
    {

        try {
            $result = "";
            $input = $request->input();
            $api = new  Bim360ProjectsApi();
            if (isset($input["id"]) && !empty($input["id"])) {
                $createJson = Bim360Project::getEditData(
                    $input["id"],
                    $input["name"],
                    $input["start_date"],
                    $input["end_date"],
                    $input["project_type"],
                    $input["value"],
                    $input["currency"],
                    $input["job_number"],
                    $input["address_line_1"],
                    $input["address_line_2"],
                    $input["city"],
                    $input["state_or_province"],
                    $input["postal_code"],
                    $input["country"],
                    $input["timezone"],
                    $input["language"],
                    $input["construction_type"],
                    $input["contract_type"],
                    $input['service_types'],
                    $input['status']
                );
                $result = $api->editProject($input["id"], $createJson);
            } else {
                $projectJson = Bim360Project::getCreateData(
                    $input["name"],
                    $input["start_date"],
                    $input["end_date"],
                    $input["project_type"],
                    $input["value"],
                    $input["currency"],
                    $input["job_number"],
                    $input["address_line_1"],
                    $input["address_line_2"],
                    $input["city"],
                    $input["state_or_province"],
                    $input["postal_code"],
                    $input["country"],
                    $input["timezone"],
                    $input["language"],
                    $input["construction_type"],
                    $input["contract_type"]
                );
                $result = $api->createProject($projectJson);
            }

            $resultObj = json_decode($result);
            if (isset($resultObj->id)) {
                $id = $resultObj->id;
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {

                    // Moving uploaded image to local folder
                    $info = pathinfo($_FILES['image']['name']);
                    $ext = $info['extension']; // get the extension of the file
                    $newname = $id . '.' . $ext;
                    $target = '/uploads/project/image/' . $newname;
                    if (!file_exists('/uploads/project/image')) {
                        mkdir('/uploads/project/image', 0777, true);
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

            return response()->json($resultObj);
        } catch (Exception $ex) {
            throwException($ex);
        }
    }

    public function getLiveProjects()
    {
        return $this->getProjectListByStatus("active");
    }

    public function getPendingProjects()
    {
        return $this->getProjectListByStatus("pending");
    }

    public function getInactiveProjects()
    {
        return $this->getProjectListByStatus("inactive");
    }

    public function getArchivedProjects()
    {
        return $this->getProjectListByStatus("archived");
    }

    private function getProjectListByStatus($status)
    {
        $api = new  Bim360ProjectsApi();
        $result = $api->getProjectList($status);
        if (!$result) {
            return response()->json(array());
        }

        $responseData = json_decode($result);

        if ($status) {
            $filteredData = array();
            foreach ($responseData as $item) {
                if ($item->status == $status) {
                    array_push($filteredData, $item);
                }
            }
            $responseData = $filteredData;
        }
        return response()->json($responseData);
    }

    public function getProject(Request $request)
    {
        $data = $request->all();
        $api = new  Bim360ProjectsApi();
        $result = $api->getProject($data["id"]);
        $data = json_decode($result);

        $data->image = 'http://localhost:8012/aecportal/public/media/logos/logo.png';

        $existingImage = glob('/uploads/project/image/' . $data->id . '.*');
        if (!empty($existingImage)) {
            $data->image = $existingImage[0];
        }

        return view('bim360.projects.details', compact('data'));
    }

    public function editProject(Request $request)
    {
        $data = $request->all();
        $api = new  Bim360ProjectsApi();
        $result = $api->getProject($data["id"]);
        $data = json_decode($result);

        $data->image = 'http://localhost:8012/aecportal/public/media/logos/logo.png';

        $existingImage = glob('/uploads/project/image/' . $data->id . '.*');
        if (!empty($existingImage)) {
            $data->image = $existingImage[0];
        }

        return view('bim360.projects.edit', compact('data'));
    }

    public function getProjectUsers(Request $request)
    {
        $data = $request->all();
        $api = new  Bim360ProjectsApi();
        $result = $api->getProjectUsers($data["id"]);
        $data = json_decode($result);
        return response()->json($data);
    }

    public function getAccountUsers()
    {
        $api = new  Bim360ProjectsApi();
        $result = $api->getAccountUsers();
        $data = json_decode($result);
        return response()->json($data);
    }
}
