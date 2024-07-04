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
            }
        }
    });
}

// Filter input only number on phone number input
document.getElementById("phone_number").addEventListener("input", function (e) {
    e.target.value = e.target.value.replace(/\D/g, "");
});
