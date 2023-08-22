function getPageInfo(page) {
    const pageInfo = pageData[page - 1]; // 使用頁數索引獲取對應的數據
    if (pageInfo) {
        return pageInfo;
    }
    return { color: '#f4f4f4', text: `page ${page}` }; // 默認顏色和空文字
}

$(document).ready
    (function () {
        $("#flipbook").turn({
            width: 400,
            height: 300,
            autoCenter: true
        });
        var data = readGameData();
        printCookie();
        day= numOfdays(data);
        
        const pageLen= day;
        for (let i = 0; i < pageData.length; i++) {
            const pageDiv = document.createElement('div');
            pageDiv.className = 'page';
            pageDiv.style.backgroundColor = pageData[i].color;
            pageDiv.textContent = pageData[i].text;
            $("#flipbook").append(pageDiv);
        }

        // 根據頁面獲取背景顏色和文字

    });