<link rel="stylesheet" href="style\news.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

<?php
function addNews($imgPath,$header,$summary,$link) {
$html= <<<HTML
        <article class="news-item">
        <a href="{$link}"><img src="{$imgPath}" alt="News Image"></a>
            <h2>{$header}</h2>
            <p>{$summary}</p>
            <a href="{$link}"><div class="read-more-btn">Read More</div></a>
        </article>

    
    HTML;
  echo $html;
}

// news insert
    addNews('./img/1.jpeg','上網成癮嚴重13.9%受訪學生每日上網逾7小時　逾65%曾與家人衝突','疫情下學童上網時間增多，路德會社會服務處學校社會工作組一項調查發現，51.8%受訪學生每日課外上網時間多達4小時或以上，當中13.9%更指多達7小時以上。調查更稱學生上網成癮情況嚴重，50.1%人會因上網被打擾表現煩躁，65.6%更因上網問題，曾與家人發生衝突，情況令人關注。
    機構稱，現時上網已成青少年生活中不可或缺部份，建議家長轉危為機，幫助子女健康上網，在網絡世界展現多元潛能。
    ','https://www.hk01.com/%E7%A4%BE%E6%9C%83%E6%96%B0%E8%81%9E/785609/%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE%E5%9A%B4%E9%87%8D13-9-%E5%8F%97%E8%A8%AA%E5%AD%B8%E7%94%9F%E6%AF%8F%E6%97%A5%E4%B8%8A%E7%B6%B2%E9%80%BE7%E5%B0%8F%E6%99%82-%E9%80%BE65-%E6%9B%BE%E8%88%87%E5%AE%B6%E4%BA%BA%E8%A1%9D%E7%AA%81');
    addNews('./img/2.jpg','【網絡成癮】3成學生連續打機超過5小時　專家倡家長及早安排暑期活動兼制定作息表','近年，學生精神健康備受關注。有調查指，逾3成中小學生曾連續玩電子遊戲超過5小時，更有1成學生網絡成癮，嚴重個案可連續進行網絡遊戲高達60小時；亦有5成學生自評患中度至非常嚴重的抑鬱、焦慮症。專家解釋指，疫下學生容易對網絡遊戲造成依賴，影響身心健康，建議家長及學校及早介入，提供支援。另外，港專推出輔導研究計劃，旨在促進親子溝通，減低青少年上網成癮問題。
    ','https://topick.hket.com/article/3566344/%E3%80%90%E7%B6%B2%E7%B5%A1%E6%88%90%E7%99%AE%E3%80%913%E6%88%90%E5%AD%B8%E7%94%9F%E9%80%A3%E7%BA%8C%E6%89%93%E6%A9%9F%E8%B6%85%E9%81%8E5%E5%B0%8F%E6%99%82%E3%80%80%E5%B0%88%E5%AE%B6%E5%80%A1%E5%AE%B6%E9%95%B7%E5%8F%8A%E6%97%A9%E5%AE%89%E6%8E%92%E6%9A%91%E6%9C%9F%E6%B4%BB%E5%8B%95%E5%85%BC%E5%88%B6%E5%AE%9A%E4%BD%9C%E6%81%AF%E8%A1%A8?mtc=40001&srkw=%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE');
    addNews('./img/3.webp','逾3成學生連續打機5小時 調查指易成癮損身心健康','漫長暑假來臨，青少年沉迷打機、煲劇易上癮。有最新調查今(10日)公布，逾3成學生曾瘋狂打機，連續打機超過5小時。專家指，過去3年的疫情間，實體課堂轉為網課，導致學生上網時間增多，易令他們形成對網絡遊戲的依賴。長時間沉溺於網絡遊戲，可導致學業、家庭和社交關係等構成負面影響，最嚴重會出現過度依賴和成癮問題。
    ','https://hk.news.yahoo.com/%E9%80%BE3%E6%88%90%E5%AD%B8%E7%94%9F%E9%80%A3%E7%BA%8C%E6%89%93%E6%A9%9F5%E5%B0%8F%E6%99%82-%E8%AA%BF%E6%9F%A5%E6%8C%87%E6%98%93%E6%88%90%E7%99%AE%E6%90%8D%E8%BA%AB%E5%BF%83%E5%81%A5%E5%BA%B7-052321895.html?guccounter=1&guce_referrer=aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS8&guce_referrer_sig=AQAAAK8sp5KinE07Qu8jzcgWxyYrc7RycMMQi-aCy_BKZz87HtaMXFeXcE1sx03QOKVZqHpPxQkJOo7Be2d3V5TO47XmHzy39ZPz-1ZsGsyLqkSeC8IVP1j-LAXSnHF8EyrasKyqmsJIXa28cmXnX8_sfDk5JfiCPhbDqoMTQ-JO3sUZ');
    addNews('./img/1.jpeg','上網成癮嚴重13.9%受訪學生每日上網逾7小時　逾65%曾與家人衝突','疫情下學童上網時間增多，路德會社會服務處學校社會工作組一項調查發現，51.8%受訪學生每日課外上網時間多達4小時或以上，當中13.9%更指多達7小時以上。調查更稱學生上網成癮情況嚴重，50.1%人會因上網被打擾表現煩躁，65.6%更因上網問題，曾與家人發生衝突，情況令人關注。
                機構稱，現時上網已成青少年生活中不可或缺部份，建議家長轉危為機，幫助子女健康上網，在網絡世界展現多元潛能。
                ','https://www.hk01.com/%E7%A4%BE%E6%9C%83%E6%96%B0%E8%81%9E/785609/%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE%E5%9A%B4%E9%87%8D13-9-%E5%8F%97%E8%A8%AA%E5%AD%B8%E7%94%9F%E6%AF%8F%E6%97%A5%E4%B8%8A%E7%B6%B2%E9%80%BE7%E5%B0%8F%E6%99%82-%E9%80%BE65-%E6%9B%BE%E8%88%87%E5%AE%B6%E4%BA%BA%E8%A1%9D%E7%AA%81');
                    addNews('./img/2.jpg','【網絡成癮】3成學生連續打機超過5小時　專家倡家長及早安排暑期活動兼制定作息表','近年，學生精神健康備受關注。有調查指，逾3成中小學生曾連續玩電子遊戲超過5小時，更有1成學生網絡成癮，嚴重個案可連續進行網絡遊戲高達60小時；亦有5成學生自評患中度至非常嚴重的抑鬱、焦慮症。專家解釋指，疫下學生容易對網絡遊戲造成依賴，影響身心健康，建議家長及學校及早介入，提供支援。另外，港專推出輔導研究計劃，旨在促進親子溝通，減低青少年上網成癮問題。
                ','https://topick.hket.com/article/3566344/%E3%80%90%E7%B6%B2%E7%B5%A1%E6%88%90%E7%99%AE%E3%80%913%E6%88%90%E5%AD%B8%E7%94%9F%E9%80%A3%E7%BA%8C%E6%89%93%E6%A9%9F%E8%B6%85%E9%81%8E5%E5%B0%8F%E6%99%82%E3%80%80%E5%B0%88%E5%AE%B6%E5%80%A1%E5%AE%B6%E9%95%B7%E5%8F%8A%E6%97%A9%E5%AE%89%E6%8E%92%E6%9A%91%E6%9C%9F%E6%B4%BB%E5%8B%95%E5%85%BC%E5%88%B6%E5%AE%9A%E4%BD%9C%E6%81%AF%E8%A1%A8?mtc=40001&srkw=%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE');
                    addNews('./img/3.webp','逾3成學生連續打機5小時 調查指易成癮損身心健康','漫長暑假來臨，青少年沉迷打機、煲劇易上癮。有最新調查今(10日)公布，逾3成學生曾瘋狂打機，連續打機超過5小時。專家指，過去3年的疫情間，實體課堂轉為網課，導致學生上網時間增多，易令他們形成對網絡遊戲的依賴。長時間沉溺於網絡遊戲，可導致學業、家庭和社交關係等構成負面影響，最嚴重會出現過度依賴和成癮問題。
                ','https://hk.news.yahoo.com/%E9%80%BE3%E6%88%90%E5%AD%B8%E7%94%9F%E9%80%A3%E7%BA%8C%E6%89%93%E6%A9%9F5%E5%B0%8F%E6%99%82-%E8%AA%BF%E6%9F%A5%E6%8C%87%E6%98%93%E6%88%90%E7%99%AE%E6%90%8D%E8%BA%AB%E5%BF%83%E5%81%A5%E5%BA%B7-052321895.html?guccounter=1&guce_referrer=aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS8&guce_referrer_sig=AQAAAK8sp5KinE07Qu8jzcgWxyYrc7RycMMQi-aCy_BKZz87HtaMXFeXcE1sx03QOKVZqHpPxQkJOo7Be2d3V5TO47XmHzy39ZPz-1ZsGsyLqkSeC8IVP1j-LAXSnHF8EyrasKyqmsJIXa28cmXnX8_sfDk5JfiCPhbDqoMTQ-JO3sUZ');
                addNews('./img/1.jpeg','上網成癮嚴重13.9%受訪學生每日上網逾7小時　逾65%曾與家人衝突','疫情下學童上網時間增多，路德會社會服務處學校社會工作組一項調查發現，51.8%受訪學生每日課外上網時間多達4小時或以上，當中13.9%更指多達7小時以上。調查更稱學生上網成癮情況嚴重，50.1%人會因上網被打擾表現煩躁，65.6%更因上網問題，曾與家人發生衝突，情況令人關注。
                機構稱，現時上網已成青少年生活中不可或缺部份，建議家長轉危為機，幫助子女健康上網，在網絡世界展現多元潛能。
                ','https://www.hk01.com/%E7%A4%BE%E6%9C%83%E6%96%B0%E8%81%9E/785609/%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE%E5%9A%B4%E9%87%8D13-9-%E5%8F%97%E8%A8%AA%E5%AD%B8%E7%94%9F%E6%AF%8F%E6%97%A5%E4%B8%8A%E7%B6%B2%E9%80%BE7%E5%B0%8F%E6%99%82-%E9%80%BE65-%E6%9B%BE%E8%88%87%E5%AE%B6%E4%BA%BA%E8%A1%9D%E7%AA%81');
                    addNews('./img/2.jpg','【網絡成癮】3成學生連續打機超過5小時　專家倡家長及早安排暑期活動兼制定作息表','近年，學生精神健康備受關注。有調查指，逾3成中小學生曾連續玩電子遊戲超過5小時，更有1成學生網絡成癮，嚴重個案可連續進行網絡遊戲高達60小時；亦有5成學生自評患中度至非常嚴重的抑鬱、焦慮症。專家解釋指，疫下學生容易對網絡遊戲造成依賴，影響身心健康，建議家長及學校及早介入，提供支援。另外，港專推出輔導研究計劃，旨在促進親子溝通，減低青少年上網成癮問題。
                ','https://topick.hket.com/article/3566344/%E3%80%90%E7%B6%B2%E7%B5%A1%E6%88%90%E7%99%AE%E3%80%913%E6%88%90%E5%AD%B8%E7%94%9F%E9%80%A3%E7%BA%8C%E6%89%93%E6%A9%9F%E8%B6%85%E9%81%8E5%E5%B0%8F%E6%99%82%E3%80%80%E5%B0%88%E5%AE%B6%E5%80%A1%E5%AE%B6%E9%95%B7%E5%8F%8A%E6%97%A9%E5%AE%89%E6%8E%92%E6%9A%91%E6%9C%9F%E6%B4%BB%E5%8B%95%E5%85%BC%E5%88%B6%E5%AE%9A%E4%BD%9C%E6%81%AF%E8%A1%A8?mtc=40001&srkw=%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE');
                    addNews('./img/3.webp','逾3成學生連續打機5小時 調查指易成癮損身心健康','漫長暑假來臨，青少年沉迷打機、煲劇易上癮。有最新調查今(10日)公布，逾3成學生曾瘋狂打機，連續打機超過5小時。專家指，過去3年的疫情間，實體課堂轉為網課，導致學生上網時間增多，易令他們形成對網絡遊戲的依賴。長時間沉溺於網絡遊戲，可導致學業、家庭和社交關係等構成負面影響，最嚴重會出現過度依賴和成癮問題。
                ','https://hk.news.yahoo.com/%E9%80%BE3%E6%88%90%E5%AD%B8%E7%94%9F%E9%80%A3%E7%BA%8C%E6%89%93%E6%A9%9F5%E5%B0%8F%E6%99%82-%E8%AA%BF%E6%9F%A5%E6%8C%87%E6%98%93%E6%88%90%E7%99%AE%E6%90%8D%E8%BA%AB%E5%BF%83%E5%81%A5%E5%BA%B7-052321895.html?guccounter=1&guce_referrer=aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS8&guce_referrer_sig=AQAAAK8sp5KinE07Qu8jzcgWxyYrc7RycMMQi-aCy_BKZz87HtaMXFeXcE1sx03QOKVZqHpPxQkJOo7Be2d3V5TO47XmHzy39ZPz-1ZsGsyLqkSeC8IVP1j-LAXSnHF8EyrasKyqmsJIXa28cmXnX8_sfDk5JfiCPhbDqoMTQ-JO3sUZ');

?>


