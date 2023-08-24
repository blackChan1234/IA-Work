allPageData=[];
fetch('pageData.json')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(jsonData => {
    // Now you can work with the jsonData
    allPageData = (jsonData);
    showBook();
  })
  .catch(error => {
    console.error('Error fetching JSON:', error);
  });


function setPageData(data) {
        // create new game data
        var expirationDate = new Date();
        var Book = {
            data: data
        };

        var jsonData = JSON.stringify(Book);


        expirationDate.setDate(expirationDate.getDate() + 30);

        // document.cookie = "game_data=" + jsonData + "; expires=" + expirationDate.toUTCString() + "; path=/";
        setCookie("Book", jsonData, expirationDate.toUTCString());

    
}

function getExpirationDate() {
    var expirationDate = new Date();
    return expirationDate.getDate();
}
function getExpirationTime() {
    var expirationDate = new Date();
    return expirationDate.getTime();
}

function readBookData() {
    var jsonData = getCookie("Book");
    return JSON.parse(jsonData);
}
function aPage() {
    const pageDiv = document.createElement('div');
    pageDiv.className = 'hard';
    return pageDiv;

}
function newLine(elementOfParent, text) {
    div = document.createElement('div');
    div.textContent = text;
    elementOfParent.append(div);
}
function addNewElement(elementOfParent, text,type) {
    div = document.createElement(type);
    div.textContent = text;
    elementOfParent.append(div);
}

function targetGameTimeIsEmpty(num){
    return readGameData().gameTime.length<=num;
}
function targetReadTimeIsEmpty(num){
    return readGameData().readTime.length<=num;
}

function getPageInfo(page) {
    try {
        if (!targetGameTimeIsEmpty(page)||!targetReadTimeIsEmpty(page)){   
            gData=readGameData();
            bookData=[];
            notBreak=true;
            if(checkCookie("Book")){ 
                bookData=readBookData().data;
                if(bookData.length>page)
                notBreak=false;
            }
            if(notBreak){
            gT=0;
            rT=0;
            eachCategoryLength =10;
            seed=Math.floor(Math.random() * eachCategoryLength);
            if (!targetGameTimeIsEmpty(page)){
                gt=gData.gameTime[page];
            }
            if (!targetReadTimeIsEmpty(page)){
                rt=gData.readTime[page];
            }
            // if(gt<rT){
            //     seed+=10;
            // }
            // if(gt>rT){
            //     seed+=20;
            // }
            // if(gt==0 && rT==0){
            //     seed+=30;
            // }
            bookData[page]=seed;
            setPageData(bookData);
            console.log(bookData);
        }
        }
        pageInfo = allPageData[readBookData().data[page]]; // 使用頁數索引獲取對應的數據
        console.log(pageInfo);
            return pageInfo;
        
    }
    catch (e) {
        return  `page ${page + 1}` ; // 默認顏色和空文字
    }
}
 function showBook() {
        day = 0;
        var data;
        if (checkCookie("game_data")) {
            data = readGameData();
            printGameCookie();
            day = numOfdays(data);
            if(day>=30){
                day = 30;
            }
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
        pageLen = day;
        pageLen++;
        bookTitle = "Diary";
        eggDiv = document.createElement('div');
        eggDiv.className = 'egg';
        eggContainerDiv = document.createElement('div');
        eggContainerDiv.className = 'egg-animation-container';

        

        pageFirstTitle = document.createElement("h2");
        pageFirstTitle.textContent = bookTitle;
        

        pageFirst = aPage();
        pageFirst.append(pageFirstTitle);

        eggContainerDiv.append(eggDiv);
        pageFirst.append(eggContainerDiv);

        $("#flipbook").append(pageFirst);
        $("#flipbook").append(aPage());

        for (let i = 0; i < pageLen; i++) {
            const pageDiv = document.createElement('div');
            pageDiv.className = 'page';
            addNewElement(pageDiv, "day" + (i + 1),"h3");
            if (data.gameTime.length > i) {
                if (data.gameTime!=null||data.gameTime!=0) {
                newLine(pageDiv, "game time:"+data.gameTime[i]+" hours");
                }
            }
            if (data.readTime.length > i) {
                if (data.readTime!=null||data.readTime!=0) {
                newLine(pageDiv, "read time:"+data.readTime[i]+" hours");
            }
        }
        addNewElement(pageDiv, "","br");
            pI=getPageInfo(i);
            console.log(pI);
            console.log(allPageData);
            newLine(pageDiv, pI);
            $("#flipbook").append(pageDiv);
        }

        $("#flipbook").append(aPage());
        $("#flipbook").append(aPage());
        if(pageLen%2==1){
            $("#flipbook").append(aPage());
        }

        // 根據頁面獲取背景顏色和文字
        $("#flipbook").turn({
            width: 400,
            height: 300,
            autoCenter: true
        });
        updateBar();
    }