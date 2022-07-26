<?php

namespace App\Interfaces;

use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\Service;

interface CustomerEnquiryRepositoryInterface
{
    public function create(array  $data);

    public function getCustomer(int $id);

    public function createCustomerEnquiryProjectInfo($enquiry_number, Customer $customer, array $data);

    public function createCustomerEnquiryServices(Enquiry $enquiry, $services);

    public function getEnquiry($enquiry_id);

    public function getEnquiryByEnquiryNo($enquiryId);

    public function getEnquiryByCustomerEnquiryNo($customerEnquiryNumber);

    public function updateEnquiry(Enquiry $enquiry , $data);

    public function createEnquiryDocuments(Enquiry $enquiry, $documents, array $additionalData);

    public function getPlanViewList($id);

    public function getFacaeViewList($id);

    public function getIFCViewList($id);

    public function getViewList($id, $type_id);

    public function deleteDocumentEnquiry($id);

    public function delete($id);

    public function storeBuildingComponent($enquiry,$data);

    public function storeTechnicalEstimateCost($enquiry,$data);

    public function storeCostEstimation($enquiry,$data);

    public function updateTechnicalEstimateCost($enquiry,$data);

    public function getBuildingComponent($enquiry);

    public function getEnquiryByID($id);

    public function updateWizardStatus($enquiry, $column);

    public function formatEnqInfo($enquiry);

    public function formatProjectInfo($enquiry);

    public function updateStatusById($enquiry, $status);

    public function updateProjectById($id, $status);

    public function createEnquiryBuildingComponentDocument($storeData);

    public function getCostEstimateByEnquiryId($id);

    public function moveToCancel($id);

    public function moveToActive($id);

    public function getEnquiryComments($id);

    public function AddEnquiryReferenceNo($enquiry);

    public function deleteAndGetBuildingComponentDocument($id);

    public function updateNewEnquiryStatus($id);

    public function updateAdminWizardStatus($enquiry, $status);

    public function updateFollowUp($id, $data);
}