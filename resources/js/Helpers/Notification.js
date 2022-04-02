class Notification {
    success() {
        new Noty({
            type: "success",
            layout: "TopRight",
            text: "Successfully Done !",
            timeout: 1000,
        }).show();
    }
    alert() {
        new Noty({
            type: "alert",
            layout: "TopRight",
            text: "Are you sure ?",
            timeout: 1000,
        }).show();
    }
    error() {
        new Noty({
            type: "alert",
            layout: "TopRight",
            text: "something went wrong !",
            timeout: 1000,
        }).show();
    }
    warning() {
        new Noty({
            type: "warning",
            layout: "TopRight",
            text: "Opps wrong !",
            timeout: 1000,
        }).show();
    }
}
export default Notification = new Notification();
