要使用 JavaScript 創建、讀取和設置 cookie，您可以使用 `document.cookie` 物件。首先，我們需要將您的資料組織成一個 JSON 物件，然後將該物件轉換成字串，並將其存儲在 cookie 中。以下是一個示範：

```javascript
// 創建一個包含您的資料的 JSON 物件
var expirationDate = new Date();
var data = {
    game_time: [5, 10, 15, 20, 25],
    read_time: [10, 15, 20, 25, 30],
    start_time: expirationDate.getTime() // 假設為遊戲/閱讀的開始時間
};

// 將 JSON 物件轉換成字串
var jsonData = JSON.stringify(data);


expirationDate.setDate(expirationDate.getDate() + 30);

document.cookie = "game_data=" + jsonData + "; expires=" + expirationDate.toUTCString() + "; path=/";

```

在這個範例中，我們創建了一個 JSON 物件 `data` 包含了 `game_time`、`read_time` 和 `start_time` 資料。接著，我們使用 `JSON.stringify` 方法將該物件轉換成字串。最後，我們使用 `document.cookie` 將該字串存儲在 cookie 中。

如果您想要從 cookie 中讀取這些資料，您可以使用以下方式：

```javascript
// 從 cookie 中讀取資料
var cookies = document.cookie.split("; ");
var jsonData = "";

for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].split("=");
    if (cookie[0] === "game_data") {
        jsonData = cookie[1];
        break;
    }
}

if (jsonData) {
    var data = JSON.parse(jsonData);
    console.log("Game Time:", data.game_time);
    console.log("Read Time:", data.read_time);
    console.log("Start Time:", new Date(data.start_time));
} else {
    console.log("Cookie not found.");
}
```

在這個範例中，我們從 `document.cookie` 中讀取所有的 cookie，然後找到名稱為 "game_data" 的 cookie，將其值轉換回 JSON 物件，並輸出資料。請確保您的瀏覽器設置允許 cookie，並注意在真實應用中，可能需要更多的錯誤處理。


```javascript
function setCookie(cname,cvalue,exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  let user = getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
     user = prompt("Please enter your name:","");
     if (user != "" && user != null) {
       setCookie("username", user, 30);
     }
  }
}
```