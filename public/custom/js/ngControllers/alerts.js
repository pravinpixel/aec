Message = function (type, head) {
    $("#alert").html(`
        <div class="alert alert-custom alert-${type} fade show text-center" role="alert" data-bs-dismiss="alert" aria-label="Close">
            <strong>${head}</strong> 
        </div>
    `);
    $("#alert").fadeTo(3000, 1000).slideUp(1000, function(){
        $("#alert").slideUp(5000);
    }); 
}