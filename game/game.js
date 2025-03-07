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
    printGameCookie();

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
    // 防止表單提交
    // event.preventDefault();

    // 獲取 game_time 和 read_time 輸入元素
    const gameInput = document.getElementById('game_time');
    const readInput = document.getElementById('read_time');

    // 獲取輸入值
    const gameValue = gameInput.value;
    const readValue = readInput.value;

    // 輸出輸入值
    console.log(`Game Time: ${gameValue}`);
    console.log(`Read Time: ${readValue}`);

    // 在這裡執行遊戲邏輯


  saveAndNewData(gameValue,readValue);
}

function calculateArraySum(array) {
  let sum = 0;
  for (let i = 0; i < array.length; i++) {
      if (array[i]!=null)
      sum += parseInt(array[i]);
  }
  return sum;
}


function numOfdays(data){
  //data = readGameData();
  const startTime = new Date(data.startTime);
  const nowTime = new Date();

  // 設定時分秒等屬性
  startTime.setHours(0, 0, 0, 0);
  nowTime.setHours(0, 0, 0, 0);

  // 計算日期差距（以毫秒為單位）
  const timeDiff = nowTime.getTime() - startTime.getTime();

  // 轉換毫秒為天數
  return timeDiff / (1000 * 60 * 60 * 24);

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
  progressBar1=new ProgressBar("progress-bar", "progress-value", 31);
  progressBar2=new ProgressBar("progress-bar2", "progress-value2", 31);
  totalGameTime=calculateArraySum(data.gameTime)/(7)+0.5;
    totalReadTime=calculateArraySum(data.readTime)/(7)+0.5;
    progressBar1.setClickCount(Math.round(totalGameTime));
    progressBar2.setClickCount(Math.round(totalReadTime));
}

function rule(readTime,gameTime){
  img = ["img/1.png","img/2.png","img/3.png","img/4.png","img/5.png"
  ,"img/6.png","img/7.png","img/8.png","img/9.png","img/10.png","img/11.png","img/12.png"];
  if (readTime+gameTime==0){
    // 悠閒人生
    return img[11];
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