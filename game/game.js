
if(!checkCookie("game_data")){
  var expirationDate = new Date();
  var data = {
      game_time: [5, 10, 15, 20, 25],
      read_time: [10, 15, 20, 25, 30],
      start_time: expirationDate.getTime() // 假設為遊戲/閱讀的開始時間
  };
  
  var jsonData = JSON.stringify(data);
  
  
  expirationDate.setDate(expirationDate.getDate() + 30);
  
  // document.cookie = "game_data=" + jsonData + "; expires=" + expirationDate.toUTCString() + "; path=/";
  setCookie("game_data",jsonData,expirationDate.toUTCString());
      console.log("game_data");
}
else{
  var expirationDate = new Date();
  var jsonData = getCookie("game_data");
  const data = JSON.parse(jsonData);
  console.log("Game Time:", data.game_time);
  console.log("Read Time:", data.read_time);
  console.log("Start Time:", new Date(data.start_time));
}




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

function checkCookie(cname) {
return (getCookie(cname) != ""); 
}