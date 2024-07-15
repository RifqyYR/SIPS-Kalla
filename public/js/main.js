function isCustomerDetailPage(url) {
    // Split the URL path by "/" to get individual segments
    const pathSegments = url.split("/");

    // Check if there are at least 3 segments (base path, "customer", and customer ID)
    if (pathSegments.length >= 3) {
        // Check if the second segment is "customer" (case-sensitive)
        if (pathSegments[3] === "customer") {
            // Check if the third segment matches the expected customer ID format
            const customerIdRegex = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/; // Regex for UUID format
            return customerIdRegex.test(pathSegments[4]);
        }
    }
    return false;
} 

function confirmDelete(uuid) {
    Swal.fire({
        title: "HAPUS",
        text: "Apakah Anda yakin ingin menghapus data ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#01803D",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            if (isCustomerDetailPage(window.location.href)) {
                var form = document.getElementById("delete-form");
                var action = "/customer/car/delete/UUID_PLACEHOLDER";
                form.action = action.replace("UUID_PLACEHOLDER", uuid);
                form.submit();
            }

            if (window.location.href.indexOf("admin-management") > -1) {
                var form = document.getElementById("delete-form");
                var action = "/admin-management/delete/UUID_PLACEHOLDER";
                form.action = action.replace("UUID_PLACEHOLDER", uuid);
                form.submit();
            } else if (window.location.href.indexOf("promo") > -1) {
                var form = document.getElementById("delete-form");
                var action = "/promo/delete/UUID_PLACEHOLDER";
                form.action = action.replace("UUID_PLACEHOLDER", uuid);
                form.submit();
            } else if (window.location.href.indexOf("pic") > -1) {
                var form = document.getElementById("delete-form");
                var action = "/pic/delete/UUID_PLACEHOLDER";
                form.action = action.replace("UUID_PLACEHOLDER", uuid);
                form.submit();
            } else if (window.location.href.indexOf("sales") > -1) {
                var form = document.getElementById("delete-form");
                var action = "/sales/delete/UUID_PLACEHOLDER";
                form.action = action.replace("UUID_PLACEHOLDER", uuid);
                form.submit();
            } else if (window.location.href.indexOf("customer") > -1 && !isCustomerDetailPage(window.location.href)) {
                var form = document.getElementById("delete-form");
                var action = "/customer/delete/UUID_PLACEHOLDER";
                form.action = action.replace("UUID_PLACEHOLDER", uuid);
                form.submit();
            }
        }
    });
}

// Filter input only number on phone number input
document.getElementById("phone_number").addEventListener("input", function (e) {
    e.target.value = e.target.value.replace(/\D/g, "");
});