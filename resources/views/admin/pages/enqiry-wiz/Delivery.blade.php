<div class="row m-0">
    <div class="col-12 pt-3">
        <div class="card">
            <div class="card-header">
                Move to project
            </div>
            <div class="card-body">
                <h3>Lorem, ipsum dolor sit amet consectetur adipisicing.</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis voluptas adipisci repudiandae dolores quis et quas repellendus eius, earum alias consequuntur dicta esse magnam voluptates deleniti deserunt sunt quos veniam?</p>
                <button class="btn-primary btn">Explore</button>
            </div>
        </div>        
    </div> 
</div>
<style>
       .my-control {
        border-radius: 0 !important;
        display: flex !important;
        justify-content: center ;
        align-content: center ;
        width: 100%;
        height: 100%;
        margin: 0 !important;
        border: 1px !important;
        outline: 0 !important;
    }
    .form-select {
       padding: 2px 2px 2px 10px !important;
       border:0px !important;
       min-width: 120px !important;
       background-size: 9px 14px !important;
       font-size: 12px !important;
    }
    .form-select option {
        appearance: none !important;
    }
    
</style>

@if (Route::is('admin-Delivery-wiz')) 
    <style>
        .admin-Delivery-wiz .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
    </style>
@endif