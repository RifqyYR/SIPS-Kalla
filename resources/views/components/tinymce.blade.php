<script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.apikey') }}/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: "textarea#description",
        plugins: [
            "advlist",
            "autolink",
            "link",
            "lists",
            "charmap",
            "anchor",
            "searchreplace",
            "visualblocks",
            "visualchars",
            "code",
            "insertdatetime",
            "table",
            "help",
        ],
        toolbar: "undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | " +
            "bullist numlist outdent indent | link | code | help",
        menubar: "file edit view insert format tools table help",
    });
</script>
