const canvas = document.getElementById('dialogueBox');
const ctx = canvas.getContext('2d');

// 假設小惡魔的位置和大小為:
const demon = document.getElementById('demon');
const demonX = demon.offsetLeft;
const demonY = demon.offsetTop;
const demonWidth = demon.width;
const demonHeight = demon.height;

// 設定對話框的位置
const dialogueWidth = 400;
const dialogueHeight = 100;
const dialogueX = demonX + (demonWidth - dialogueWidth) / 2;
const dialogueY = demonY - dialogueHeight - 20; // 距離小惡魔20像素

// 畫對話框
ctx.fillStyle = '#ffffff';
ctx.strokeStyle = '#000000';
ctx.roundRect(dialogueX, dialogueY, dialogueWidth, dialogueHeight, 20);
ctx.fill();
ctx.stroke();

// 顯示對話文字
ctx.fillStyle = '#000000';
ctx.font = '18px Arial';
ctx.fillText('這是一個對話框！', dialogueX + 20, dialogueY + 50);

CanvasRenderingContext2D.prototype.roundRect = function (x, y, w, h, r) {
    if (w < 2 * r) r = w / 2;
    if (h < 2 * r) r = h / 2;
    this.beginPath();
    this.moveTo(x + r, y);
    this.arcTo(x + w, y, x + w, y + h, r);
    this.arcTo(x + w, y + h, x, y + h, r);
    this.arcTo(x, y + h, x, y, r);
    this.arcTo(x, y, x + w, y, r);
    this.closePath();
    return this;
}
