Message = function (type, head) {
    $.toast({
        heading: head,
        icon: type,
        showHideTransition: 'plain', 
        allowToastClose: true,
        hideAfter: 5000,
        stack: 10, 
        position: 'bootom-left',
        textAlign: 'left', 
        loader: true, 
        loaderBg: '#252525',                
    });
}