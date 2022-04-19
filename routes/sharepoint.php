<?php
use Illuminate\Support\Facades\Route;
use Office365\SharePoint\ClientContext;
use Office365\Runtime\Auth\ClientCredential;
use Office365\Runtime\Auth\UserCredentials;
use Office365\SharePoint\ListItem;

Route::get('credentials', function(){
    
    // $credentials = new ClientCredential("{client-id}", "{client-secret}");
    // $client = (new ClientContext("https://{your-tenant-prefix}.sharepoint.com"))->withCredentials($credentials);     
    $credentials = new ClientCredential("47e46fb2-ec3b-4927-9596-290f5976be4d", "qkASV5P8TZ6Zru9+oJsfs3Gep9KF2rP5JyoCfd2ZxzI=");
    $client = (new ClientContext("https://aecprefab.sharepoint.com"))->withCredentials($credentials);     
 
    $web = $client->getWeb();
    $list = $web->getLists()->getByTitle("aecdemo"); //init List resource
    $items = $list->getItems();  //prepare a query to retrieve from the 
    $client->load($items);  //save a query to retrieve list items from the server 
    $client->executeQuery(); //submit query to SharePoint server
    /** @var ListItem $item */
    foreach($items as $item) {
        echo "Task: {$item->getProperty('Title')}\r\n";
    }
});