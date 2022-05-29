class Notification {
    success() {
        new Noty({
            type: "success",
            layout: "topRight",
            text: "Successfully Done!",
            timeout: "3000",
        }).show();
    }
    alert() {
        new Noty({
            type: "alert",
            layout: "topRight",
            text: "Are you Sure?",
            timeout: "3000",
        }).show();
    }
    error() {
        new Noty({
            type: "alert",
            layout: "topRight",
            text: "Something Went Wrong!",
            timeout: "3000",
        }).show();
    }
    warning() {
        new Noty({
            type: "warning",
            layout: "topRight",
            text: "Opps Wrong!",
            timeout: "3000",
        }).show();
    }

    image_validation() {
        new Noty({
            type: "error",
            layout: "topRight",
            text: "Upload Image less than 1MB",
            timeout: "3000",
        }).show();
    }
}

export default Notification = new Notification();
