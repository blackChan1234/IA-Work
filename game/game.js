function Game(gameHour,readHour){
  if(!checkCookie("game_data")){
    // new data
    var expirationDate = new Date();
    var data = {
        gameTime: [gameHour],
        readTime: [readHour],
        nodata: [false],
        startTime: expirationDate.getTime() // 假設為遊戲/閱讀的開始時間
    };
    
    var jsonData = JSON.stringify(data);
    
    
    expirationDate.setDate(expirationDate.getDate() + 30);
    
    // document.cookie = "game_data=" + jsonData + "; expires=" + expirationDate.toUTCString() + "; path=/";
    setCookie("game_data",jsonData,expirationDate.toUTCString());
    console.log("game_data");
    
    // new data
  }
  else{
    //read data
    var expirationDate = new Date();
    var jsonData = getCookie("game_data");
    const data = JSON.parse(jsonData);
    console.log("Game Time:", data.gameTime);
    console.log("Read Time:", data.readTime);
    console.log("no data:", data.nodata);
    console.log("Start Time:", new Date(data.startTime));
    startTime = new Date(data.startTime);

    numOfdays =(new Date()).getDate()-startTime.getDate();

    expirationDate.setDate(expirationDate.getDate() + 30);
    

    jsonData = JSON.stringify(data);
    setCookie("game_data",jsonData,expirationDate.toUTCString());
  }

}





function setCookie(cname,cvalue,expires) {
document.cookie = cname + "=" + cvalue + ";" +"expires=" + expires + ";path=/";
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

function checkCookie(cname) {
return (getCookie(cname) != ""); 
}