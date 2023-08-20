
if(!checkCookie("game_data")){
  var expirationDate = new Date();
  var data = {
      game_time: [],
      read_time: [],
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
  expirationDate.setDate((new Date(data.start_time)).getDate() + 30);

  jsonData = JSON.stringify(data);
  setCookie("game_data",jsonData,expirationDate.toUTCString());
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