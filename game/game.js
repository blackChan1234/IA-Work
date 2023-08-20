function saveAndNewData(gameHour, readHour) {
  if (!checkCookie("game_data")) {
    // create new game data
    var expirationDate = new Date();
    var data = {
      gameTime: [gameHour],
      readTime: [readHour],
      startTime: expirationDate.getTime() // 假設為遊戲/閱讀的開始時間
    };

    var jsonData = JSON.stringify(data);


    expirationDate.setDate(expirationDate.getDate() + 30);

    // document.cookie = "game_data=" + jsonData + "; expires=" + expirationDate.toUTCString() + "; path=/";
    setCookie("game_data", jsonData, expirationDate.toUTCString());

    // create new game data
  }
  else {
    //read data
    var expirationDate = new Date();
    var data = readGameData();
    printCookie();

    expirationDate.setDate(expirationDate.getDate() + 30);
    day= numOfdays(data);

    //full null data
    for (var i = (data.readTime).length; i < day;) {
      data.gameTime.push("null");
      data.readTime.push("null");
    }

    data.gameTime[day] = gameHour;
    data.readTime[day] = readHour;


    var jsonData = JSON.stringify(data);
    setCookie("game_data", jsonData, expirationDate.toUTCString());
  }

}

function numOfdays(data){
  //data = readGameData();
  startTime = new Date(data.startTime);
  return (new Date()).getDate() - startTime.getDate();
}

function readGameData() {
  var jsonData = getCookie("game_data");
  return JSON.parse(jsonData);
}
function printGameCookie() {
  var data = readGameData();
  console.log("Game Time:", data.gameTime);
  console.log("Read Time:", data.readTime);
  console.log("Start Time:", new Date(data.startTime));
}

function showPage(page) {
  var data = readGameData();
  if (page<data.gameTime.length) {
    console.log("Game Time:", data.gameTime[page]);
    console.log("Read Time:", data.readTime[page]);
  }
}


function setCookie(cname, cvalue, expires) {
  document.cookie = cname + "=" + cvalue + ";" + "expires=" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
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

function checkCookie(cname) {
  return (getCookie(cname) != "");
}