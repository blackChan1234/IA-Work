$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "getData.php",
        dataType: "json",
        success: function (obj) {
            var key = [];
            obj.forEach(function (file) {
                key.push(file.fileName);
                key.push(file.userName);
            });
            key = key.filter(function(value, index, self) {
                return self.indexOf(value) === index;
            });
            console.log(key);

            // 自動完成搜索
            $("#searchInput").autocomplete({
                source: key
            });
        }
    });
});