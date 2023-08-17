document.addEventListener('DOMContentLoaded', function() {
    // select intro-container
    const introContainer = document.querySelector('.intro-container');

    // create content
    const content = `
    <div class="intro-section">
        <h3>網絡成癮探索：解開網絡世界的迷失之旅</h3>
        <img src="path_to_your_image1.jpg" alt="網絡成癮探索">
        <p>現代科技的迅速發展已經將我們帶入了一個充滿無限可能性的數字時代，然而，隨之而來的是一種新型態的成癮現象——網絡成癮。
            本網站旨在向您介紹什麼是網絡成癮、其可能的影響，以及如何達到網絡使用的平衡。
        </p>
    </div><br>
    <div class="intro-section">
        <h3>網絡成癮：解析新時代的心理陷阱</h3>
        <img src="path_to_your_image2.jpg" alt="網絡成癮解析">
        <p>網絡成癮是一種對互聯網和數位設備的過度依賴，導致個體無法有效地控制自己的上網行為，進而影響到日常生活和職業等多個方面。
            這種成癮不僅僅是對某個具體的網站或應用程序的依賴，更是對於網絡上無限信息、社交媒體、遊戲等虛擬世界的無法自拔的渴望。
        </p>
    </div><br>
    <div class="intro-section">
        <h3>建立健康的網絡使用習慣</h3>
        <img src="path_to_your_image3.jpg" alt="健康的網絡使用習慣">
        <p>我們深信，網絡在現代生活中扮演著極其重要的角色，然而，過度使用網絡也可能對我們造成不利影響。
            在這一部分，我們將提供一些實用的建議，幫助您建立健康的網絡使用習慣，包括：<br><br>
            時間管理： 如何有效地管理上網的時間，避免過度使用？<br>
            目標設定： 如何在網絡上設定明確的目標，避免無目的地漫遊？<br>
            社交均衡： 如何在虛擬世界和現實生活之間保持良好的社交平衡？<br><br>
            我們相信通過培養健康的網絡使用習慣，您將能夠更好地享受數字時代帶來的便利，同時保持心理和身體的健康。
        </p>
    </div><br>
    `;

    // insert into html
    introContainer.innerHTML = content;
});






