$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "getData.php",
        dataType: "json",
        success: function (obj) {
            var key = [];
            obj.forEach(function (file) {
                key.push(file.filename);
                key.push(file.uploader);
            });
            console.log(key);

            // 自動完成搜索
            $("#searchInput").autocomplete({
                source: key
            });
        }
    });
});