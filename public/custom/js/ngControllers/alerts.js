Message = function (type, head) {
    $("#alert").html(`
        <div class="alert alert-custom alert-${type} fade show center" role="alert" data-bs-dismiss="alert" aria-label="Close-text">
            <strong>${head}</strong>
        </div>
    `);
    $("#alert").fadeTo(3000, 1000).slideUp(1000, function(){
        $("#alert").slideUp(5000);
    });
} 

const notifications = document.querySelector(".notifications")
const toastDetails = {
    timer: 5000,
    success: {
        class:'success-text',
        icon: 'fa-solid fa-circle-check',
    },
    error: {
        class:'error-text',
        icon: 'fa-solid fa-circle-xmark',
    },
    warning: {
        class:'warning-text',
        icon: 'fa-solid fa-triangle-exclamation',
    },
    info: {
        class:'info-text',
        icon: 'fa-solid fa-circle-info',
    }
}

const Alert = {
    removeToast :function (Toaster) {
        Toaster.classList.add("hide");
        if (Toaster.timeoutId) clearTimeout(Toaster.timeoutId); // Clearing the timeout for the toast
        setTimeout(() => Toaster.remove(), 500); // Removing the toast after 500ms
    },
    createToast :function (type, message) {
        const Toaster = document.createElement("li"); 
        Toaster.className = `shadow-lg border alert-toaster ${type}`;
        Toaster.innerHTML = `
            <div class="column">
                <i class="${toastDetails[type]['icon']}"></i> 
                <span class="${toastDetails[type]['class']}"><b>${message}</b></span> 
            </div> 
            <i class="fa-solid fa-xmark" onclick="Alert.removeToast(this.parentElement)"></i>
        `;
        notifications.appendChild(Toaster); // Append the toast to the notification ul
        Toaster.timeoutId = setTimeout(() => this.removeToast(Toaster), toastDetails.timer);
    }, 
    success: function (message) {
        this.createToast('success', message)
    },
    error: function (message) {
        this.createToast('error', message)
    },
    warning: function (message) {
        this.createToast('warning', message)
    },
    info: function (message) {
        this.createToast('info', message)
    } 
}; 
