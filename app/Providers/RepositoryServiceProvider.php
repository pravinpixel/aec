<?php

namespace App\Providers;

use App\Interfaces\BuildingComponentRepositoryInterface;
use App\Interfaces\BuildingTypeRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\CustomerLayerRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\DeliveryTypeRepositoryInterface;
use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Interfaces\DocumentTypeRepositoryInterface;
use App\Interfaces\LayerRepositoryInterface;
use App\Interfaces\LayerTypeRepositoryInterface;
use App\Interfaces\OutputTypeRepositoryInterface;
use App\Interfaces\ProjectTypeRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\ModuleRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\DocumentaryRepositoryInterface;
use App\Interfaces\EnquiryTemplateRepositoryInterface;
use App\Interfaces\MailTemplateRepositoryInterface;
use App\Repositories\BuildingComponentRepository;
use App\Repositories\BuildingTypeRepository;
use App\Repositories\CommentRepository;
use App\Repositories\CustomerEnquiryRepository;
use App\Repositories\CustomerLayerRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\DeliveryTypeRepository;
use App\Repositories\DocumentTypeEnquiryRepository;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\LayerRepository;
use App\Repositories\LayerTypeRepository;
use App\Repositories\OutputTypeRepository;
use App\Repositories\ProjectTypeRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\UserRepository;
use App\Repositories\ModuleRepository;
use App\Repositories\RoleRepository;
use App\Repositories\DocumentaryRepository;
use App\Repositories\EnquiryTemplateRepository;
use App\Repositories\MailTemplateRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ServiceRepositoryInterface::class, 
            ServiceRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class, 
            UserRepository::class
        );
        $this->app->bind(
            CustomerRepositoryInterface::class, 
            CustomerRepository::class
        );

        $this->app->bind(
            CustomerEnquiryRepositoryInterface::class, 
            CustomerEnquiryRepository::class
        );

        $this->app->bind(
            BuildingTypeRepositoryInterface::class,
            BuildingTypeRepository::class
        );
        $this->app->bind(
            DeliveryTypeRepositoryInterface::class,
            DeliveryTypeRepository::class
        );
        $this->app->bind(
            ProjectTypeRepositoryInterface::class,
            ProjectTypeRepository::class
        );

        $this->app->bind(
            DocumentTypeRepositoryInterface::class,
            DocumentTypeRepository::class
        );
        
        $this->app->bind(
            BuildingComponentRepositoryInterface::class,
            BuildingComponentRepository::class
        );

        $this->app->bind(
            LayerRepositoryInterface::class,
            LayerRepository::class
        );

        $this->app->bind(
            LayerTypeRepositoryInterface::class,
            LayerTypeRepository::class
        );

        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );

        $this->app->bind(
            DocumentTypeEnquiryRepositoryInterface::class,
            DocumentTypeEnquiryRepository::class
        );

        $this->app->bind(
            OutputTypeRepositoryInterface::class,
            OutputTypeRepository::class
        );

        $this->app->bind(
            CustomerLayerRepositoryInterface::class,
            CustomerLayerRepository::class
        );
        
        $this->app->bind(
            ModuleRepositoryInterface::class,
            ModuleRepository::class
        );
        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );
        $this->app->bind(
            DocumentaryRepositoryInterface::class,
            DocumentaryRepository::class
        );
        $this->app->bind(
            MailTemplateRepositoryInterface::class,
            MailTemplateRepository::class
        );
        
        $this->app->bind(
            EnquiryTemplateRepositoryInterface::class,
            EnquiryTemplateRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
