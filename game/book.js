function getPageInfo(page) {
    try {
    const pageInfo = pageData[page]; // 使用頁數索引獲取對應的數據
    if (pageInfo) {
        return pageInfo;
    }
}
finally{
    return { text: `page ${page+1}` }; // 默認顏色和空文字
}
}

function setPageData(page,date){
    if (!checkCookie("Book")) {
        // create new game data
        var expirationDate = new Date();
        var Book = {
            pages: page,
            date: date
        };
    
        var jsonData = JSON.stringify(Book);
    
    
        expirationDate.setDate(expirationDate.getDate() + 30);
    
        // document.cookie = "game_data=" + jsonData + "; expires=" + expirationDate.toUTCString() + "; path=/";
        setCookie("Book", jsonData, expirationDate.toUTCString());

      }
}

function getExpirationDate(){
    var expirationDate = new Date();
    return expirationDate.getDate();
}

function readBookData() {
    var jsonData = getCookie("Book");
    return JSON.parse(jsonData);
  }
function aPage(){
    const pageDiv = document.createElement('div');
        pageDiv.className = 'hard';
    return pageDiv;

}

$(document).ready
    (function () {
        day=0; 
        var data;
        if (checkCookie("game_data")) {
        data = readGameData();
        printGameCookie();
        day=numOfdays(data);
        }
        
        
        /*
        <div class="hard"> Turn.js </div> 
        <div class="hard"></div>
        <div> Page 1 </div>
        <div> Page 2 </div>
        <div> Page 3 </div>
        <div> Page 4 </div>
        <div class="hard"></div>
        <div class="hard"></div>
        
        */ 
        pageLen=day;
        pageLen++;
        bookTitle="T";

        pageFirst=aPage();
        pageFirst.textContent= bookTitle;
        $("#flipbook").append(pageFirst);
        $("#flipbook").append(aPage());
        
        for (let i = 0; i < pageLen; i++) {
            const pageDiv = document.createElement('div');
            pageDiv.className = 'page';
            const pageDiv2 =document.createElement('div');
            pageDiv2.textContent = "day"+i+1;
            pageDiv.append(pageDiv2);

            const pageDiv3 =document.createElement('div');
            pageDiv2.textContent = data.gameTime[i];
            pageDiv.append(pageDiv3);
            pageDiv.textContent = getPageInfo(i).text;
            $("#flipbook").append(pageDiv);
        }

        $("#flipbook").append(aPage());
        $("#flipbook").append(aPage());
       
        // 根據頁面獲取背景顏色和文字
        $("#flipbook").turn({
            width: 400,
            height: 300,
            autoCenter: true
        });

    });