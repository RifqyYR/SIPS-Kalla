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
            var form = document.getElementById("delete-form");
            var action = "/admin-management/delete/UUID_PLACEHOLDER";
            form.action = action.replace("UUID_PLACEHOLDER", uuid);
            form.submit();
        }
    });
}
