function saveAndNewData(gameHour, readHour) {
  if (!checkCookie("game_data")) {
    // create new game data
    var expirationDate = new Date();
    var data = {
      gameTime: [gameHour],
      readTime: [readHour],
      startTime: expirationDate.getTime() // 閱讀的開始時間
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

function startGame() {
  if (!checkCookie("game_data")) {
    var data = readGameData();
    $("#flipbook").turn("page", numOfdays(data));
  }
  
}

function calculateArraySum(array) {
  let sum = 0;
  for (let i = 0; i < array.length; i++) {
      sum += array[i];
  }
  return sum;
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
function updateBar(){
  var data = readGameData();
  totalGameTime=calculateArraySum(data.gameTime)/(16*30);
    totalReadTime=calculateArraySum(data.readTime)/(16*30);
    progressBar1.setClickCount(Math.round(totalGameTime));
    progressBar2.setClickCount(Math.round(totalReadTime));
}

function rule(readTime,gameTime){
  if (readTime+gameTime==0){
    // 悠閒人生

  }
  else if(gameTime+readTime>=24*30){
    //別騙了
    return img[0];
  }
  else if(gameTime+readTime>19*30){
    //你差不多死
    return img[1];
  }
  else if(gameTime+readTime>16*30){
    //休息點
    return img[10];
  }
  else if(readTime>10*30){
    //書呆子
    return img[7];
  }
  else if(readTime>16*30){
    //你也讀太多
    return img[8];
  }
  else if(readTime>gameTime+3){
    return img[9];
  }
  else if(gameTime<5*30){
    return img[2];
  }
  else if(gameTime>6*30){
    return img[3];
  }
  else if(gameTime>8*30){
    return img[4];
  }
  else if(gameTime>12*30){
    return img[5];
  }
  else if(gameTime>16*30){
    return img[6];
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