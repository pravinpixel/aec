<?php

namespace App\Http\Controllers\Sharepoint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Office365\SharePoint\ClientContext;
use Office365\Runtime\Auth\ClientCredential;
use Office365\SharePoint\ListItem;

class SharepointController extends Controller
{
    protected $client;
    public function __construct()
    {
        $credentials = new ClientCredential(config('services.sharepoint.client_id'), config('services.sharepoint.client_secret'));
        $this->client = (new ClientContext(config('services.sharepoint.site_url')))->withCredentials($credentials);
    }
    public function create(Request $request)
    {
        $itemProperties = array('Title' =>  $request->title, 'Body' => 'Order approval task');
        $list = $this->client->getWeb()->getLists()->getByTitle("Tasks");
        $item = $list->addItem($itemProperties);
        $this->client->executeQuery();
        print "Task {$item->getProperty('Title')}";
    }

    public function delete($id)
    {
        $list = $this->client->getWeb()->getLists()->getByTitle("Tasks");
        $listItem = $list->getItemById($id);
        $listItem->deleteObject();
        $this->client->executeQuery();
    }

    public function update($id)
    {
        $list = $this->client->getWeb()->getLists()->getByTitle("Tasks");
        $listItem = $list->getItemById($id);
        $listItem->setProperty('PercentComplete',1);
        $listItem->update();
        $this->client->executeQuery();
    }
}
